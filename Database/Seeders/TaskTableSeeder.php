<?php

namespace Modules\Task\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Base\Database\Seeders\SeederEventDTO;
use Modules\Base\Models\RecordModel;
use Modules\Post\Entities\ThreadVote\ThreadVoteEntityModel;
use Modules\Post\Models\ThreadModel;
use Modules\Post\Models\ThreadVoteModel;
use Modules\Project\Models\ProjectModel;
use Modules\Task\Entities\TaskBoard\TaskBoardEntityModel;
use Modules\Task\Models\TaskBoardModel;
use Modules\Task\Models\TaskBoardTasksModel;
use Modules\Task\Models\TaskModel;
use Modules\Task\Models\TaskTagModel;
use Modules\Task\Models\TaskWorkModel;
use Modules\Workspace\Models\WorkspaceModel;

class TaskTableSeeder extends BaseSeeder
{
    protected ?SeederEventDTO $event = null;

    protected ?ProjectModel $project;

    public function run(User $user, ?ProjectModel $project = null, ?WorkspaceModel $workspace = null, $event = null): void
    {
        $this->event = $event;
        $this->project = $project;

        Model::unguard();

        $this->createTasks($user, $project, $workspace);

        $this->command->info('🤖✔️ '.__CLASS__.' done');

    }

    protected function createTasks(User $user, ProjectModel $project, ?WorkspaceModel $workspace = null): void
    {
        $recipient = User::query()->where('id', '<>', $user->id)->first();

        $seed_total = config('task.SEED_TASKS_COUNT');
        $factory = TaskModel::factory($seed_total)
            ->for($user, 'owner');
        if ($workspace) {
            $factory->for($workspace, 'workspace');
        }
        $factory->for($recipient, 'recipient')
            ->afterCreating(function (TaskModel $task) use ($user) {
                if ($this->event) {
                    //                    Event::dispatch($this->event, compact('project', 'task'));
                    Event::dispatch($this->event->class(), $this->event->param('task', $task)->payload());
                }
                $this->createTaskTags($task);

                $this->createTaskComments($task, $user);

                $this->createTaskWorks($task, $user);

                $this->createTaskBoards($task);
            })
            ->create();
    }

    public function createTaskTags(TaskModel $task): void
    {
        $seed_total = config('task.SEED_TASK_TAGS_COUNT', 3);
        TaskTagModel::factory($seed_total)
            ->for($task, 'task')
            ->create();
    }

    public function createTaskComments(TaskModel $task, User $user): void
    {
        $seed_total = config('task.SEED_TASK_COMMENTS_COUNT', 3);

        $entity = RecordModel::factory()->create();
        $task->record_id = $entity->id;
        $task->save();

        ThreadModel::factory($seed_total)
            ->for($entity, 'entity')
            ->for($user, 'user')
            ->afterCreating(function (ThreadModel $comment) use ($task) {
                $this->createCommentVotes($comment, $task);
            })
            ->create();
    }

    public function createCommentVotes(ThreadModel $comment, TaskModel $task): void
    {
        $project = ProjectModel::projectByTaskId($task->id);
        if (! $project) {
            return;
        }
        $project->participants()->each(function (User $user) use ($comment) {
            $p = ThreadVoteEntityModel::props();
            $fnUpVote = function ($factory) use ($p) {
                $factory->create([$p->like => 1]);
            };
            $fnDownVote = function ($factory) use ($p) {
                $factory->create([$p->dislike => 1]);
            };

            $factory = ThreadVoteModel::factory()->for($comment)->for($user);

            /** @var \Closure $choice */
            $choice = collect([$fnUpVote, $fnDownVote])->random();
            $choice($factory);
        });
    }

    public function createTaskWorks(TaskModel $task, User $user): void
    {
        TaskWorkModel::factory()->count(config('task.SEED_TASK_WORKS_COUNT'))->for($task, 'task')->for($user, 'user')->create();
    }

    public function createTaskBoards(TaskModel $task): void
    {
        $board = TaskBoardEntityModel::props();

        TaskBoardModel::factory()
            ->count(5)
            ->for(WorkspaceModel::byUserId($task->owner_id)->get()->first(), 'workspace')
            ->sequence(
                [$board->name => 'Backlog'],
                [$board->name => 'To do'],
                [$board->name => 'Working'],
                [$board->name => 'Test'],
                [$board->name => 'Done'],
            )
            ->afterCreating(function (TaskBoardModel $board) use ($task) {
                $this->createTaskBoard($board, $task);
            })->create();
    }

    public function createTaskBoard(TaskBoardModel $board, TaskModel $task): void
    {
        TaskBoardTasksModel::factory()->count(config('task.SEED_TASK_BOARD_TASKS_COUNT'))
            ->for($board, 'board')->for($task, 'task')
            ->create();
    }
}

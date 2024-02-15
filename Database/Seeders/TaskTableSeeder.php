<?php

namespace Modules\Task\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use Modules\App\Entities\MessageVote\MessageVoteEntityModel;
use Modules\App\Models\MessageModel;
use Modules\App\Models\MessageVoteModel;
use Modules\App\Models\RecordModel;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Base\Database\Seeders\SeederEventDTO;
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

    public function run(User $user, ProjectModel $project = null, WorkspaceModel $workspace = null, $event = null): void
    {
        $this->event = $event;
        $this->project = $project;

        Model::unguard();

        $this->createTasks($user, $project, $workspace);

        $this->command->info('🤖✔️ ' . __CLASS__ . ' done');

    }

    protected function createTasks(User $user, ProjectModel $project, WorkspaceModel $workspace = null): void
    {
        $recipient = User::query()->where('id', '<>', $user->id)->first();

        $seed_total = config('task.SEED_TASKS_COUNT');
        $factory = TaskModel::factory($seed_total)
            ->for($user, 'owner');
        if ($workspace) {
            $factory->for($workspace, 'workspace');
        }
        $factory->for($recipient, 'recipient')
            ->afterCreating(function (TaskModel $task) use ($project, $user) {
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

    function createTaskTags(TaskModel $task): void
    {
        $seed_total = config('app.SEED_MODULE_CATEGORY_COUNT', 3);
        TaskTagModel::factory($seed_total)
            ->for($task, 'task')
            ->create();
    }

    function createTaskComments(TaskModel $task, User $user): void
    {
        $seed_total = config('app.SEED_COMMENT_COUNT', 3);

        $entity = RecordModel::factory()->create();
        $task->record_id = $entity->id;
        $task->save();

        MessageModel::factory($seed_total)
            ->for($entity, 'entity')
            ->for($user, 'user')
            ->afterCreating(function (MessageModel $comment) use ($user, $task) {
                $this->createCommentVotes($comment, $task);
            })
            ->create();
    }

    function createCommentVotes(MessageModel $comment, TaskModel $task): void
    {
        $project = ProjectModel::projectByTaskId($task->id);
        if (!$project) {
            return;
        }
        $project->participants()->each(function (User $user) use ($comment) {
            $p = MessageVoteEntityModel::props();
            $fnUpVote = function ($factory) use ($p, $comment, $user) {
                $factory->create([$p->up_vote => 1]);
            };
            $fnDownVote = function ($factory) use ($p, $comment, $user) {
                $factory->create([$p->down_vote => 1]);
            };

            $factory = MessageVoteModel::factory()->for($comment)->for($user);

            /**@var \Closure $choice */
            $choice = collect([$fnUpVote, $fnDownVote])->random();
            $choice($factory);
        });
    }

    function createTaskWorks(TaskModel $task, User $user): void
    {
        TaskWorkModel::factory()->count(config('app.SEED_MODULE_COUNT'))->for($task, 'task')->for($user, 'user')->create();
    }

    function createTaskBoards(TaskModel $task): void
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

    function createTaskBoard(TaskBoardModel $board, TaskModel $task): void
    {
        TaskBoardTasksModel::factory()->count(config('app.SEED_TASK_COUNT'))
            ->for($board, 'board')->for($task, 'task')
            ->create();
    }
}

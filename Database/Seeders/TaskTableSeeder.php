<?php

namespace Modules\Task\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\App\Entities\MessageVote\MessageVoteEntityModel;
use Modules\App\Models\EntityItemModel;
use Modules\App\Models\MessageModel;
use Modules\App\Models\MessageVoteModel;
use Modules\Project\Models\ProjectModel;
use Modules\Task\Entities\Task\TaskEntityModel;
use Modules\Task\Entities\TaskBoard\TaskBoardEntityModel;
use Modules\Task\Entities\TaskCommentUpVote\TaskCommentUpVoteEntityModel;
use Modules\Task\Models\TaskBoardModel;
use Modules\Task\Models\TaskBoardTasksModel;
use Modules\Task\Models\TaskCategoryModel;
use Modules\Task\Models\TaskCommentModel;
use Modules\Task\Models\TaskCommentUpVoteModel;
use Modules\Task\Models\TaskModel;
use Modules\Task\Models\TaskTagModel;
use Modules\Task\Models\TaskWorkModel;
use Modules\Workspace\Models\WorkspaceModel;

class TaskTableSeeder extends Seeder
{
    public function run(User $user, ProjectModel $project, WorkspaceModel $workspace): void
    {
        Model::unguard();

        $this->createTaskCategories($project, $user);
        $this->createTasks($user, $workspace, $project);
    }

    protected function createTaskCategories(ProjectModel $project, User $user): void
    {
        TaskCategoryModel::factory(config('app.SEED_MODULE_CATEGORY_COUNT', 3))
            ->for($project, 'project')
            ->for($user, 'user')
            ->create();
    }

    protected function createTasks(User $user, WorkspaceModel $workspace, ProjectModel $project): void
    {
        $categories = TaskCategoryModel::query()->get()->map(function (TaskCategoryModel $category) {
            $p = TaskEntityModel::props();
            return [$p->category_id => $category->id];
        })->toArray();

        $recipient = User::query()->where('id', '<>', $user->id)->first();

        $seed_total = config('app.SEED_MODULE_COUNT', 3);
        $seeded = 0;
        TaskModel::factory($seed_total)
            ->for($user, 'owner')
            ->for($workspace, 'workspace')
            ->for($project, 'project')->for($recipient, 'recipient')
            ->sequence(...$categories)
            ->afterCreating(function (TaskModel $task) use ($user, $seed_total, &$seeded) {
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
        $seed_total = config('app.SEED_MODULE_COUNT', 3);

        $entity = EntityItemModel::factory()->create();
        $task->entity_id = $entity->id;
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
        $task->project->participants()->each(function (User $user) use ($comment) {
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
            ->for($task->project->workspaces()->first(), 'workspace')
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

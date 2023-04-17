<?php

namespace Modules\Task\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
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
        $seed_total = config('app.SEED_MODULE_CATEGORY_COUNT');
        $seeded = 0;
        TaskCategoryModel::factory()
            ->count($seed_total)
            ->for($project, 'project')
            ->for($user, 'user')
            ->afterCreating(function (TaskCategoryModel $category) use ($seed_total, &$seeded) {
                $seeded++;
                ds("project {$category->task_id} task category $seeded / $seed_total");
            })
            ->create();
    }

    protected function createTasks(User $user, WorkspaceModel $workspace, ProjectModel $project): void
    {
        $categories = TaskCategoryModel::query()->get()->map(function (TaskCategoryModel $category) {
            $p = TaskEntityModel::props();
            return [$p->category_id => $category->id];
        })->toArray();

        $recipient = User::query()->where('id', '<>', $user->id)->first();

        $seed_total = config('app.SEED_MODULE_COUNT');
        $seeded = 0;
        TaskModel::factory()
            ->count($seed_total)
            ->for($user, 'owner')
            ->for($workspace, 'workspace')
            ->for($project, 'project')->for($recipient, 'recipient')
            ->sequence(...$categories)
            ->afterCreating(function (TaskModel $task) use ($user, $seed_total, &$seeded) {
                $seeded++;
                ds("task $seeded / $seed_total");

                $this->createTaskTags($task);

                $this->createTaskComments($task, $user);

                $this->createTaskWorks($task, $user);

                $this->createTaskBoards($task);
            })
            ->create();
    }

    function createTaskTags(TaskModel $task): void
    {
        $seed_total = config('app.SEED_MODULE_CATEGORY_COUNT');
        $seeded = 0;
        TaskTagModel::factory()
            ->count($seed_total)
            ->for($task, 'task')
            ->afterCreating(function (TaskTagModel $tag) use ($seed_total, &$seeded) {
                $seeded++;
                ds("project {$tag->task->project_id} task $tag->task_id tag $seeded / $seed_total");
            })
            ->create();
    }

    function createTaskComments(TaskModel $task, User $user): void
    {
        $seed_total = config('app.SEED_MODULE_COUNT');
        $seeded = 0;
        TaskCommentModel::factory()
            ->count($seed_total)
            ->for($task, 'task')->for($user, 'user')
            ->afterCreating(function (TaskCommentModel $comment) use ($user, $seed_total, &$seeded) {
                $seeded++;
                ds("project {$comment->task->project_id} task $comment->task_id comment $seeded / $seed_total");

                $this->createCommentVotes($comment, $user);
            })
            ->create();
    }

    function createCommentVotes(TaskCommentModel $comment): void
    {
        $participants = $comment->task->project->participants();
        $seed_total = $participants->count();
        $seeded = 0;
        $participants->each(function (User $user) use ($comment, $seed_total, &$seeded) {
            $p = TaskCommentUpVoteEntityModel::props();
            $fnUpVote = function ($factory) use ($p, $comment, $user) {
                $factory->create([$p->up_vote => 1]);
            };
            $fnDownVote = function ($factory) use ($p, $comment, $user) {
                $factory->create([$p->down_vote => 1]);
            };

            $factory = TaskCommentUpVoteModel::factory()->for($comment, 'comment')->for($user, 'user');

            /**@var \Closure $choice */
            $choice = collect([$fnUpVote, $fnDownVote])->random();
            $choice($factory);

            $seeded++;
            ds("task $comment->task_id comment $comment->id project participant vote $seeded / $seed_total");
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

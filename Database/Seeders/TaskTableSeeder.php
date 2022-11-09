<?php

namespace Modules\Task\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
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

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return TaskModel
     */
    public function run(User $user, ProjectModel $project)
    {
        Model::unguard();
        TaskCategoryModel::factory()->count(3)
            ->for($project, 'project')
            ->for($user, 'user')
            ->create();
        $categories = TaskCategoryModel::query()->get()->map(function (TaskCategoryModel $category) {
            $p = TaskEntityModel::props();
            return [$p->category_id => $category->id];
        })->toArray();

        $recipient = User::query()->where('id', '<>', $user->id)->first();
        $tasks = TaskModel::factory()->count(11)
            ->for($user, 'owner')
            ->for($project, 'project')
            ->for($recipient, 'recipient')
            ->sequence(...$categories)
            ->create();

        $tasks->each(function (TaskModel $task) use ($user) {

                TaskTagModel::factory()->count(3)->for($task, 'task')->create();
                TaskCommentModel::factory()->count(11)
                    ->for($task, 'task')->for($user, 'user')
                    ->create()->each(function (TaskCommentModel $comment) use ($user) {
                        $p = TaskCommentUpVoteEntityModel::props();
                        $fnUpVote = function ($factory) use ($p, $comment, $user) {
                            $factory->create([$p->up_vote => 1]);
                        };
                        $fnDownVote = function ($factory) use ($p, $comment, $user) {
                            $factory->create([$p->down_vote => 1]);
                        };

                        $factory = TaskCommentUpVoteModel::factory()->for($comment, 'comment')->for($user, 'user');
                        $choice = collect([$fnUpVote, $fnDownVote])->random();
                        $choice($factory);
                    });

                TaskWorkModel::factory()->count(11)->for($task, 'task')->for($user, 'user')->create();

                $board = TaskBoardEntityModel::props();
                TaskBoardModel::factory()->count(5)->for($task, 'task')->sequence(
                    [$board->name => 'Backlog'],
                    [$board->name => 'To do'],
                    [$board->name => 'Working'],
                    [$board->name => 'Test'],
                    [$board->name => 'Done'],
                )->create()->each(function (TaskBoardModel $board) use ($task) {
                    TaskBoardTasksModel::factory()->for($board, 'board')->for($task, 'task')->create();
                });
            });
        return $tasks;
    }
}

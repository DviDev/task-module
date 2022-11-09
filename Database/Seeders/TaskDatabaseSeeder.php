<?php

namespace Modules\Task\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Project\Models\ProjectModel;
use Modules\Task\Entities\Task\TaskEntityModel;
use Modules\Task\Models\TaskCategoryModel;

class TaskDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ProjectModel $project)
    {
        Model::unguard();

//        User::query()->each(function (User $user) use ($project) {
//            TaskCategoryModel::factory()->count(3)
//                ->for($project, 'project')
//                ->for($user, 'user')
//                ->create();
//        });
    }
}

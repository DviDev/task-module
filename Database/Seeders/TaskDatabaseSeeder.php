<?php

namespace Modules\Task\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Project\Database\Seeders\ProjectTableSeeder;
use Modules\Project\Models\ProjectModuleModel;

class TaskDatabaseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->commandWarn(__CLASS__, "🌱 seeding");

        (new ScanTableDomain())->scan('task');

        /**@var ProjectModuleModel $module */
        $module = ProjectModuleModel::query()->where('name', 'Task')->first();
        $project = $module->project;

        if (config('task.SEED_CREATE_PERMISSIONS')) {
            $this->call(class: PermissionTableSeeder::class, parameters: ['module' => $module]);
        }
        if (config('task.SEED_CREATE_MODULO_PROJECT')) {
            $this->call(ProjectTableSeeder::class, parameters: ['project' => $project, 'module' => $module, 'create_tasks' => config('task.SEED_CREATE_MODULO_PROJECT_TASKS')]);
        }

        $this->commandInfo(__CLASS__, '✔️');
    }
}

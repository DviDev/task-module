<?php

namespace Modules\Task\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Project\Database\Seeders\ProjectTableSeeder;
use Modules\Project\Models\ProjectModel;
use Modules\Project\Models\ProjectModuleModel;
use Modules\Workspace\Models\WorkspaceModel;

class TaskDatabaseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ProjectModel $project)
    {
        Model::unguard();

        $this->command->warn(PHP_EOL . '🤖 Task database scanning ...');
        (new ScanTableDomain())->scan('task');

        /**@var ProjectModuleModel $module */
        $module = ProjectModuleModel::query()->where('name', 'Task')->first();
        $project = $module->project;


        $this->call(class: PermissionTableSeeder::class, parameters: ['module' => $module]);

        $this->call(ProjectTableSeeder::class, parameters: ['project' => $project, 'module' => $module]);

        $this->command->warn(PHP_EOL . '🤖 Tasks creating ...');
        /**@var WorkspaceModel $workspace */
        $workspace = $project->workspaces()->firstOrCreate([
            'name' => $project->name . ' Workspace',
            'user_id' => $project->owner_id
        ]);
        $this->call(TaskTableSeeder::class, parameters: [
            'user' => $project->user,
            'project' => $project,
            'workspace' => $workspace
        ]);

        $this->command->info('🤖✔️ ' . __CLASS__ . ' done');
    }
}

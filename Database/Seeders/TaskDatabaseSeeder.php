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

        $this->command->warn(PHP_EOL . '🤖 Task database scanning ...');
//        Um projeto será criado para o Modulo de Tarefas
//        Porem deve ser opcional e habilitar de acordo com configuração do modulo, se houver um evento passado,
//        então se cria o projeto para mo Modulo
//        Ter a possibilidade de desabilitar a criação do projeto, pode haver um ganho
//        de performance significativo no processo de seeder
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

        if (false) {
//            $this->command->warn(PHP_EOL . '🤖 Tasks creating ...');
//            /**@var WorkspaceModel $workspace */
//            $workspace = $project->workspaces()->firstOrCreate([
//                'name' => $project->name . ' Workspace',
//                'user_id' => $project->owner_id
//            ]);
//            $this->call(TaskTableSeeder::class, parameters: [
//                'user' => $project->user,
//                'project' => $project,
//                'workspace' => $workspace
//            ]);
        }

        $this->command->info('🤖✔️ ' . __CLASS__ . ' done');
    }
}

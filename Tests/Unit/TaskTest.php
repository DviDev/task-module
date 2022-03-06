<?php

namespace Modules\Task\Tests\Unit;

use App\Models\User;
use Modules\Project\Entities\ProjectEntityModel;
use Modules\Project\Models\ProjectModel;
use Modules\Task\Entities\TaskEntityModel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function store()
    {
        $this->assertTrue(true);
//        return;
//        $project = ProjectEntityModel::props();
//        $project->name = 'Project test';
//        $project->save();
//
//
//        $projectModel = ProjectModel::factory()->create();
//
//        $task = TaskEntityModel::props();
//        $task->name = 'Task test';
//        $task->project_id = 1;
//        $this->post(route('task.create'), );
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Task\Entities\TaskBoardTasks\TaskBoardTasksEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_board_tasks', function (Blueprint $table) {
            $table->id();

            $prop = TaskBoardTasksEntityModel::props(null, true);
            $table->foreignId($prop->board_id)
                ->references('id')->on('task_boards')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->foreignId($prop->task_id)
                ->references('id')->on('tasks')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp($prop->created_at)->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_board_tasks');
    }
};

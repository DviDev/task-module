<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Task\Entities\TaskBoardTasksEntityModel;

class CreateTaskBoardTasks extends Migration
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
            $table->bigInteger($prop->board_id)->unsigned();
            $table->bigInteger($prop->task_id)->unsigned();
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
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Task\Entities\TaskBoardTaskHistory\TaskBoardTaskHistoryEntityModel;

class CreateTaskBoardTaskHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_board_task_histories', function (Blueprint $table) {
            $table->id();

            $prop = TaskBoardTaskHistoryEntityModel::props(null, true);
            $table->bigInteger($prop->board_task_to_item_id)->unsigned();
            $table->dateTime($prop->updated_at);
            $table->bigInteger($prop->updated_by_user_id)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_board_task_histories');
    }
}

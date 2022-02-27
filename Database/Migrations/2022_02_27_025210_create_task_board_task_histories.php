<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->bigInteger('board_task_to_item_id');
            $table->dateTime('updated_at');
            $table->bigInteger('updated_by_user_id');
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

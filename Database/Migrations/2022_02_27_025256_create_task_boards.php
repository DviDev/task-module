<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Task\Entities\TaskBoard\TaskBoardEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_boards', function (Blueprint $table) {
            $table->id();

            $prop = TaskBoardEntityModel::props(null, true);
            $table->bigInteger($prop->task_id)->unsigned();
            $table->string($prop->name, 70);
            $table->tinyInteger($prop->order)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_boards');
    }
};

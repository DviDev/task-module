<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Task\Entities\TaskWorkEntityModel;

class CreateTaskWorks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_works', function (Blueprint $table) {
            $table->id();

            $prop = TaskWorkEntityModel::props(null, true);
            $table->bigInteger($prop->task_id)->unsigned();
            $table->bigInteger($prop->user_id)->unsigned();
            $table->timestamp($prop->task_start)->useCurrent();
            $table->timestamp($prop->task_end)->nullable();
            $table->string($prop->description, 200)->nullable();
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
        Schema::dropIfExists('task_works');
    }
}

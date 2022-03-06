<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Task\Entities\TaskCommentEntityModel;

class CreateTaskComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_comments', function (Blueprint $table) {
            $table->id();

            $prop = TaskCommentEntityModel::props(null, true);
            $table->bigInteger($prop->task_id)->unsigned();
            $table->bigInteger($prop->user_id)->unsigned();
            $table->bigInteger($prop->parent_id)->unsigned()->nullable();
            $table->text($prop->message);
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
        Schema::dropIfExists('task_comments');
    }
}

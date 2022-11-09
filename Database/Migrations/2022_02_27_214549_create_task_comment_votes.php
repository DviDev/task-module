<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Task\Entities\TaskCommentUpVote\TaskCommentUpVoteEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_comment_votes', function (Blueprint $table) {
            $table->id();

            $prop = TaskCommentUpVoteEntityModel::props(null, true);
            $table->bigInteger($prop->comment_id)->unsigned();
            $table->bigInteger($prop->user_id)->unsigned();
            $table->bigInteger($prop->up_vote)->unsigned()->nullable();
            $table->bigInteger($prop->down_vote)->unsigned()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_comment_votes');
    }
};

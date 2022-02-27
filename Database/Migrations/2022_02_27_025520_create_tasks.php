<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);
            $table->mediumText('description');
            $table->bigInteger('project_id');
            $table->bigInteger('category_id');
            $table->mediumText('solution');
            $table->bigInteger('parent_id');
            $table->bigInteger('to_user_id');
            $table->integer('time_estimate');
            $table->dateTime('start_date');
            $table->date('deadline');
            $table->char('priority', 6);
            $table->enum('status', ['closed','open','finalized','abandoned','in_progress']);
            $table->smallInteger('num_order');
            $table->tinyInteger('percent_completed');
            $table->date('repeat_end');
            $table->enum('repeat_type', ['dayly','weekly','monthly','trimester','quarterly','semiannually','annually']);
            $table->smallInteger('repeat_num');
            $table->boolean('active');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}

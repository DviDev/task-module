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
            $table->mediumText('description')->nullable();
            $table->bigInteger('project_id');
            $table->bigInteger('category_id')->nullable();
            $table->mediumText('solution')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('to_user_id')->nullable();
            $table->integer('time_estimate')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->date('deadline')->nullable();
            $table->char('priority', 6);
            $table->enum('status', ['closed','open','finalized','abandoned','in_progress']);
            $table->smallInteger('num_order')->nullable();
            $table->tinyInteger('percent_completed')->nullable();
            $table->date('repeat_end')->nullable();
            $table->enum('repeat_type', ['dayly','weekly','monthly','trimester','quarterly','semiannually','annually'])->nullable();
            $table->smallInteger('repeat_num')->nullable();
            $table->boolean('active')->nullable();
            $table->timestamp('created_at')->useCurrent();
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

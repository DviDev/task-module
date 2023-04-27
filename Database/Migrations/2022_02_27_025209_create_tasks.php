<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Task\Entities\Task\TaskEntityModel;
use Modules\Task\Entities\Task\TaskRepeatTypeEnum;
use Modules\Task\Entities\Task\TaskStatusEnum;

return new class extends Migration
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

            $prop = TaskEntityModel::props(null, true);
            $table->string($prop->name, 150);
            $table->mediumText($prop->description)->nullable();
            $table->foreignId($prop->owner_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->workspace_id)
                ->references('id')->on('workspaces')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->project_id)
                ->nullable()
                ->references('id')->on('projects')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->category_id)
                ->nullable()
                ->references('id')->on('task_categories')
                ->cascadeOnUpdate()->nullOnDelete();
            $table->mediumText($prop->solution)->nullable();
            $table->foreignId($prop->parent_id)
                ->nullable()
                ->references('id')->on('tasks')
                ->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId($prop->recipient_user_id)
                ->nullable()
                ->references('id')->on('users')
                ->cascadeOnUpdate()->nullOnDelete();
            $table->integer($prop->time_estimate)->unsigned()->nullable();
            $table->dateTime($prop->start_date)->nullable();
            $table->date($prop->deadline)->nullable();
            $table->char($prop->priority);
            $table->enum($prop->status, TaskStatusEnum::toArray());
            $table->smallInteger($prop->num_order)->unsigned()->nullable();
            $table->tinyInteger($prop->percent_completed)->unsigned()->nullable();
            $table->date($prop->repeat_end)->nullable();
            $table->enum($prop->repeat_type, TaskRepeatTypeEnum::toArray())->nullable();
            $table->smallInteger($prop->repeat_num)->unsigned()->nullable();
            $table->char($prop->active, 1)->nullable();

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
        Schema::dropIfExists('tasks');
    }
};

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
            $table->bigInteger($prop->project_id)->unsigned();
            $table->bigInteger($prop->category_id)->unsigned()->nullable();
            $table->mediumText($prop->solution)->nullable();
            $table->bigInteger($prop->parent_id)->unsigned()->nullable();
            $table->bigInteger($prop->to_user_id)->unsigned()->nullable();
            $table->integer($prop->time_estimate)->unsigned()->nullable();
            $table->dateTime($prop->start_date)->nullable();
            $table->date($prop->deadline)->nullable();
            $table->tinyInteger($prop->priority)->unsigned();
            $table->enum($prop->status, TaskStatusEnum::toArray());
            $table->smallInteger($prop->num_order)->unsigned()->nullable();
            $table->tinyInteger($prop->percent_completed)->unsigned()->nullable();
            $table->date($prop->repeat_end)->nullable();
            $table->enum($prop->repeat_type, TaskRepeatTypeEnum::toArray())->nullable();
            $table->smallInteger($prop->repeat_num)->unsigned()->nullable();
            $table->boolean($prop->active)->unsigned()->nullable();

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

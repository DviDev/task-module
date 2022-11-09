<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Task\Entities\TaskCategory\TaskCategoryEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_categories', function (Blueprint $table) {
            $table->id();

            $prop = TaskCategoryEntityModel::props(null, true);
            $table->bigInteger($prop->project_id)->unsigned();
            $table->string($prop->name, 50);
            $table->char($prop->color, 50);
            $table->dateTime($prop->start_date)->nullable();
            $table->dateTime($prop->deadline)->nullable();
            $table->timestamp($prop->created_at);
            $table->bigInteger($prop->user_id)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_categories');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Task\Entities\Task\TaskEntityModel;

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

            $p = TaskEntityModel::props(null, true);

            $table->foreignId($p->record_id)->nullable()->references('id')->on('app_records')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->foreignId($p->owner_id)->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->foreignId($p->workspace_id)->nullable()->references('id')->on('workspaces')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->foreignId($p->parent_id)->nullable()->references('id')->on('tasks')
                ->cascadeOnUpdate()->nullOnDelete();

            $table->foreignId($p->recipient_user_id)->nullable()->references('id')->on('users')
                ->cascadeOnUpdate()->nullOnDelete();

            $table->string($p->name, 150);
            $table->mediumText($p->description)->nullable();
            $table->mediumText($p->solution)->nullable();
            $table->integer($p->time_estimate)->unsigned()->nullable();
            $table->dateTime($p->start_date)->nullable();
            $table->date($p->deadline)->nullable();
            $table->char($p->priority);
            $table->char($p->status);//TaskStatusEnum::toArray()
            $table->smallInteger($p->num_order)->unsigned()->nullable();
            $table->tinyInteger($p->percent_completed)->unsigned()->nullable();
            $table->date($p->repeat_end)->nullable();
            $table->char($p->repeat_type)->nullable();//TaskRepeatTypeEnum::toArray()
            $table->smallInteger($p->repeat_num)->unsigned()->nullable();
            $table->char($p->active, 1)->nullable();

            $table->timestamp($p->created_at)->useCurrent();
            $table->timestamp($p->updated_at)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp($p->deleted_at)->nullable();

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

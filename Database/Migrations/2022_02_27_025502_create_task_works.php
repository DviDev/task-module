<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->bigInteger('task_id');
            $table->bigInteger('user_id');
            $table->timestamp('task_start')->useCurrent();
            $table->timestamp('task_end')->nullable();
            $table->string('description', 200)->nullable();
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
        Schema::dropIfExists('task_works');
    }
}

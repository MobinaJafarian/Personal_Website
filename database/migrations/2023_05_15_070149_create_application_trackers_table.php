<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_trackers', function (Blueprint $table) {
            $table->id();
            $table->string('company-name');
            $table->string('job-title');
            $table->integer('salary');
            $table->string('location');
            $table->string('link');
            $table->text('note');
            $table->text('todo');
            $table->string('file');
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
        Schema::dropIfExists('application_trackers');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('teacher_id')->index();
            $table->unsignedBigInteger('group_id')->index();
            $table->unsignedBigInteger('room_id')->index();
            
            $table->date('date');
            $table->time("start_time");
            $table->time("end_time");
            $table->timestamps();
            
            $table->unique(['teacher_id','group_id','room_id','date','start_time','end_time'], 'schedule_unique_ref');

            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};

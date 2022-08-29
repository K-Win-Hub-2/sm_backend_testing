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
        Schema::create('calendar_controllers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academic_id');
               
            $table->string('calender_name');
            $table->string('calender_startdate');
            $table->string('calender_enddate');
            $table->string('type');

            $table->text('description')->nullable();
            $table->string('color');
            
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
        Schema::dropIfExists('calendar_controllers');
    }
};

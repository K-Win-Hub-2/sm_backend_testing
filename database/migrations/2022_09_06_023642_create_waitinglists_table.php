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
        Schema::create('waitinglists', function (Blueprint $table) {
            $table->id();
            $table->string('formdate');
            $table->string('studentname');
            $table->string('gender');
            $table->string('dateofbirth');
            $table->text('course');
            $table->text('ans1');
            $table->text('ans2');
            $table->text('ans3');
            $table->text('ans4');
            $table->text('ans5');
            $table->text('ans6');
            $table->text('ans7');
            $table->text('ans8');
            $table->text('ans9');
            $table->text('ans10');
            $table->text('ans11');
            $table->text('ans12');
            $table->text('ans13');
            $table->text('ans14');
            $table->text('ans15');
            $table->text('ans16');
            $table->text('ans17');
            $table->text('ans18');
            $table->text('subname');
            $table->text('subemail');
          

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
        Schema::dropIfExists('waitinglists');
    }
};

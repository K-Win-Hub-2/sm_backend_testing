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
        Schema::create('igcseteachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('teacher_category_id');
            $table->string('name');
            $table->string('studied', 3000);
            $table->string('position');
            $table->longText('message');
            $table->string('credential')->nullable();
            $table->string('isDisplay');
            $table->text('teacher_photo_path')->nullable();
            $table->string('sort_by')->nullable();
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
        Schema::dropIfExists('igcseteachers');
    }
};

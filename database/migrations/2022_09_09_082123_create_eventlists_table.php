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
        Schema::create('eventlists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
            $table->LongText('eventimg');
            $table->string('likecount');
            $table->string('reactcount');
            $table->string('time');
    

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
        Schema::dropIfExists('eventlists');
    }
};

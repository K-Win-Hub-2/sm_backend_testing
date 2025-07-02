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
        Schema::create('igcse_teacher_credential_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('igcse_teacher_id')->constrained()->onDelete('cascade');
            $table->foreignId('credential_photo_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('igcse_teacher_credential_photos');
    }
};

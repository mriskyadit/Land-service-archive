<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();

            // Boleh NULL karena tidak semua history berhubungan dengan permohonan
            $table->unsignedBigInteger('permohonan_id')->nullable();

            // Kolom activity wajib ada karena model History::add() pakai ini
            $table->text('activity')->nullable();

            // Kolom tambahan (biarkan NULL supaya tidak bikin error)
            $table->string('status_lama')->nullable();
            $table->string('status_baru')->nullable();
            $table->text('keterangan')->nullable();

            $table->timestamps();

            // Foreign key ke tabel permohonans
            $table->foreign('permohonan_id')
                  ->references('id')
                  ->on('permohonans')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('histories');
    }
};

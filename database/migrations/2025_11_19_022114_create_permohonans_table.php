<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonansTable extends Migration
{
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('jenis_layanan');
            $table->string('status')->default('Loket');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('permohonans');
    }
}

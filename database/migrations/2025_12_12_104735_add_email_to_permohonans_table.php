<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('permohonans', function (Blueprint $table) {
            $table->string('email_pemohon')->nullable()->after('nama_pemohon');
        });
    }

    public function down()
    {
        Schema::table('permohonans', function (Blueprint $table) {
            $table->dropColumn('email_pemohon');
        });
    }
};

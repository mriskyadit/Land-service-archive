<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('histories', function (Blueprint $table) {
            // Jadikan permohonan_id boleh NULL
            $table->unsignedBigInteger('permohonan_id')->nullable()->change();

            // Activity dibuat nullable (optional)
            $table->text('activity')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('histories', function (Blueprint $table) {
            // Balikkan seperti semula (kalau rollback)
            $table->unsignedBigInteger('permohonan_id')->nullable(false)->change();
            $table->text('activity')->nullable(false)->change();
        });
    }
};

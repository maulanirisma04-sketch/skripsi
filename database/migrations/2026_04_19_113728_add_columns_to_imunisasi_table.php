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
        Schema::table('imunisasi', function (Blueprint $table) {
            $table->foreignId('rekam_medis_id')->constrained()->onDelete('cascade');
            $table->string('jenis_imunisasi')->nullable();
            $table->date('jadwal_berikutnya')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('imunisasi', function (Blueprint $table) {
            //
        });
    }
};

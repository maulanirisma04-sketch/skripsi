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
        Schema::create('persalinan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rekam_medis_id')
            ->constrained('rekam_medis')
            ->onDelete('cascade');

            $table->integer('berat_bayi')->nullable();
            $table->integer('tinggi_bayi')->nullable();
            $table->integer('apgar')->nullable();
            $table->string('jenis_persalinan')->nullable();
            $table->string('anestesi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persalinan');
    }
};

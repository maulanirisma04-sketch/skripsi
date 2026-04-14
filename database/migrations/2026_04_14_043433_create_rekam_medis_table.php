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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kunjungan_id')
                    ->constrained('kunjungans')
                    ->onDelete('cascade');

            $table->string('tekanan_darah')->nullable();
            $table->decimal('suhu', 4, 1)->nullable();
            $table->decimal('berat_badan', 5, 2)->nullable();
            $table->string('diagnosis')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};

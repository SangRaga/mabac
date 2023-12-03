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
        Schema::create('pilihan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kriteria');
            $table->unique('kode_kriteria');
            $table->string('nama_kriteria');
            $table->decimal('bobot_kriteria', 11, 3);
            $table->string('jenis_kriteria');
            $table->string('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilihan');
    }
};

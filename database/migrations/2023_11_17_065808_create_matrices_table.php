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
        Schema::create('matrices', function (Blueprint $table) {
            $table->id();
            $table->foreignID('id_alternatif')->references('id')->on('alternatif')->onDelete('cascade');
            $table->foreignID('id_kriteria')->references('id')->on('pilihan')->onDelete('cascade');
            $table->decimal('C');
            // $table->timestamp();
            // $table->unsignedBigInteger('nilai');
            // $table->foreign('nilai')->references('nilai')->on('pilihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matrices');
    }
};

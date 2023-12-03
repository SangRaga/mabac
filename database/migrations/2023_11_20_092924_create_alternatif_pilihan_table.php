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
        Schema::create('alternatif_pilihan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternatif_id');
            $table->unsignedBigInteger('pilihan_id');
            $table->integer('nilai');
            $table->timestamps();

            $table->foreign('alternatif_id')->references('id')->on('alternatif')->onDelete('cascade');
            $table->foreign('pilihan_id')->references('id')->on('pilihan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif_pilihan');
    }
};

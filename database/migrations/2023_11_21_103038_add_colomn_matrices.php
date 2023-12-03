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
        Schema::table('matrices', function (Blueprint $table) {
            // $table->timestamp()->after;
            // $table->unsignedBigInteger('nilai');
            // $table->foreign('nilai')->references('nilai')->on('pilihan');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

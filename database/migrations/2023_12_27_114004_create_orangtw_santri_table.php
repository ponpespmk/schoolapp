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
        Schema::create('orangtw_santri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri_id');
            $table->unsignedBigInteger('orangtw_id');
            $table->timestamps();

            // Definisi foreign keys
            $table->foreign('santri_id')->references('id')->on('santris')->onDelete('cascade');
            $table->foreign('orangtw_id')->references('id')->on('orangtws')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orangtw_santri');
    }
};

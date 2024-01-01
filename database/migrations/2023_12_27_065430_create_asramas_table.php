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
        Schema::create('asramas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_asrama', 64);
            $table->foreignId('ustadz_id')->unique()->nullable()->constrained('ustadzs')->onDelete('set null');
            $table->integer('kapasitas')->nullable();
            $table->string('luas', 64)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asramas');
    }
};

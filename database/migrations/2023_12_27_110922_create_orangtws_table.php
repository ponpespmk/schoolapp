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
        Schema::create('orangtws', function (Blueprint $table) {
            $table->id();
            $table->string('nama_orangtw', 64);
            $table->enum('status',['hidup','meninggal','tdk'])->nullable();
            $table->enum('kwn',['wni','wna'])->nullable();
            $table->enum('hub_dsantri',['ibu','ayah','wali'])->nullable();
            $table->string('nik', 18)->unique()->nullable();
            $table->string('tempat_lahir', 32)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('pddk_terakhir', 32)->nullable();
            $table->string('pek_utama', 32)->nullable();
            $table->string('peng_rata_bln', 32)->nullable();
            $table->string('no_hp', 24)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orangtws');
    }
};

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
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_santri', 64);
            $table->foreignId('asrama_id')->nullable()->constrained('asramas')->onDelete('set null');
            $table->foreignId('rombel_id')->nullable()->constrained('rombels')->onDelete('set null');
            $table->string('nisn', 12)->unique();
            $table->string('nism', 20)->unique()->nullable();
            $table->enum('kwn',['wni','wna'])->nullable();
            $table->string('nik', 18)->unique()->nullable();
            $table->string('tempat_lahir', 64)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('jenkel',['l','p']);
            $table->integer('jml_saudara')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->string('cita_cita', 32)->nullable();
            $table->string('no_hp', 17)->nullable();
            $table->string('email', 35)->nullable();
            $table->string('hobi', 35)->nullable();
            $table->integer('apddk_diikuti');
            $table->integer('keb_khusus')->nullable();
            $table->integer('keb_disabilitas')->nullable();
            $table->string('no_kip', 20)->nullable();
            $table->string('no_kk', 16)->nullable();
            $table->enum('status_keaktifan',['aktif','nonaktif','alumni','mutasi'])->default('aktif');
            $table->date('tgl_aktif');
            $table->date('tgl_nonaktif')->nullable();
            $table->date('tgl_lulus')->nullable();
            $table->date('tgl_mutasi')->nullable();
            $table->string('alasan_nadanm', 64)->nullable();
            $table->enum('kategori',['yatim','piatu','yatim piatu','mualaf','duafa','mampu'])->nullable();
            $table->enum('bansos',['ya','tidak'])->default('tidak');
            $table->enum('pip',['ya','tidak'])->default('tidak');
            $table->string('pas_foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};

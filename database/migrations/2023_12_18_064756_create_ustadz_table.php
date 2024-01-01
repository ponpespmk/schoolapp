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
        Schema::create('ustadzs', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_gabung');
            $table->string('satminkal', 64);
            $table->string('nama_ustadz', 64);
            $table->string('gelar_depan', 16)->nullable();
            $table->string('gelar_belakang', 16)->nullable();
            $table->string('nik', 16)->unique();
            $table->string('tempat_lahir', 32);
            $table->date('tgl_lahir');
            $table->enum('jenkel',['L','P']);
            $table->string('alamat')->nullable();
            $table->enum('gol_darah', ['-','A+','B+','AB+','O+','A-','B-','AB-','O-'])->default('-');
            $table->string('pddk_terakhir', 32)->nullable();
            $table->string('prodi', 64)->nullable();
            $table->date('tgl_ijazah')->nullable();
            $table->string('email', 35)->nullable();
            $table->string('no_hp', 24);
            $table->enum('status_kepegawaian',['PNS','Non PNS','PPPK'])->default('Non PNS');
            $table->string('nip', 24)->nullable();
            $table->string('nipppk', 24)->nullable();
            $table->string('npk', 24)->nullable();
            $table->string('nuptk', 24)->nullable();
            $table->string('npwp', 24)->nullable();
            $table->string('ibu_kandung', 64)->nullable();
            $table->enum('status_perkawinan', ['Kawin','Belum Kawin','Duda/Janda'])->nullable();
            $table->string('nama_suami_istri', 64)->nullable();
            $table->integer('jml_anak')->nullable();
            $table->string('no_kk', 18)->nullable();
            $table->string('jabatan_utama', 32)->nullable();
            $table->string('jabatan_tambahan', 32)->nullable();
            $table->enum('status_penugasan',['TETAP','TIDAK TETAP'])->default('TIDAK TETAP');
            $table->string('mapel_diampu', 64)->nullable();
            $table->integer('jtm')->nullable();
            $table->string('instansi_peng_sk', 64)->nullable();
            $table->string('no_sk', 42)->nullable();
            $table->date('tgl_sk')->nullable();
            $table->string('jenis_sk', 42)->nullable();
            $table->enum('status_keaktifan',['AKTIF','NON AKTIF'])->default('AKTIF');
            $table->string('no_rek', 42)->nullable();
            $table->string('nama_rek', 32)->nullable();
            $table->string('nama_bank', 32)->nullable();
            $table->string('cabang_bank', 32)->nullable();
            $table->string('foto_kk')->nullable();
            $table->string('foto_aktekel')->nullable();
            $table->string('foto_ijazah')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('pas_foto')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ustadz');
    }
};

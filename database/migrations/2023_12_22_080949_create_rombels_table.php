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
        Schema::create('rombels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ustadz_id')->unique()->nullable()->constrained('ustadzs')->onDelete('set null');
            $table->foreignId('tapel_id')->constrained('tapels')->onDelete('restrict');
            $table->integer('tingkat');
            $table->string('nama_rombel', 32)->unique();
            $table->string('nama_ruangan', 32)->unique();
            $table->string('kurikulum', 32);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rombels');
    }
};

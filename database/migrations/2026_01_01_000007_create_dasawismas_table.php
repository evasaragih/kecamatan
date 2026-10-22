<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dasawismas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelurahan_id')->nullable()->constrained('kelurahans')->nullOnDelete();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('nama_ketua')->nullable();
            $table->string('wilayah')->nullable();
            $table->unsignedInteger('jumlah_kk')->nullable();
            $table->unsignedInteger('jumlah_anggota')->nullable();
            $table->text('kegiatan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dasawismas');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();

            $table->string('nama', 20);
            $table->string('slug')->unique();
            $table->string('panjang');

            $table->text('deskripsi')->nullable();

            $table->json('kompetensi')->nullable();
            $table->json('fasilitas')->nullable();
            $table->json('kegiatan')->nullable();
            $table->json('prospek')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};
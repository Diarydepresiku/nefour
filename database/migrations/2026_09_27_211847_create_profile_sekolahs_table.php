<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profile_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('akreditasi')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('npsn')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_sekolahs');
    }
};
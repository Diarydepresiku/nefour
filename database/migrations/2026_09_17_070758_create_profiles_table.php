<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->string('nama_sekolah')->nullable();
            $table->string('logo')->nullable();
            $table->string('foto')->nullable();

            $table->text('deskripsi')->nullable();

            $table->text('visi')->nullable();
            $table->json('misi')->nullable();

            $table->string('npsn')->nullable();
            $table->string('akreditasi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
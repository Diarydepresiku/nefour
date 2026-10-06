<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->string('produsen')->nullable()->after('deskripsi');
            $table->string('penjual')->nullable()->after('produsen');
            $table->string('metode_pembelian')->nullable()->after('penjual');
            $table->string('nomor_wa')->nullable()->after('metode_pembelian');
            $table->text('keterangan_pembelian')->nullable()->after('nomor_wa');
        });
    }

    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn([
                'produsen',
                'penjual',
                'metode_pembelian',
                'nomor_wa',
                'keterangan_pembelian',
            ]);
        });
    }
};
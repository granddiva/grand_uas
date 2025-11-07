<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('layanan_posyandus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_id');
            $table->unsignedBigInteger('warga_id');
            $table->float('berat');
            $table->float('tinggi');
            $table->string('vitamin');
            $table->string('konseling');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanan_posyandus');
    }
};

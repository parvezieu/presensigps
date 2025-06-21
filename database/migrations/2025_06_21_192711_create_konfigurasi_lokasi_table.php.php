<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konfigurasi_lokasi', function (Blueprint $table) {
            $table->id(); // satu-satunya kolom auto increment
            $table->string('lokasi_kantor', 255);
            $table->smallInteger('radius'); // jangan autoIncrement di sini!
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konfigurasi_lokasi');
    }
};

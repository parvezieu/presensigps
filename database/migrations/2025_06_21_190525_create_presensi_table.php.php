<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->char('nik', 5);
            $table->date('tgl_presensi');
            $table->time('jam_in');
            $table->time('jam_out')->nullable();
            $table->string('foto_in', 255);
            $table->string('foto_out', 255)->nullable();
            $table->text('lokasi_in');
            $table->text('lokasi_out')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};

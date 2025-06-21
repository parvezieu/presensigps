<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->char('nik', 5)->primary();
            $table->string('nama_lengkap', 100);
            $table->string('jabatan', 20);
            $table->string('no_hp', 13);
            $table->string('foto', 30)->nullable();
            $table->char('kode_dept', 3);
            $table->string('password', 255);
            $table->rememberToken();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};

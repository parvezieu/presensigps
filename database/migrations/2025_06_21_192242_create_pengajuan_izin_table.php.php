<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_izin', function (Blueprint $table) {
            $table->id();
            $table->char('nik', 5);
            $table->date('tgl_izin');
            $table->char('status', 1)->comment('i:izin s:sakit c:cuti');
            $table->string('keterangan', 255);
            $table->string('status_approved', 255)->default('0')->comment('0:pending 1:disetujui 2:ditolak');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_izin');
    }
};

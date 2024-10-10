<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_ses', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('judul');
            $table->string('pembuat_dokumen');
            $table->date('tanggal_surat');
            $table->text('ringkasan');
            $table->string('status');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_ses');
    }
};

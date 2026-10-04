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
        Schema::create('keuangan', function (Blueprint $table) {
            $table->integer('idkeuangan')->autoIncrement();
            $table->integer('idpengguna');
            $table->string('judul', 250);
            $table->text('keterangan');
            $table->date('tanggal');
            $table->string('jumlah', 15);
            $table->string('tipe', 50)->default('');

            // Foreign key relasi ke tabel pengguna
            $table->foreign('idpengguna')
                  ->references('idpengguna')
                  ->on('pengguna')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangan');
    }
};

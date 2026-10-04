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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->integer('idkegiatan')->autoIncrement();
            $table->integer('idpengguna');
            $table->string('namakegiatan', 200);
            $table->text('deskripsikegiatan');
            $table->date('tanggal');
            $table->text('file')->nullable();

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
        Schema::dropIfExists('kegiatan');
    }
};

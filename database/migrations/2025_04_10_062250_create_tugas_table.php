<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tugas');
            $table->text('deskripsi')->nullable();
            $table->timestamp('last_updated')->nullable();
            $table->timestamps(); 

            $table->unsignedBigInteger('jadwal_piket_id');
            $table->unsignedBigInteger('siswa_id');

            $table->foreign('jadwal_piket_id')->references('id')->on('jadwal_piket')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};

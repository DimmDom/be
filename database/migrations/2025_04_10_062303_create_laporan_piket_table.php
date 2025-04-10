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
        Schema::create('laporan_piket', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['selesai', 'belum selesai']);
            $table->text('keterangan');
            $table->string('photo')->nullable();
           
            $table->timestamps();

            $table->unsignedBigInteger('tugas_id');
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('jadwal_piket_id');

            $table->foreign('tugas_id')->references('id')->on('tugas')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('jadwal_piket_id')->references('id')->on('jadwal_piket')->onDelete('cascade');
        });
    }
    
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_piket');
    }
};

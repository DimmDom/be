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
        Schema::create('jadwal_piket', function (Blueprint $table) {
            $table->id();
            $table->date('hari');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();

            $table->unsignedBigInteger('siswa_id');
            
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
           
        });
    }
    
   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_piket');
    }
};

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalPiket;

class JadwalPiketSeeder extends Seeder
{
    public function run()
    {
        // Example: Insert a jadwal_piket record
        JadwalPiket::create([
            'hari' => '2025-04-10',
            'siswa_id' => 1, // Make sure there is a siswa with ID 1
        ]);
    }
}

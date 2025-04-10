<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Tugas;
use App\Models\JadwalPiket;
use App\Models\Siswa;


class TugasSeeder extends Seeder
{
    public function run(): void
    {
// Example: Insert a valid jadwal_piket_id
$jadwalPiketId = JadwalPiket::first()->id;  // Ensure there's at least one record in jadwal_piket
$siswaId = Siswa::first()->id; // Ensure there's at least one record in siswa

Tugas::create([
    'nama_tugas' => 'Menyapu',
    'deskripsi' => 'Deskripsi tugas menyapu',
    'jadwal_piket_id' => $jadwalPiketId,
    'siswa_id' => $siswaId,
]);

    }
}

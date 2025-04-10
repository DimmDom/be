<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Siswa;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'id'       => 1,
            'username' => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
        ]);

        // Siswa
        $siswaUser = User::create([
            'id'       => 2,
            'username' => 'siswa1',
            'email'    => 'siswa1@gmail.com',
            'password' => Hash::make('siswa123'),
            'role'     => 'siswa',
        ]);

        Siswa::create([
            'user_id'     => $siswaUser->id,
            'nama_siswa'  => 'Budi Siswa',
            'kelas'       => 'XI PPLG',
            'no_induk'    => 123456,
            'no_hp'       => '08123456789',
            'last_updated'=> now(),
        ]);
    }
}

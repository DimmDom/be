<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Siswa;

class RegisterController extends Controller
{
    // ✅ Tampilkan form register siswa
    public function showSiswaForm()
    {
        return view('auth.register'); // pastikan file ini ada di resources/views/auth/register.blade.php
    }

    // ✅ Proses register siswa
    public function registerSiswa(Request $request)
    {
        $request->validate([
            'username'    => 'required|string|max:255|unique:users,username',
            'name'        => 'required|string|max:255',
            'email'       => 'required|string|email|max:255|unique:users',
            'password'    => 'required|string|min:6|confirmed',
            'nama_siswa'  => 'required|string|max:255',
            'kelas'       => 'required|string|max:50',
            'no_induk'    => 'required|numeric|unique:siswa,no_induk',
            'no_hp'       => 'required|string|max:15',
        ]);

        $user = User::create([
            'username' => $request->username,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'siswa',
        ]);

        Siswa::create([
            'user_id'     => $user->id,
            'nama_siswa'  => $request->nama_siswa,
            'kelas'       => $request->kelas,
            'no_induk'    => $request->no_induk,
            'no_hp'       => $request->no_hp,
            'last_updated'=> now(),
        ]);

        Auth::login($user);

        return redirect()->route('siswa.tugas');
    }
}

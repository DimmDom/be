<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\JadwalPiket;
use App\Models\Tugas;
use App\Models\LaporanPiket;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 

class AdminController extends Controller
{

    // 
    //  Dashboard
    // 

    public function welcome()
    {
        return view('admin.welcome');
    }


    public function siswa()
    {
        $siswa = Siswa::all();
        return view('admin.siswa.index', compact('siswa'));
    }

    public function jadwal()
    {
        $jadwal = JadwalPiket::with('siswa')->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function tugas()
    {
        $tugas = Tugas::all();
        return view('admin.tugas.index', compact('tugas'));
    }

    public function riwayat()
    {
        $riwayat = LaporanPiket::with('siswa', 'tugas', 'jadwal')->get();
        return view('admin.riwayat.index', compact('riwayat'));
    }

    // 
    //  CRUD Siswa 
    // 

    public function createSiswa()
    {
        return view('admin.siswa.create');
    }

    public function storeSiswa(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kelas'      => 'required|string|max:50',
            'no_induk'   => 'required|numeric|unique:siswa',
            'no_hp'      => 'required|string|max:15|unique:siswa',
            'email'      => 'required|email|unique:users,email', 
        ]);
    
        // Buat user login untuk siswa
        $user = User::create([
            'username' => $request->nama_siswa,
            'email'    => $request->email, 
            'password' => Hash::make(strtolower($request->nama_siswa) . '123'),  //passwordnya otomatis nama siswa + 123
            'role'     => 'siswa',
        ]);
    
        // Buat data siswa
        Siswa::create([
            'user_id'     => $user->id,
            'nama_siswa'  => $request->nama_siswa,
            'kelas'       => $request->kelas,
            'no_induk'    => $request->no_induk,
            'no_hp'       => $request->no_hp,
            'last_updated'=> now(),
        ]);

        return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function editSiswa($id)
        {
         $siswa = Siswa::findOrFail($id);
            return view('admin.siswa.edit', compact('siswa'));
        }

        public function updateSiswa(Request $request, $id)
        {
            $siswa = Siswa::with('user')->findOrFail($id);
        
            $request->validate([
                'username' => 'required|string|max:255|unique:users,username,' . $siswa->user->id,
                'email' => 'required|email|max:255|unique:users,email,' . $siswa->user->id,
                'nama_siswa' => 'required|string|max:255',
                'kelas' => 'required|string|max:50',
                'no_induk' => 'required|numeric|unique:siswa,no_induk,' . $siswa->id,
                'no_hp' => 'required|string|max:15|unique:siswa,no_hp,' . $siswa->id,
            ]);
        
            // update users table 
            $siswa->user->update([
                'username' => $request->username,
                'email'    => $request->email,
            ]);
        
            // update siswa table 
            $siswa->update([
                'nama_siswa'   => $request->nama_siswa,
                'kelas'        => $request->kelas,
                'no_induk'     => $request->no_induk,
                'no_hp'        => $request->no_hp,
                'last_updated' => now(),
            ]);
        
            return redirect()->route('admin.siswa')->with('success', 'Data siswa & akun berhasil diperbarui.');
        }
        

        public function destroySiswa($id)
        {
            $siswa = Siswa::findOrFail($id);
            $siswa->delete();

            return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil dihapus.');
        }


        public function createJadwal()
{
    $siswa = Siswa::all();
    return view('admin.jadwal.create', compact('siswa'));
}

public function storeJadwal(Request $request)
{
    $request->validate([
        'hari' => 'required|date',
        'siswa_id' => 'required|exists:siswa,id',
    ]);

    JadwalPiket::create([
        'hari' => $request->hari,
        'siswa_id' => $request->siswa_id,
        'created_at' => now(),
    ]);

    return redirect()->route('admin.jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
}

public function editJadwal($id)
{
    $jadwal = JadwalPiket::findOrFail($id);
    $siswa = Siswa::all();
    return view('admin.jadwal.edit', compact('jadwal', 'siswa'));
}

public function updateJadwal(Request $request, $id)
{
    $request->validate([
        'hari' => 'required|date',
        'siswa_id' => 'required|exists:siswa,id',
    ]);

    JadwalPiket::findOrFail($id)->update([
        'hari' => $request->hari,
        'siswa_id' => $request->siswa_id,
        'updated_at' => now(),
    ]);

    return redirect()->route('admin.jadwal')->with('success', 'Jadwal berhasil diperbarui.');
}

public function destroyJadwal($id)
{
    JadwalPiket::destroy($id);
    return redirect()->route('admin.jadwal')->with('success', 'Jadwal berhasil dihapus.');
}
// =====================
// == CRUD Tugas ==
// =====================

public function createTugas()
{
    return view('admin.tugas.create');
}

public function storeTugas(Request $request)
{
    $request->validate([
        'nama_tugas' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
    ]);

    Tugas::create([
        'nama_tugas' => $request->nama_tugas,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('admin.tugas')->with('success', 'Tugas berhasil ditambahkan.');
}

public function editTugas($id)
{
    $tugas = Tugas::findOrFail($id);
    return view('admin.tugas.edit', compact('tugas'));
}

public function updateTugas(Request $request, $id)
{
    $request->validate([
        'nama_tugas' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
    ]);

    $tugas = Tugas::findOrFail($id);
    $tugas->update([
        'nama_tugas' => $request->nama_tugas,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('admin.tugas')->with('success', 'Tugas berhasil diperbarui.');
}

public function destroyTugas($id)
{
    $tugas = Tugas::findOrFail($id);
    $tugas->delete();

    return redirect()->route('admin.tugas')->with('success', 'Tugas berhasil dihapus.');
}

}


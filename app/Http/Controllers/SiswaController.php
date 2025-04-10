<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\LaporanPiket;

class SiswaController extends Controller
{
    public function tugas()
    {
        $userId = auth()->id();
        $siswa = \App\Models\Siswa::where('user_id', $userId)->first();
    
        $tugas = \App\Models\Tugas::where('siswa_id', $siswa->id)->get();
    
        return view('siswa.tugas', compact('tugas'));
    }
    

    public function detail($id)
    {
        $tugasDetail = \App\Models\Tugas::findOrFail($id);
        $userId = auth()->id();
        $siswa = \App\Models\Siswa::where('user_id', $userId)->first();
    
        $tugas = \App\Models\Tugas::where('siswa_id', $siswa->id)->get();
    
        return view('siswa.detail', [
            'tugasDetail' => $tugasDetail,
            'tugas' => $tugas,
        ]);
    }
    


    public function submit(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required',
            'photo' => 'required|image|max:2048'
        ]);

        $photoPath = $request->file('photo')->store('bukti', 'public');

        LaporanPiket::create([
            'tugas_id' => $id,
            'siswa_id' => auth()->id(),
            'jadwal_piket_id' => $request->jadwal_id ?? 1,
            'status' => 'selesai',
            'keterangan' => $request->keterangan,
            'photo' => $photoPath,
        ]);

        return redirect()->route('siswa.tugas')->with('success', 'Tugas berhasil dilaporkan!');
    }

    // CRUD OPERATIONS

    
}

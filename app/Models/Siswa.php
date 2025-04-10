<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'user_id',
        'nama_siswa',
        'kelas',
        'no_induk',
        'no_hp',
        'last_updated',
    ];

    // Relasi ke user (login)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke jadwal piket
    public function jadwalPiket(): HasMany
    {
        return $this->hasMany(JadwalPiket::class, 'siswa_id');
    }

    // Relasi ke tugas
    public function tugas(): HasMany
    {
        return $this->hasMany(Tugas::class, 'siswa_id');
    }

    // Relasi ke laporan piket
    public function laporanPiket(): HasMany
    {
        return $this->hasMany(LaporanPiket::class, 'siswa_id');
    }
}

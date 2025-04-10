<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JadwalPiket extends Model
{
    protected $table = 'jadwal_piket';

    protected $fillable = ['hari', 'siswa_id'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function tugas(): HasMany
    {
        return $this->hasMany(Tugas::class, 'jadwal_piket_id');
    }

    public function laporanPiket(): HasMany
    {
        return $this->hasMany(LaporanPiket::class, 'jadwal_piket_id');
    }
}

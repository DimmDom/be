<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tugas extends Model
{
    protected $table = 'tugas';

    protected $fillable = ['nama_tugas', 'deskripsi', 'status_pengerjaan', 'last_updated', 'jadwal_id', 'siswa_id'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(JadwalPiket::class, 'jadwal_piket_id');
    }

    public function laporanPiket(): HasMany
    {
        return $this->hasMany(LaporanPiket::class, 'tugas_id');
    }
}

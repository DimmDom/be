<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanPiket extends Model
{
    protected $table = 'laporan_piket';

    protected $fillable = ['status', 'keterangan', 'photo', 'tugas_id', 'siswa_id', 'jadwal_piket_id'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function tugas(): BelongsTo
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }

    public function jadwalPiket(): BelongsTo
    {
        return $this->belongsTo(JadwalPiket::class, 'jadwal_piket_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pasien',
        'alamat',
        'usia',
        'pemeriksaan',
        'keluhan',
        'foto_resep',

    ];

    public function Pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function Laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}

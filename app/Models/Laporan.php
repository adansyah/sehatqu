<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pasien',
        'alamat',
        'usia',
        'pemeriksaan',
        'keluhan',
        'foto_resep',
        'valid',

    ];

    public function Resep()
    {
        return $this->hasMany(Resep::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    // protected $casts = [
    //     'id_obat' => 'array',
    // ];
    protected $fillable = [
        'nama_pasien',
        'alamat',
        'usia',
        'pemeriksaan',
        'keluhan',
        'foto_resep',
        'id_obat',
        'harga',
        'id_dokter',
        'harga_konsultasi',
        'total'
    ];
    protected $primaryKey = 'id';

    public function Transaksi()
    {
        return $this->hasMany(Pasien::class, 'id_pasien', 'id');
    }

    public function Obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }



    public function Dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id');
    }

    public function Resep()
    {
        return $this->hasMany(Pasien::class, 'id_pasien', 'id');
    }


    // public function getObatsAttribute()
    // {
    //     $ids = $this->id_obat;

    //     if (is_array($ids)) {
    //         return \App\Models\Obat::whereIn('id', $ids)->get();
    //     }

    //     return collect();
    // }
}

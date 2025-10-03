<?php

namespace App\Models;

use App\Models\Obat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    // protected $casts = [
    //     'id_obat' => 'array',
    // ];
    protected $fillable = [
        'id_pasien',
        'alamat',
        'id_obat',
        'harga',
        'id_dokter',
        'harga_konsultasi',
        'pemeriksaan',
        'total'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }
    public function Pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
    public function Dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id');
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

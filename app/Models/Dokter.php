<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_dokter',
        'spesialis',
        'deskripsi',
        'harga_konsultasi',
        'gambar',
    ];

    public function Transaksi()
    {
        return $this->hasMany(Dokter::class, 'id_dokter', 'id');
    }

    public function Pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}

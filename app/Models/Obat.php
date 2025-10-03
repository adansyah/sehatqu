<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'Obats';
    protected $guarded = ['id'];

    public function Transaksi()
    {
        return $this->hasMany(Obat::class, 'id_obat', 'id');
    }



    public function Pasien()
    {
        return $this->hasMany(Obat::class, 'id_obat', 'id');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;

class LaporanPasienController extends Controller
{
    public function index()
    {
        $data = Resep::all();
        return view('admin.laporanpasien.laporan', compact('data'));
    }
}

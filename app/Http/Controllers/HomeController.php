<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $count = Transaksi::Where('status', 'Belum Dibayar')->count();
        return view('user.home.halaman', compact('count'));
    }

    public function dashboard()
    {
        $obat = Obat::count();
        $dokter = Dokter::count();
        $penghasilan = Transaksi::sum('total');
        return view('admin.dashboard.index', compact('obat', 'dokter', 'penghasilan'));
    }
    public function awal()
    {
        $count = Transaksi::Where('status', 'Belum Dibayar')->count();
        return view('awal', compact('count'));
    }
    public function pesan()
    {
        $dokter = Dokter::all();
        $transaksi = Transaksi::all();
        $count = Transaksi::Where('status', 'Belum Dibayar')->count();
        return view('user.konsultasi.pesan', compact('count', 'dokter', 'transaksi'));
    }
}

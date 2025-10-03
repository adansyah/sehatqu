<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Resep;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Midtrans\Snap;
use Midtrans\Config;

class KonsulController extends Controller
{
    public function index()
    {
        $count = Transaksi::Where('status', 'Belum Dibayar')->count();
        return view('user.konsultasi.konsultasi', compact('count'));
    }
    public function konsultasis()
    {
        $data = Pasien::paginate(5);
        return view('admin.konsultasi.index', compact('data'));
    }

    public function create()
    {
        return view('admin/konsultasi/tambssah');
    }

    public function store(Request $request)
    {
        $gambar_file = $request->file('foto_resep');
        $gambar_ekstensi = $gambar_file->extension();
        $nama_gambar = date('ymdhis') . "." . $gambar_ekstensi;
        $gambar_file->move(public_path('img/pasien'), $nama_gambar);

        $register = [
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'usia' => $request->usia,
            'pemeriksaan' => $request->pemeriksaan,
            'keluhan' => $request->keluhan,
            'foto_resep' => $nama_gambar,
        ];

        $resep = [
            'nama_pasien' => $request->nama_pasien,
            'keluhan' => $request->keluhan,
            'usia' => $request->usia,
            'pemeriksaan' => $request->pemeriksaan,
            'foto_resep' => $nama_gambar,

        ];

        Pasien::create($register);
        Resep::create($resep);
        Alert::success('Jawaban Kamu akan Direkap Admin', 'Ditunggu yaa!!!');
        return redirect('/konsultasi');
    }

    public function edit($id)
    {
        $data = Pasien::find($id);
        $obat = Obat::all();
        $dokter = Dokter::all();

        return view('admin.konsultasi.tambah', compact('data', 'obat', 'dokter'));
    }

    public function show($id)
    {
        $data = Pasien::find($id);

        return view('admin/konsultasi/show', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'usia' => 'required|numeric|min:0',
            'keluhan' => 'required|string',
            'id_obat' => 'required',
            'harga' => 'required|numeric',
            'id_dokter' => 'required|exists:dokters,id',
            'harga_konsultasi' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        // Ambil data konsultasi berdasarkan ID
        $data = Pasien::findOrFail($id);

        // Update data
        $data->update([
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'usia' => $request->usia,
            'keluhan' => $request->keluhan,
            'id_obat' => is_array($request->id_obat) ? implode(',', $request->id_obat) : null,
            'harga' => $request->harga,
            'id_dokter' => $request->id_dokter,
            'harga_konsultasi' => $request->harga_konsultasi,
            'total' => $request->total,
        ]);

        return redirect('/konsultasis')->with('success', 'Data konsultasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $konsultasis = Pasien::find($id);
        $konsultasis->delete();
        Alert::success('Berhasil Menghapus Konsultasi', 'Terima Kasih');
        return redirect('/konsultasis');
    }

    public function proses($id)
    {
        $pasien = Pasien::findOrFail($id);

        Transaksi::create([
            'id_pasien'        => $pasien->nama_pasien,  // atau $pasien->id jika Anda ingin pakai ID asli
            'alamat'           => $pasien->alamat,
            'id_obat'          => $pasien->id_obat,
            'harga'            => $pasien->harga,
            'id_dokter'        => $pasien->id_dokter,
            'harga_konsultasi' => $pasien->harga_konsultasi,
            'pemeriksaan'      => $pasien->pemeriksaan,
            'total'            => $pasien->total,
            'status'           => 'Belum Dibayar',
        ]);

        $pasien->delete();

        return redirect()->back()->with('success', 'Pasien berhasil dipindahkan ke transaksi.');
    }

    public function __construct()
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
    }

    public function createTransaction(Request $request)
    {
        $transaksi = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . time(),
                'gross_amount' => 10000,
            ],
            'customer_details' => [
                'first_name' => 'Nama',
                'email' => 'email@example.com',
            ]
        ];

        $transaksi = Snap::getSnapToken($transaksi);

        return view('user.konsultasi.checkout', compact('transaksi'));
    }

    public function download($id)
    {
        $transaksi = Transaksi::find($id);
        return view('user.konsultasi.download', compact('transaksi'));
    }
}

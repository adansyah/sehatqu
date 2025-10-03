<?php

namespace App\Http\Controllers;

use Log;
use Midtrans\Snap;
use App\Models\Obat;
use Midtrans\Config;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::all();
        return view('admin.transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasien = Pasien::all();
        $obat = Obat::all();
        $dokter = Dokter::all();
        $data = Transaksi::all();
        $konsul = Pasien::all();
        return view('admin.transaksi.tambah', compact('pasien', 'obat', 'dokter', 'data', 'konsul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Transaksi::create([
            'id_pasien' => $request->id_pasien,
            'alamat' => $request->alamat,
            'id_obat' => $request->id_obat,
            'harga' => $request->harga,
            'id_dokter' => $request->id_dokter,
            'harga_konsultasi' => $request->harga_konsultasi,
            'pemeriksaan' => $request->pemeriksaan,
            'total' => $request->total,
            $request->except(['_token']),
        ]);


        return redirect('/transaksi');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        Alert::success('Berhasil Menghapus Transaksi', 'success');
        return redirect('/transaksi');
    }



    public function bayar($id)
    {
        $payment = Transaksi::findOrFail($id);
        $payment->status = 'Sudah Dibayar';
        $payment->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil.');
    }

    public function formPembayaran($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('user.konsultasi.bayar', compact('transaksi'));
    }

    public function prosesPembayaran(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        if ($transaksi) {
            $transaksi->status = 'Sudah Dibayar';
            $transaksi->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
    public function status(Request $request)
    {
        $transaksi = Transaksi::find($request->id);

        if ($transaksi) {
            $transaksi->status = 'Sudah Dibayar';
            $transaksi->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function __construct()
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
    }

    public function createTransaction(Request $request, $id)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $transaksi = Transaksi::with(['obat'])->findOrFail($id); // pastikan ada relasi 'obat'

        // Cek dan update stok obat jika belum dibayar
        if ($transaksi->status !== 'Sudah Dibayar') {
            $obat = Obat::find($transaksi->id_obat);
            if ($obat && $obat->stok > 0) {
                $obat->stok -= 1;
                $obat->save();
            }

            $transaksi->save();
        }

        // Buat parameter transaksi ke Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . time(),
                'gross_amount' => $transaksi->total, // pastikan ada kolom total di tabel transaksi
            ],
            'customer_details' => [
                'first_name' => 'Pasien #' . $transaksi->id_pasien,
                'email' => 'email@example.com', // jika ada email, gunakan dari pasien
            ],
        ];

        // Dapatkan token dari Midtrans
        $snapToken = Snap::getSnapToken($params);

        return view('user.konsultasi.checkout', compact('snapToken', 'transaksi'));
    }
}

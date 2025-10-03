<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::paginate(5);
        $count = Transaksi::Where('status', 'Belum Dibayar')->count();

        $data = [
            'obat' => $obat
        ];
        return view('user.obat.obat', compact('obat', 'count'));
    }
    public function obats()
    {
        $obat = Obat::paginate(10);

        $data = [
            'obat' => $obat
        ];
        return view('admin.obat.index', compact(['obat']));
    }

    public function co(Request $request)
    {
        return view('user.obat.co');
    }

    public function create()
    {
        $data = Obat::all();
        return view('admin.obat.tambah', [
            'kd_obat'   => 'KD' . rand(10000, 99999),
        ], compact('data'));
    }

    public function store(Request $request)

    {
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $nama_gambar = date('ymdhis') . "." . $gambar_ekstensi;
        $gambar_file->move(public_path('img/obat'), $nama_gambar);

        $register = [
            'kd_obat' => $request->kd_obat,
            'nama_obat' => $request->nama_obat,
            'kategori_obat' => $request->kategori_obat,
            'harga' => $request->harga,
            'dosis' => $request->dosis,
            'aturan_minum' => $request->aturan_minum,
            'gambar' => $nama_gambar,
        ];

        Obat::create($register);

        Alert::toast('Berhasil Menambah Obat', 'success');
        return redirect('/obats');
    }

    public function edit($id)
    {
        $obat = Obat::find($id);
        return view('admin.obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $data = Obat::findOrFail($id);
        $data->update($request->all());

        Alert::toast('Berhasil Mengedit Obat', 'success');
        return redirect('/obats');
    }

    public function destroy($id)
    {
        $obat = Obat::find($id);
        $obat->delete();
        Alert::success('Berhasil Menghapus Obat', 'success');
        return redirect('/obats');
    }

    public function laporan()
    {
        $obat = Obat::all();
        return view('admin.laporanobat.index', compact('obat'));
    }

    public function laporanedit($id)
    {
        $data = Obat::find($id);
        return view('admin.laporanobat.edit', compact('data'));
    }
}

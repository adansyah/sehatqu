<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Resep;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Laporan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DokterController extends Controller
{
    public function index()
    {
        $data = Dokter::paginate(10);
        $count = Transaksi::Where('status', 'Belum Dibayar')->count();
        return view('user.dokter.dokter', compact('data', 'count'));
    }
    public function dokters()
    {
        $data = Dokter::paginate(10);
        return view('admin.dokter.index', compact('data'));
    }

    public function create()
    {
        return view('admin/dokter/tambah');
    }

    public function store(Request $request)
    {
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $nama_gambar = date('ymdhis') . "." . $gambar_ekstensi;
        $gambar_file->move(public_path('img/dokter'), $nama_gambar);

        $register = [
            'nama_dokter' => $request->nama_dokter,
            'spesialis' => $request->spesialis,
            'deskripsi' => $request->deskripsi,
            'harga_konsultasi' => $request->harga_konsultasi,
            'gambar' => $nama_gambar,
        ];

        Dokter::create($register);
        Alert::toast('Berhasil Menambah Dokter', 'success');
        return redirect('/dokters');
        // dd($register);
    }

    public function edit($id)
    {
        $data = Dokter::find($id);
        return view('admin/dokter/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Dokter::findOrFail($id);
        $data->update($request->all());
        Alert::toast('Berhasil Mengedit Dokter', 'success');
        return redirect('/dokters');
    }

    public function destroy($id)
    {
        $dokter = Dokter::find($id);
        $dokter->delete();

        Alert::success('Berhasil Menghapus Dokter', 'success');
        return redirect('/dokters');
    }

    public function dashboard()
    {
        $obat = Pasien::Where('valid', 'Valid', 'Tidak Valid')->count();
        return view('doctor.dashboard.index', compact('obat'));
    }

    public function doctor()
    {
        $data = Resep::latest('created_at')->paginate(5);
        return view('doctor.konsultasi.resep', compact('data'));
    }

    public function resep(Request $request, $id)
    {
        $resep = Resep::findOrFail($id);



        Pasien::where('nama_pasien', $resep->nama_pasien)->update([
            'valid' => 'Valid',
        ]);



        return redirect()->back()->with('success', 'Pasien berhasil dipindahkan ke transaksi.');
    }

    public function resep_noval(Request $request, $id)
    {
        $resep = Resep::findOrFail($id);



        Pasien::where('nama_pasien', $resep->nama_pasien)->update([
            'valid' => 'Tidak Valid',
        ]);


        return redirect()->back();
    }

    public function laporanPasien()
    {
        $data = Resep::paginate(5);
        return view('doctor.konsultasi.laporan', compact('data'));
    }

    public function dokter_login()
    {
        return view('doctor.auth.login');
    }

    public function loginproses(Request $request)
    {
        $dataLogin = [
            'email' => $request->email,
            'password'  => $request->password,
        ];

        $user = new User;
        $proses = $user::where('email', $request->email)->first();

        if ($proses->is_active === 0) {
            Alert::toast('Kamu belum register', 'error');
            return back();
        }
        if (Auth::attempt($dataLogin)) {
            Alert::toast('Kamu berhasil login', 'success');
            $request->session()->regenerate();
            return redirect()->intended('/doctor/dashboard');
        } else {
            Alert::toast('Email dan Password salah', 'error');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::toast('Kamu berhasil Logout', 'success');
        return redirect('/doctor');
    }
}

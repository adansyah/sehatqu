<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Karyawan::paginate(5);
        return view('admin.karyawan.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.karyawan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'no_telp' => 'required|string',
            'email' => 'required|string',
            'jadwal' => 'required|string',
            'jam' => 'required|string',
        ]);

        Karyawan::create($request->all());
        Alert::toast('Berhasil Menambah Karyawan', 'success');
        return redirect('/karyawan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.karyawan.edit', compact('karyawan'));
    }
    public function jam($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.karyawan.jam', compact('karyawan'));
    }

    public function updatejam(Request $request, $id)
    {
        $request->validate([
            'senin' => 'required|in:Pagi,Siang,Malam',
            'selasa' => 'required|in:Pagi,Siang,Malam',
            'rabu' => 'required|in:Pagi,Siang,Malam',
            'kamis' => 'required|in:Pagi,Siang,Malam',
            'jumat' => 'required|in:Pagi,Siang,Malam',
            'sabtu' => 'required|in:Pagi,Siang,Malam',
        ]);

        $karyawan = Karyawan::findOrFail($id);

        $karyawan->update([
            'senin' => $request->senin,
            'selasa' => $request->selasa,
            'rabu' => $request->rabu,
            'kamis' => $request->kamis,
            'jumat' => $request->jumat,
            'sabtu' => $request->sabtu,
        ]);

        return redirect('/karyawan')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'no_telp' => 'required|numeric',
            'email' => 'required|email',
            'jadwal' => 'required|in:Pagi,Siang,Malam',
        ]);

        $karyawan = Karyawan::findOrFail($id);

        $karyawan->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'jadwal' => $request->jadwal,
        ]);

        return redirect('/karyawan')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $karyawan = karyawan::find($id);
        $karyawan->delete();
        Alert::success('Berhasil Menghapus karyawan', 'success');
        return redirect('/karyawan');
    }
}

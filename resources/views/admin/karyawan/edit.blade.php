@extends('admin.layouts.app')

@section('content')
    <div id="formPertanyaan" class="container text-center">
        <h3>Form Edit Karyawan</h3>
        <form action="/karyawan/{{ $karyawan->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="nama" class="col-sm-4 col-form-label text-right">Nama Karyawan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $karyawan->nama }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="jabatan" class="col-sm-4 col-form-label text-right">Bidang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="jabatan" name="jabatan"
                        value="{{ $karyawan->jabatan }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telp" class="col-sm-4 col-form-label text-right">No Telp</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="no_telp" name="no_telp"
                        value="{{ $karyawan->no_telp }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-right">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="email" name="email" value="{{ $karyawan->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="jadwal" class="col-sm-4 col-form-label text-right">Jadwal Kerja</label>
                <div class="col-sm-6">
                    <select name="jadwal" id="jadwal" class="form-control" required>
                        <option value="">-- Pilih Jadwal --</option>
                        <option value="Pagi" {{ $karyawan->jadwal == 'Pagi' ? 'selected' : '' }}>Pagi</option>
                        <option value="Siang" {{ $karyawan->jadwal == 'Siang' ? 'selected' : '' }}>Siang</option>
                        <option value="Malam" {{ $karyawan->jadwal == 'Malam' ? 'selected' : '' }}>Malam</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-4 col-sm-6">
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection

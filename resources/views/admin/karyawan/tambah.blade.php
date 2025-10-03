@extends('admin.layouts.app')

@section('content')
    <div id="formPertanyaan" class="container text-center">
        <h3>Form Tambah Karyawan</h3>
        <form action="/karyawan/simpan" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="nama_obat" class="col-sm-4 col-form-label text-right">Nama Karyawan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_obat" name="nama">
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi_obat" class="col-sm-4 col-form-label text-right">Bidang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="deskripsi_obat" name="jabatan">
                </div>
            </div>
            <div class="form-group row">
                <label for="stok" class="col-sm-4 col-form-label text-right">No Telp</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="stok" name="no_telp">
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-4 col-form-label text-right">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="harga" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="jadwal" class="col-sm-4 col-form-label text-right">Jadwal Kerja</label>
                <div class="col-sm-6">
                    <select name="jadwal" id="jadwal" class="form-control" required>
                        <option value="">-- Pilih Jadwal --</option>
                        <option value="Pagi">Pagi</option>
                        <option value="Siang">Siang</option>
                        <option value="Malam">Malam</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="Jam" class="col-sm-4 col-form-label text-right">Jam</label>
                <div class="col-sm-6">
                    <select name="jam" id="Jam" class="form-control" required>
                        <option value="">-- Pilih Jam --</option>
                        <option value="07:00 - 12:00">Pagi</option>
                        <option value="12:00 - 18:00">Siang</option>
                        <option value="18:00 - 00:00">Malam</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-4 col-sm-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

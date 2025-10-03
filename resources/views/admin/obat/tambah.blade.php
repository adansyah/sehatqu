@extends('admin.layouts.app')

@section('content')
    <div id="formPertanyaan" class="container text-center">
        <h3>Form Tambah Data</h3>
        <form action="/obats/simpan" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="nama_obat" class="col-sm-4 col-form-label text-right">Kode Obat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kd_obat" name="kd_obat" value="{{$kd_obat}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_obat" class="col-sm-4 col-form-label text-right">Nama Obat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_obat" name="nama_obat">
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi_obat" class="col-sm-4 col-form-label text-right">Kategori Obat</label>
                <div class="col-sm-6">
                    <select name="kategori_obat" class="form-control" id="">
                        <option value="Obat Bebas">Obat Bebas</option>
                        <option value="Obat Terbatas">Obat Terbatas</option>
                        <option value="Obat Keras">Obat Keras</option>
                        <option value="OWA">OWA</option>
                    </select>
                </div>
            </div>
            {{-- <div class="form-group row">
                <label for="stok" class="col-sm-4 col-form-label text-right">Stok</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="stok" name="stok">
                </div>
            </div> --}}
            <div class="form-group row">
                <label for="harga" class="col-sm-4 col-form-label text-right">Harga</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="harga" name="harga">
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi_obat" class="col-sm-4 col-form-label text-right">Dosis</label>
                <div class="col-sm-6">
                    <select name="dosis" class="form-control" id="">
                        <option value="1x1">1x1</option>
                        <option value="2x1">2x1</option>
                        <option value="3x1">3x1</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi_obat" class="col-sm-4 col-form-label text-right">Aturan Minum</label>
                <div class="col-sm-6">
                    <select name="aturan_minum" class="form-control" id="">
                        <option value="Sebelum Makan">Sebelum Makan</option>
                        <option value="Sesudah Makan">Sesudah Makan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-4 col-form-label text-right">Foto Obat</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" id="gambar" name="gambar" width="100">
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

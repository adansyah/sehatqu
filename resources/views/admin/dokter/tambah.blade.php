@extends('admin.layouts.app')

@section('content')
    <div id="formPertanyaan" class="container text-center">
        <h3>Form Tambah Data</h3>
        <form action="/dokters/simpan" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="DA" class="col-sm-4 col-form-label text-right">Nama Dokter</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="DA" name="nama_dokter">
                </div>
            </div>
            <div class="form-group row">
                <label for="DAk" class="col-sm-4 col-form-label text-right">Spesialis</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="DAk" name="spesialis">
                </div>
            </div>
            <div class="form-group row">
                <label for="DAk" class="col-sm-4 col-form-label text-right">Deskripsi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="DAk" name="deskripsi">
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-4 col-form-label text-right">Foto Dokter</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" id="gambar" name="gambar" width="100">
                </div>
            </div>
            <div class="form-group row">
                <label for="konsul" class="col-sm-4 col-form-label text-right">Harga Konsultasi</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="konsul" name="harga_konsultasi">
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

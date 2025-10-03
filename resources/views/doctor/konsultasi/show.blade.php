@extends('admin.layouts.app')

@section('content')
    <div id="formPertanyaan" class="container text-center">
        <h3>Form Edit Data</h3>
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="nama_pasien" class="col-sm-4 col-form-label text-right">Nama Pasien</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien"
                        value="{{ $data->nama_pasien }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label text-right">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}"
                        readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="usia" class="col-sm-4 col-form-label text-right">Usia</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="usia" name="usia" value="{{ $data->usia }}"
                        readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="keluhan" class="col-sm-4 col-form-label text-right">Keluhan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="keluhan" name="keluhan" value="{{ $data->keluhan }}"
                        readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-4 col-sm-6">
                    <a href="/konsultasis" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
@endsection

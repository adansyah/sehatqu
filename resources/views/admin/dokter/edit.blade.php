@extends('admin.layouts.app')

@section('content')
    <div id="formPertanyaan" class="container text-center">
        <h3>Form Tambah Data</h3>
        <form action="/dokters/{{ $data->id }}/update" method="post">
            @csrf
            <div class="form-group row">
                <label for="DA" class="col-sm-4 col-form-label text-right">Nama Dokter</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="DA" name="nama_dokter"
                        value="{{ $data->nama_dokter }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="DAk" class="col-sm-4 col-form-label text-right">Spesialis</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="DAk" name="spesialis"
                        value="{{ $data->spesialis }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="DAk" class="col-sm-4 col-form-label text-right">Deskripsi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="DAk" name="deskripsi"
                        value="{{ $data->deskripsi }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="DAk" class="col-sm-4 col-form-label text-right">Harga Konsultasi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="DAk" name="harga_konsultasi"
                        value="{{ $data->harga_konsultasi }}">
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

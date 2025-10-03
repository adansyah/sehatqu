@extends('pelanggan.layouts.app')

@section('content')
    <div id="formPertanyaan" class="container text-center">
        <h3>Form Tambah Data</h3>
        <div class="form-group row">
            <label for="id_bus" class="col-sm-4 col-form-label text-right">Nama Bus</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="id_bus" name="id_bus" value="{{ $data->id_bus }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="waktu_berangkat" class="col-sm-4 col-form-label text-right">Waktu Berangkat</label>
            <div class="col-sm-6">
                <input type="" class="form-control" id="waktu_berangkat" name="waktu_keberangkatan"
                    value="{{ $data->waktu_keberangkatan }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="waktu_tiba" class="col-sm-4 col-form-label text-right">Waktu Tiba</label>
            <div class="col-sm-6">
                <input type="" class="form-control" id="waktu_tiba" name="waktu_tiba" value="{{ $data->waktu_tiba }}"
                    readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-4 col-form-label text-right">Harga</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $data->harga }}"
                    readonly>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-4 col-sm-6">
                <a href="/jadwal" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection

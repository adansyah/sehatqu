@extends('admin.layouts.app')

@section('content')
    <div id="formPertanyaan" class="container text-center">
        <h3>Form Tambah Data</h3>
        <form action="/obats/{{ $data->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="stok" class="col-sm-4 col-form-label text-right">Stok</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="stok" name="stok" value="{{ $data->stok }}">
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

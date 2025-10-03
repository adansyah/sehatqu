@extends('admin.layouts.app')

@section('content')
    <div id="formEdit" class="container text-center">
        <h3>Form Edit Data Obat</h3>
        <form action="/obats/{{ $obat->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="kd_obat" class="col-sm-4 col-form-label text-right">Kode Obat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kd_obat" name="kd_obat" value="{{ $obat->kd_obat }}"
                        readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_obat" class="col-sm-4 col-form-label text-right">Nama Obat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_obat" name="nama_obat"
                        value="{{ $obat->nama_obat }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="kategori_obat" class="col-sm-4 col-form-label text-right">Kategori Obat</label>
                <div class="col-sm-6">
                    <select name="kategori_obat" class="form-control">
                        <option value="Obat Bebas" {{ $obat->kategori_obat == 'Obat Bebas' ? 'selected' : '' }}>Obat Bebas
                        </option>
                        <option value="Obat Terbatas" {{ $obat->kategori_obat == 'Obat Terbatas' ? 'selected' : '' }}>Obat
                            Terbatas</option>
                        <option value="Obat Keras" {{ $obat->kategori_obat == 'Obat Keras' ? 'selected' : '' }}>Obat Keras
                        </option>
                        <option value="OWA" {{ $obat->kategori_obat == 'OWA' ? 'selected' : '' }}>OWA</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="harga" class="col-sm-4 col-form-label text-right">Harga</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $obat->harga }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="dosis" class="col-sm-4 col-form-label text-right">Dosis</label>
                <div class="col-sm-6">
                    <select name="dosis" class="form-control">
                        <option value="1x1" {{ $obat->dosis == '1x1' ? 'selected' : '' }}>1x1</option>
                        <option value="2x1" {{ $obat->dosis == '2x1' ? 'selected' : '' }}>2x1</option>
                        <option value="3x1" {{ $obat->dosis == '3x1' ? 'selected' : '' }}>3x1</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="aturan_minum" class="col-sm-4 col-form-label text-right">Aturan Minum</label>
                <div class="col-sm-6">
                    <select name="aturan_minum" class="form-control">
                        <option value="Sebelum Makan" {{ $obat->aturan_minum == 'Sebelum Makan' ? 'selected' : '' }}>
                            Sebelum Makan</option>
                        <option value="Sesudah Makan" {{ $obat->aturan_minum == 'Sesudah Makan' ? 'selected' : '' }}>
                            Sesudah Makan</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="gambar" class="col-sm-4 col-form-label text-right">Foto Obat</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @if ($obat->gambar)
                        <img src="{{ asset('storage/' . $obat->gambar) }}" alt="Foto Obat" width="100" class="mt-2">
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-4 col-sm-6">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection

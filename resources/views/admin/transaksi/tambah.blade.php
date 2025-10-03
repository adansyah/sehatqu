@extends('admin.layouts.app')

@section('content')
    <div id="formPertanyaan" class="container text-center">
        <h3>Form Proses Konsultasi</h3>
        <form action="/transaksi/simpan" method="post">
            @csrf
            <div class="form-group row">
                <label for="nama_pasien" class="col-sm-4 col-form-label text-right">Nama Pasien</label>
                <div class="col-sm-6">
                    <select name="id_pasien" id="" class="form-control">
                        @foreach ($pasien as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_pasien }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label text-right">alamat</label>
                <div class="col-sm-6">
                    <select name="alamat" id="" class="form-control">
                        @foreach ($pasien as $item)
                            <option value="{{ $item->id }}">{{ $item->alamat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_obat" class="col-sm-4 col-form-label text-right">Obat</label>
                <div class="col-sm-6">
                    <select name="id_obat" id="" class="form-control">
                        @foreach ($obat as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-4 col-form-label text-right">Harga</label>
                <div class="col-sm-6">
                    <select name="harga" id="" class="form-control">
                        @foreach ($obat as $item)
                            <option value="{{ $item->id }}">{{ $item->harga }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_dokter" class="col-sm-4 col-form-label text-right">Dokter</label>
                <div class="col-sm-6">
                    <select name="id_dokter" id="" class="form-control">
                        @foreach ($dokter as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_dokter }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_dokter" class="col-sm-4 col-form-label text-right">Harga Konsultasi</label>
                <div class="col-sm-6">
                    <select name="harga_konsultasi" id="" class="form-control">
                        @foreach ($dokter as $item)
                            <option value="{{ $item->id }}">{{ $item->harga_konsultasi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="ekspedisi" class="col-sm-4 col-form-label text-right">Pemeriksaan</label>
                <div class="col-sm-6">
                    <select name="pemeriksaan" id="" class="form-control">
                        <option value="">--Pilih Tempat--</option>
                        <option value="rumah">Rumah</option>
                        <option value="rumah_sakit">Rumah Sakit</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-4 col-form-label text-right">Total</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="total" id="">
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

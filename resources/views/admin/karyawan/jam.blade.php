@extends('admin.layouts.app')

@section('content')
    <div id="formPertanyaan" class="container text-center">
        <h3>Form Atur Jadwal Shift</h3>
        <form action="/karyawan/{{ $karyawan->id }}/updatejam" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="jadwal" class="col-sm-4 col-form-label text-right">Hari Senin</label>
                <div class="col-sm-6">
                    <select name="senin" id="jadwal" class="form-control" required>
                        <option value="">-- Pilih Shift --</option>
                        <option value="Pagi" {{ $karyawan->senin == 'Pagi' ? 'selected' : '' }}>Pagi</option>
                        <option value="Siang" {{ $karyawan->senin == 'Siang' ? 'selected' : '' }}>Siang</option>
                        <option value="Malam" {{ $karyawan->senin == 'Malam' ? 'selected' : '' }}>Malam</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jadwal" class="col-sm-4 col-form-label text-right">Hari selasa</label>
                <div class="col-sm-6">
                    <select name="selasa" id="jadwal" class="form-control" required>
                        <option value="">-- Pilih Shift --</option>
                        <option value="Pagi" {{ $karyawan->selasa == 'Pagi' ? 'selected' : '' }}>Pagi</option>
                        <option value="Siang" {{ $karyawan->selasa == 'Siang' ? 'selected' : '' }}>Siang</option>
                        <option value="Malam" {{ $karyawan->selasa == 'Malam' ? 'selected' : '' }}>Malam</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jadwal" class="col-sm-4 col-form-label text-right">Hari Rabu</label>
                <div class="col-sm-6">
                    <select name="rabu" id="jadwal" class="form-control" required>
                        <option value="">-- Pilih Shift --</option>
                        <option value="Pagi" {{ $karyawan->rabu == 'Pagi' ? 'selected' : '' }}>Pagi</option>
                        <option value="Siang" {{ $karyawan->rabu == 'Siang' ? 'selected' : '' }}>Siang</option>
                        <option value="Malam" {{ $karyawan->rabu == 'Malam' ? 'selected' : '' }}>Malam</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jadwal" class="col-sm-4 col-form-label text-right">Hari Kamis</label>
                <div class="col-sm-6">
                    <select name="kamis" id="jadwal" class="form-control" required>
                        <option value="">-- Pilih Shift --</option>
                        <option value="Pagi" {{ $karyawan->kamis == 'Pagi' ? 'selected' : '' }}>Pagi</option>
                        <option value="Siang" {{ $karyawan->kamis == 'Siang' ? 'selected' : '' }}>Siang</option>
                        <option value="Malam" {{ $karyawan->kamis == 'Malam' ? 'selected' : '' }}>Malam</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jadwal" class="col-sm-4 col-form-label text-right">Hari Jumat</label>
                <div class="col-sm-6">
                    <select name="jumat" id="jadwal" class="form-control" required>
                        <option value="">-- Pilih Shift --</option>
                        <option value="Pagi" {{ $karyawan->jumat == 'Pagi' ? 'selected' : '' }}>Pagi</option>
                        <option value="Siang" {{ $karyawan->jumat == 'Siang' ? 'selected' : '' }}>Siang</option>
                        <option value="Malam" {{ $karyawan->jumat == 'Malam' ? 'selected' : '' }}>Malam</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jadwal" class="col-sm-4 col-form-label text-right">Hari Sabtu</label>
                <div class="col-sm-6">
                    <select name="sabtu" id="jadwal" class="form-control" required>
                        <option value="">-- Pilih Shift --</option>
                        <option value="Pagi" {{ $karyawan->sabtu == 'Pagi' ? 'selected' : '' }}>Pagi</option>
                        <option value="Siang" {{ $karyawan->sabtu == 'Siang' ? 'selected' : '' }}>Siang</option>
                        <option value="Malam" {{ $karyawan->sabtu == 'Malam' ? 'selected' : '' }}>Malam</option>
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

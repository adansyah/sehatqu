@extends('doctor.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row m-auto">
            <h3 class="m-auto">Verifikasi Resep</h3>
            {{-- @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('Error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('Error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif --}}
            {{-- end alert --}}
            <table class="table table-hover mt-3" id="dataTable">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Pasien</td>
                        <td>usia</td>
                        <td>Pemeriksaan</td>
                        <td>Keluhan</td>
                        <td>Resep</td>
                        <td>#</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_pasien ?? '-' }}</td>
                            <td>{{ $item->usia }}</td>
                            <td>{{ $item->pemeriksaan }}</td>
                            <td>{{ $item->keluhan }}</td>
                            <td>
                                <img src="{{ asset('img/pasien/' . $item->foto_resep) }}"
                                    style="width:100px;border-radius:10px">
                            </td>
                            <td>
                                <form action="{{ route('resep.proses', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Resep valid?')">
                                    @csrf
                                    <button class="btn btn-outline-success"><i class="fas fa-check"></i></button>
                                </form>
                                <br>
                                <form action="{{ route('resep.prosess', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Resep Tidak valid?')">
                                    @csrf
                                    <button class="btn btn-outline-danger"><i class="fas fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row m-auto">
            <h3 class="m-auto">Dokter</h3>

            <div class="container mb-3">
                <a href="dokters/tambah" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add</a>
            </div>
            {{-- alert --}}
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
            <div class="container-fluid">
                <table class="table table-hover mt-3 text-center w-full" id="dataTable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Foto</td>
                            <td>Nama Dokter</td>
                            <td>Spesialis</td>
                            <td>Deskripsi</td>
                            <td>Harga Konsultasi</td>
                            <td>#</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('img/dokter/' . $item->gambar) }}"
                                        style="width:100px;border-radius:10px">
                                </td>
                                <td>{{ $item->nama_dokter }}</td>
                                <td>{{ $item->spesialis }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->harga_konsultasi }}</td>
                                <td>
                                    <a href="dokters/{{ $item->id }}/edit" class="btn btn-outline-warning"><i
                                            class="fas fa-cog"></i></a>
                                    <a href="dokters/{{ $item->id }}/hapus" id="delete"
                                        class="btn btn-outline-danger"
                                        onclick="return confirm('Yakin mau hapus Dokter ini?')"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row m-auto">
            <h3 class="m-auto">Transaksi</h3>

            <div class="container mb-3">
                {{-- <a href="transaksi/tambah" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add</a> --}}
                <a href="/transaksi/export" class="btn btn-success mb-2">Export Excel</a>

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
            <div style="overflow-x: auto">
                <table class="table table-hover mt-3 text-center" id="dataTable">

                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Pasien</td>
                            <td>Alamat</td>
                            <td>Obat</td>
                            <td>harga</td>
                            <td>Dokter</td>
                            <td>Harga Konsultasi</td>
                            <td>Pemeriksaan</td>
                            <td>Total</td>
                            <td>Status</td>
                            <td>#</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->id_pasien }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    @php
                                        $ids = explode(',', $item->id_obat);
                                        $obats = App\Models\Obat::whereIn('id', $ids)->pluck('nama_obat');
                                    @endphp

                                    @foreach ($obats as $nama)
                                        * {{ $nama }} <br>
                                    @endforeach
                                </td>
                                <td>{{ $item->Obat->harga ?? '-' }}</td>
                                <td>{{ $item->Dokter->nama_dokter ?? '-' }}</td>
                                <td>{{ $item->Dokter->harga_konsultasi ?? '-' }}</td>
                                <td>{{ $item->pemeriksaan }}</td>
                                <td>{{ $item->total }}</td>
                                <td>
                                    @if ($item->status == 'Belum Dibayar')
                                        <span class="badge badge-warning">Belum Dibayar</span>
                                    @elseif($item->status == 'Sudah Dibayar')
                                        <span class="badge badge-success">Dibayar</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- <a href="transaksi/{{ $item->id }}/show" class="btn btn-outline-secondary"><i
                                        class="fas fa-eye"></i></a> --}}
                                    {{-- <a href="transaksi/{{ $item->id }}/edit" class="btn btn-outline-warning"><i
                                        class="fas fa-cog"></i></a> --}}
                                    <a href="transaksi/{{ $item->id }}/hapus" id="delete"
                                        class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

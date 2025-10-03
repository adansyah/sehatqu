@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row m-auto">
            <h3 class="m-auto">Konsultasi Pasien</h3>
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
                <table class="table table-hover mt-3" id="dataTable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Pasien</td>
                            <td>Alamat</td>
                            <td>Obat</td>
                            <td>Harga Obat</td>
                            <td>Dokter</td>
                            <td>Harga Konsultasi</td>
                            <td>usia</td>
                            <td>Pemeriksaan</td>
                            <td>Keluhan</td>
                            <td>Resep</td>
                            <td>Verifikasi Resep</td>
                            <td>Total</td>
                            <td>#</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_pasien }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    @php
                                        $ids = explode(',', $item->id_obat);
                                        $obats = App\Models\Obat::whereIn('id', $ids)->pluck('nama_obat')->toArray();
                                    @endphp

                                    @foreach ($obats as $nama)
                                        * {{ $nama }} <br>
                                    @endforeach
                                </td>
                                {{-- <td>{{ json_encode($item->id_obat) }}</td> --}}
                                <td> Rp {{ number_format($item->sum('harga'), 0, ',', '.') }}</td>
                                <td>{{ $item->Dokter->nama_dokter ?? '-' }}</td>
                                <td>{{ $item->Dokter->harga_konsultasi ?? '-' }}</td>
                                <td>{{ $item->usia }}</td>
                                <td>{{ $item->pemeriksaan }}</td>
                                <td>{{ $item->keluhan }}</td>
                                <td>
                                    <img src="{{ asset('img/pasien/' . $item->foto_resep) }}"
                                        style="width:100px;border-radius:10px">
                                </td>
                                <td>
                                    @if ($item->valid == 'Valid')
                                        <span class="badge badge-success">{{ $item->valid }}</span>
                                    @elseif ($item->valid == 'Tidak Valid')
                                        <span class="badge badge-danger">{{ $item->valid }}</span>
                                    @else
                                        <span class="badge badge-warning">Ajukan ke Dokter</span>
                                    @endif
                                </td>
                                <td>{{ $item->total ?? '-' }}</td>
                                <td>
                                    @if ($item->valid)
                                        <a href="konsultasis/{{ $item->id }}/edit" class="btn btn-outline-primary">
                                            <i class="fas fa-plus"></i>
                                        </a>

                                        <a href="konsultasis/{{ $item->id }}/hapus" id="delete"
                                            class="btn btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                        @if ($item->valid != null && $item->valid != '')
                                            <a href="{{ route('pasien.proses', $item->id) }}"
                                                onclick="return confirm('Proses pasien ini?')"
                                                class="btn btn-outline-success">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

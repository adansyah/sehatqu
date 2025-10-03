@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row m-auto">
            <h3 class="m-auto">Karyawan</h3>

            <div class="container mb-3">
                <a href="karyawan/tambah" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add</a>
            </div>
            <div class="container-fluid">
                <table class="table table-hover mt-3 text-center w-full" id="dataTable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Karyawan</td>
                            <td>Bidang</td>
                            <td>no_telp</td>
                            <td>email</td>
                            <td>Senin</td>
                            <td>Selasa</td>
                            <td>Rabu</td>
                            <td>Kamis</td>
                            <td>Jumat</td>
                            <td>Sabtu</td>
                            <td>Jam</td>
                            <td>#</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->senin == 'Pagi')
                                        <span class="badge badge-success">Pagi</span>
                                    @elseif($item->senin == 'Siang')
                                        <span class="badge badge-warning">Siang</span>
                                    @elseif ($item->senin == 'Malam')
                                        <span class="badge badge-danger">Malam</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->selasa == 'Pagi')
                                        <span class="badge badge-success">Pagi</span>
                                    @elseif($item->selasa == 'Siang')
                                        <span class="badge badge-warning">Siang</span>
                                    @elseif ($item->selasa == 'Malam')
                                        <span class="badge badge-danger">Malam</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->rabu == 'Pagi')
                                        <span class="badge badge-success">Pagi</span>
                                    @elseif($item->rabu == 'Siang')
                                        <span class="badge badge-warning">Siang</span>
                                    @elseif ($item->rabu == 'Malam')
                                        <span class="badge badge-danger">Malam</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->kamis == 'Pagi')
                                        <span class="badge badge-success">Pagi</span>
                                    @elseif($item->kamis == 'Siang')
                                        <span class="badge badge-warning">Siang</span>
                                    @elseif ($item->kamis == 'Malam')
                                        <span class="badge badge-danger">Malam</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->jumat == 'Pagi')
                                        <span class="badge badge-success">Pagi</span>
                                    @elseif($item->jumat == 'Siang')
                                        <span class="badge badge-warning">Siang</span>
                                    @elseif ($item->jumat == 'Malam')
                                        <span class="badge badge-danger">Malam</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->sabtu == 'Pagi')
                                        <span class="badge badge-success">Pagi</span>
                                    @elseif($item->sabtu == 'Siang')
                                        <span class="badge badge-warning">Siang</span>
                                    @elseif ($item->sabtu == 'Malam')
                                        <span class="badge badge-danger">Malam</span>
                                    @endif
                                </td>

                                <td>{{ $item->jam }}</td>
                                <td>
                                    <a href="karyawan/{{ $item->id }}/edit" class="btn btn-outline-warning"><i
                                            class="fas fa-cog"></i></a>
                                    <a href="karyawan/{{ $item->id }}/jam" class="btn btn-outline-primary"><i
                                            class="fas fa-plus"></i> Jadwal</a>
                                    <a href="karyawan/{{ $item->id }}/hapus" id="delete"
                                        class="btn btn-outline-danger"
                                        onclick="return confirm('yakin Mau hapus Obat ini?')"><i
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

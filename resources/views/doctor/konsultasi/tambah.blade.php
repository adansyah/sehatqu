@extends('admin.layouts.app')

@section('content')
    <div id="formPertanyaan" class="container text-center">
        <h3>Form Edit Data Konsultasi</h3>

        <form action="/konsultasis/{{ $data->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Pasien --}}
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-right">Nama Pasien</label>
                <div class="col-sm-6">
                    <input type="text" name="nama_pasien" class="form-control" value="{{ $data->nama_pasien }}">
                </div>
            </div>

            {{-- Alamat --}}
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-right">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" name="alamat" class="form-control" value="{{ $data->alamat }}">
                </div>
            </div>

            {{-- Usia --}}
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-right">Usia</label>
                <div class="col-sm-6">
                    <input type="number" name="usia" class="form-control" value="{{ $data->usia }}">
                </div>
            </div>

            {{-- Pemeriksaan --}}
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-right">Pemeriksaan</label>
                <div class="col-sm-6">
                    <select name="pemeriksaan" class="form-control">
                        <option value="rumah" {{ $data->pemeriksaan == 'rumah' ? 'selected' : '' }}>Rumah</option>
                        <option value="rumah_sakit" {{ $data->pemeriksaan == 'rumah_sakit' ? 'selected' : '' }}>Rumah Sakit
                        </option>
                    </select>
                </div>
            </div>

            {{-- Keluhan --}}
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-right">Keluhan</label>
                <div class="col-sm-6">
                    <input type="text" name="keluhan" class="form-control" value="{{ $data->keluhan }}">
                </div>
            </div>

            {{-- Obat (Radio Button) --}}
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-right">Obat</label>
                <div class="col-sm-6 text-left">
                    {{-- @foreach ($obat as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="id_obat" id="obat{{ $item->id }}"
                                value="{{ $item->id }}" data-harga="{{ $item->harga }}"
                                {{ $data->id_obat == $item->id ? 'checked' : '' }}>
                            <label class="form-check-label" for="obat{{ $item->id }}">
                                {{ $item->nama_obat }} - Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </label>
                        </div>
                    @endforeach --}}
                    @foreach ($obat as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="id_obat[]" id="obat{{ $item->id }}"
                                value="{{ $item->id }}" data-harga="{{ $item->harga }}"
                                {{ in_array($item->id, explode(',', $data->id_obat)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="obat{{ $item->id }}">
                                {{ $item->nama_obat }} - Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Harga Obat (readonly) --}}
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-right">Harga Obat</label>
                <div class="col-sm-6">
                    <input type="text" name="harga_obat_display" id="harga_obat_display" class="form-control" readonly>
                    <input type="hidden" id="harga_obat" name="harga" value="{{ old('harga', $data->harga) }}">
                </div>
            </div>

            {{-- Dokter --}}
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-right">Dokter</label>
                <div class="col-sm-6">
                    <select name="id_dokter" id="id_dokter" class="form-control">
                        @foreach ($dokter as $item)
                            <option value="{{ $item->id }}" data-harga="{{ $item->harga_konsultasi }}"
                                {{ $data->id_dokter == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_dokter }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Harga Konsultasi (readonly) --}}
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-right">Harga Konsultasi</label>
                <div class="col-sm-6">
                    <input type="text" name="harga_konsultasi_display" id="harga_konsultasi_display" class="form-control"
                        readonly>
                    <input type="hidden" id="harga_konsultasi" name="harga_konsultasi"
                        value="{{ old('harga_konsultasi', $data->harga_konsultasi) }}">
                </div>
            </div>

            {{-- Total (otomatis update) --}}
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-right">Total</label>
                <div class="col-sm-6">
                    <input type="text" name="total_display" id="total_display" class="form-control" readonly>
                    <input type="hidden" id="total" name="total" value="{{ old('total', $data->total) }}">
                </div>
            </div>

            {{-- Submit --}}
            <div class="form-group row">
                <div class="offset-sm-4 col-sm-6">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>

        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxesObat = document.querySelectorAll('input[name="id_obat[]"]');
            const hargaObatInput = document.getElementById('harga_obat');
            const hargaObatDisplay = document.getElementById('harga_obat_display');

            const selectDokter = document.getElementById('id_dokter');
            const hargaKonsultasiInput = document.getElementById('harga_konsultasi');
            const hargaKonsultasiDisplay = document.getElementById('harga_konsultasi_display');

            const totalInput = document.getElementById('total');
            const totalDisplay = document.getElementById('total_display');

            function formatRupiah(angka) {
                return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }

            function updateHargaObat() {
                let totalHargaObat = 0;
                checkboxesObat.forEach(chk => {
                    if (chk.checked) {
                        totalHargaObat += parseInt(chk.getAttribute('data-harga')) || 0;
                    }
                });
                hargaObatInput.value = totalHargaObat;
                hargaObatDisplay.value = formatRupiah(totalHargaObat);
            }

            function updateHargaKonsultasi() {
                const harga = parseInt(selectDokter.options[selectDokter.selectedIndex].getAttribute(
                    'data-harga')) || 0;
                hargaKonsultasiInput.value = harga;
                hargaKonsultasiDisplay.value = formatRupiah(harga);
            }

            function hitungTotal() {
                const hargaObat = parseInt(hargaObatInput.value) || 0;
                const hargaKonsultasi = parseInt(hargaKonsultasiInput.value) || 0;
                const total = hargaObat + hargaKonsultasi;
                totalInput.value = total;
                totalDisplay.value = formatRupiah(total);
            }

            checkboxesObat.forEach(chk => {
                chk.addEventListener('change', () => {
                    updateHargaObat();
                    hitungTotal();
                });
            });

            selectDokter.addEventListener('change', () => {
                updateHargaKonsultasi();
                hitungTotal();
            });

            // Inisialisasi saat halaman load
            updateHargaObat();
            updateHargaKonsultasi();
            hitungTotal();
        });
    </script>
@endsection

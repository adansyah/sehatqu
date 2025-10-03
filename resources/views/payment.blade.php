<!DOCTYPE html>
<html>

<head>
    <title>Pembayaran Pasien</title>
</head>

<body style="background-color: #e0f7fa">
    <h2>Halo Pasien</h2>
    <p>Konsultasi Kamu Akan segera kami proses</p>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Obat</th>
                <th>Harga Obat</th>
                <th>Dokter</th>
                <th>Harga Konsultasi</th>
                <th>Pemeriksaan</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $p)
                <tr>
                    <td>{{ $p->nama_pasien }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->obat }}</td>
                    <td>{{ number_format($p->harga_obat) }}</td>
                    <td>{{ $p->dokter }}</td>
                    <td>{{ number_format($p->harga_konsultasi) }}</td>
                    <td>{{ $p->pemeriksaan }}</td>
                    <td>{{ number_format($p->total) }}</td>
                    <td>{{ $p->status }}</td>
                    <td>
                        @if ($p->status == 'Belum Dibayar')
                            <a href="{{ route('pembayaran.bayar', $p->id) }}">Bayar</a>
                        @else
                            Sudah Dibayar
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

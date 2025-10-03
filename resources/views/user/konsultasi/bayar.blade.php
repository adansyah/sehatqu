<!DOCTYPE html>
<html>

<head>
    <title>Form Pembayaran</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}">
    </script>
</head>

<body style="background-color: #e0f7fa">
    <h2>Form Pembayaran</h2>
    <p>Silakan konfirmasi pembayaran Anda: {{ $transaksi->status }}</p>

    <table border="1" cellpadding="10">
        <tr>
            <td>Nama Pasien</td>
            <td>{{ $transaksi->id_pasien }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>{{ $transaksi->alamat }}</td>
        </tr>
        <tr>
            <td>Obat</td>
            <td>
                @forelse ($transaksi->obats as $obat)
                    {{ $loop->iteration }} {{ $obat->nama_obat }}<br>
                @empty
                    -
                @endforelse
            </td>
        </tr>
        <tr>
            <td>Harga Obat</td>
            <td>{{ number_format($transaksi->Obat->harga) }}</td>
        </tr>
        <tr>
            <td>Dokter</td>
            <td>{{ $transaksi->Dokter->nama_dokter }}</td>
        </tr>
        <tr>
            <td>Harga Konsultasi</td>
            <td>{{ number_format($transaksi->Dokter->harga_konsultasi) }}</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>{{ number_format($transaksi->total) }}</td>
        </tr>
    </table>

    <form method="POST" action="{{ route('pembayaran.proses', $transaksi->id) }}">
        @csrf
        <br>
        <button type="submit">Konfirmasi & Bayar</button>
    </form>
    {{-- <button id="pay-button">Bayar Sekarang</button> --}}


</body>

</html>

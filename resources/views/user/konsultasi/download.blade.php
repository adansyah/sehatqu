<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Pembayaran</title>
</head>

<body onload="window.print()">
    <table width="400px">
        <tr align="center">
            <td colspan="3"><b>Apotek Sehat Selalu</b></td>
        </tr>
        <tr align="center">
            <td colspan="3"><b>Struk Pembayaran</b></td>
        </tr>
        <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="2">Petugas : Admin Sehatqu</td>
            <td align="right">Tanggal : <?php echo date('d F Y'); ?></td>
        </tr>
        <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr>
        <tr>
            <td> <b>Pasien</b> </td>
            <td align="right">:</td>
            <td>{{ $transaksi->id_pasien }}</td>
        </tr>
        <tr>
            <td> <b>Obat</b> </td>
            <td align="right">:</td>
            <td>@php
                $ids = explode(',', $transaksi->id_obat);
                $obats = App\Models\Obat::whereIn('id', $ids)->pluck('nama_obat')->toArray();
            @endphp

                @foreach ($obats as $nama)
                    {{ $loop->iteration }} {{ $nama }} <br>
                @endforeach
            </td>
        </tr>
        <tr>
            <td> <b>Harga</b> </td>
            <td align="right">:</td>
            <td>Rp. {{ number_format($transaksi->harga, 2, ',', ',') }}</td>
        </tr>
        <tr>
            <td> <b>Dokter</b> </td>
            <td align="right">:</td>
            <td>{{ $transaksi->Dokter->nama_dokter }}</td>
        </tr>
        <tr>
            <td> <b>Konsultasi</b> </td>
            <td align="right">:</td>
            <td>Rp. {{ number_format($transaksi->harga_konsultasi, 2, ',', ',') }}</td>
        </tr>
        <tr>
            <td> <b>Total</b> </td>
            <td align="right">:</td>
            <td>Rp. {{ number_format($transaksi->total, 2, ',', ',') }}</td>
        </tr>
        <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                Note:
                <br>
                <b>- Struk ini sebagai bukti transaksi</b>
                <br>
                <b>- Harap simpan dengan baik</b>
            </td>
        </tr>
    </table>
</body>

</html>

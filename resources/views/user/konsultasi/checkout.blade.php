<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #555;
            padding: 30px;
            animation: fadeIn 1s ease-out;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 70%;
            margin: auto;
            animation: fadeInUp 1s ease-out;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            font-size: 16px;
            color: #777;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        td:last-child {
            font-weight: bold;
        }

        .pay-button {
            display: block;
            width: 100%;
            margin-top: 30px;
            padding: 14px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .pay-button-red {
            display: block;
            width: 100%;
            margin-top: 30px;
            padding: 14px;
            background-color: red;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
            text-decoration: none;
        }

        .pay-button:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }

        .footer a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Halaman Pembayaran</h2>
        <p>Silakan konfirmasi pembayaran Anda:
            @if ($transaksi->status == 'Sudah Dibayar')
                <span class="badge bg-success">{{ $transaksi->status }}</span>
        </p>
    @elseif ($transaksi->status == 'Belum Dibayar')
        <span class="badge bg-danger">{{ $transaksi->status }}</span> </p>
        @endif

        <table>
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
                <td> @php
                    $ids = explode(',', $transaksi->id_obat);
                    $obats = App\Models\Obat::whereIn('id', $ids)->pluck('nama_obat')->toArray();
                @endphp

                    @foreach ($obats as $nama)
                        {{ $loop->iteration }} {{ $nama }} <br>
                    @endforeach
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

        <button id="pay-button" class="pay-button">Bayar Sekarang</button>
        <a href="{{ route('konsultasi.print', $transaksi->id) }}" class="pay-button-red">Unduh</a>
    </div>

    <div class="footer">
        <a href="/home">Kembali</a>
    </div>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil!");
                    console.log(result);

                    // Kirim permintaan ke server untuk update status
                    fetch('/payment/status', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                id: {{ $transaksi->id }}
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Reload halaman untuk perbarui status
                                location.reload();
                            } else {
                                alert("Gagal update status di server.");
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert("Terjadi kesalahan.");
                        });
                },

                onPending: function(result) {
                    alert("Menunggu pembayaran");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Pembayaran gagal");
                    console.log(result);
                },
                onClose: function() {
                    alert("Transaksi dibatalkan.");
                }
            });
        };
    </script>
</body>

</html>

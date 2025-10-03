<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pesan Konsultasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="sweetalert2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            font-size: 13px;
            animation: fadeIn 1.5s ease-in-out;
        }

        .container {
            max-width: 1000px;
        }

        h1 {
            text-align: center;
            font-size: 18px;
            color: #333;
            margin-bottom: 25px;
            animation: slideInDown 1s ease-out;
        }

        .grid-transaksi {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 16px;
        }

        .card-transaksi {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            padding: 14px 16px;
            transform: translateY(20px);
            animation: fadeInUp 1s ease-out forwards;
        }

        .title {
            font-size: 14px;
            font-weight: 600;
            color: #007bff;
            text-align: center;
            margin-bottom: 10px;
            opacity: 0;
            animation: fadeIn 0.6s 0.2s forwards;
        }

        .grid-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4px 10px;
        }

        .label {
            font-weight: 500;
            color: #555;
        }

        .value {
            color: #222;
        }

        .btn-bayar {
            margin: 10px auto 0;
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 6px 14px;
            border-radius: 5px;
            font-size: 12px;
            display: block;
            transition: background-color 0.3s ease;
        }

        .btn-bayar:hover {
            background-color: #218838;
        }

        .status {
            text-align: center;
            font-weight: 600;
            color: #28a745;
            margin-top: 10px;
            font-size: 12px;
        }

        .time {
            text-align: center;
            font-size: 11px;
            color: #888;
            margin-top: 6px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            animation: fadeIn 0.8s 0.5s forwards;
        }

        .footer a {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 7px 16px;
            border-radius: 5px;
            font-size: 12px;
            transition: background-color 0.3s ease;
        }

        .footer a:hover {
            background-color: #0056b3;
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

        @keyframes slideInDown {
            0% {
                transform: translateY(-20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f8ff; margin: 0;">
    @include('user.layouts.navbar')

    <div class="container">
        <h1>Pesan Konsultasi</h1>

        <div class="grid-transaksi">
            @foreach ($transaksi as $data)
                <div class="card-transaksi">
                    <div class="title">Konsultasi kamu akan segera diproses</div>

                    <div class="grid-info">
                        <div class="label">Nama Pasien</div>
                        <div class="value">{{ $data->id_pasien ?? '-' }}</div>

                        <div class="label">Alamat</div>
                        <div class="value">{{ $data->alamat ?? '-' }}</div>

                        <div class="label">Obat</div>
                        <div class="value">{{ $data->Obat->nama_obat ?? '-' }}</div>

                        <div class="label">Harga Obat</div>
                        <div class="value">Rp {{ number_format($data->Obat->harga ?? '-') }}</div>

                        <div class="label">Dokter</div>
                        <div class="value">{{ $data->Dokter->nama_dokter ?? '-' }}</div>

                        <div class="label">Harga Konsultasi</div>
                        <div class="value">Rp {{ number_format($data->Dokter->harga_konsultasi ?? '-') }}</div>

                        <div class="label">Pemeriksaan</div>
                        <div class="value">{{ $data->pemeriksaan ?? '-' }}</div>

                        <div class="label">Total</div>
                        <div class="value">Rp {{ number_format($data->total ?? '-') }}</div>
                    </div>

                    @if ($data->status == 'Belum Dibayar')
                        <a href="checkout/{{ $data->id }}">
                            <button class="btn-bayar">Bayar</button>
                        </a>
                    @else
                        <div class="status">Sudah Dibayar</div>
                    @endif

                    <div class="time">{{ $data->created_at->diffForHumans() }}</div>
                </div>
            @endforeach
        </div>

        <div class="footer"a>
            <a href="/home">Kembali</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
</body>

</html>

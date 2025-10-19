@extends('user.layouts.app')

@section('content')
    <style>
        /* Area konten saja — tidak mengubah navbar */
        body {
            background: linear-gradient(to bottom, #e9f5ff 0%, #ffffff 90%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        section.obat-section {
            padding: 80px 0;
            transition: background-color 0.5s ease;
        }

        section.obat-section h1 {
            text-align: center;
            margin-bottom: 50px;
            font-size: 30px;
            font-weight: 700;
            color: #2d2d2d;
            letter-spacing: 0.3px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .obat-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 25px;
            padding: 0 20px;
        }

        .obat-card {
            background-color: #ffffff;
            border-radius: 14px;
            padding: 18px;
            width: 280px;
            min-height: 440px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .obat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }

        .obat-card-header {
            text-align: center;
            font-size: 17px;
            font-weight: 600;
            color: #007bff;
            margin-bottom: 8px;
        }

        .obat-card-body img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .obat-card-body p {
            font-size: 14px;
            color: #555;
            text-align: justify;
            line-height: 1.5;
            flex-grow: 1;
        }

        .obat-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 14px;
            color: #333;
            margin-top: 8px;
            border-top: 1px solid #f0f0f0;
            padding-top: 10px;
        }

        .price {
            color: #28a745;
        }

        .stock {
            color: #555;
        }
    </style>

    <section class="obat-section">
        <h1>💊 Obat Tersedia</h1>

        <div class="obat-container">
            @foreach ($obat as $item)
                <div class="obat-card">
                    <div>
                        <div class="obat-card-header">
                            {{ $item->nama_obat }}
                        </div>
                        <div class="obat-card-body">
                            <img src="{{ asset('img/obat') }}/{{ $item->gambar }}" alt="Gambar Obat">
                            <p>{{ $item->deskripsi_obat }}</p>
                        </div>
                    </div>
                    <div class="obat-card-footer">
                        <span class="price">Rp {{ number_format($item->harga) }}</span>
                        <span class="stock">Stok: {{ number_format((float) $item->stok) }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@extends('user.layouts.app')

@section('content')
    <style>
        /* ===== Styling khusus halaman dokter ===== */
        body {
            background: linear-gradient(to bottom, #eaf6ff, #ffffff);
            font-family: 'Poppins', sans-serif;
        }

        h1 {
            text-align: center;
            margin: 60px 0 40px;
            font-size: 32px;
            font-weight: 700;
            color: #333;
            letter-spacing: 0.5px;
        }

        .dokter-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 20px 30px 80px;
        }

        .dokter-card {
            background-color: #ffffff;
            border-radius: 14px;
            width: 340px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .dokter-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .dokter-header {
            text-align: center;
            background-color: #007bff;
            color: #fff;
            padding: 20px 10px;
        }

        .dokter-header h3 {
            font-size: 20px;
            margin: 0;
            font-weight: 600;
        }

        .dokter-header span {
            font-size: 14px;
            display: block;
            opacity: 0.9;
        }

        .dokter-body {
            padding: 20px;
            text-align: center;
        }

        .dokter-body img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .dokter-card:hover .dokter-body img {
            transform: scale(1.05);
        }

        .dokter-body p {
            font-size: 14px;
            color: #555;
            text-align: justify;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .dokter-info {
            display: flex;
            justify-content: space-around;
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .dokter-footer {
            border-top: 1px solid #eee;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dokter-footer button {
            background-color: #ff5733;
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .dokter-footer button:hover {
            background-color: #e84e2f;
        }

        .dokter-footer .price {
            font-size: 16px;
            font-weight: 700;
            color: #333;
        }

        @media (max-width: 768px) {
            .dokter-card {
                width: 100%;
                max-width: 350px;
            }
        }
    </style>

    <h1>Daftar Dokter</h1>

    <div class="dokter-container">
        @foreach ($data as $item)
            <div class="dokter-card">
                <div class="dokter-header">
                    <h3>{{ $item->nama_dokter }}</h3>
                    <span>Spesialis {{ $item->spesialis }}</span>
                </div>
                <div class="dokter-body">
                    <img src="{{ asset('img/dokter/' . $item->gambar) }}" alt="Foto Dokter">
                    <p>{{ $item->deskripsi }}</p>
                    <div class="dokter-info">
                        <div><i class="far fa-clock"></i> 35 tahun</div>
                        <div><i class="fas fa-thumbs-up"></i> 99%</div>
                    </div>
                </div>
                <div class="dokter-footer">
                    <button onclick="location.href='{{ url('/konsultasi') }}'">Konsultasi</button>
                    <span class="price">Rp {{ number_format($item->harga_konsultasi) }}</span>
                </div>
            </div>
        @endforeach

        {{-- Contoh tambahan dokter statis --}}
        <div class="dokter-card">
            <div class="dokter-header">
                <h3>Dr. Amelia</h3>
                <span>Dokter Kandungan</span>
            </div>
            <div class="dokter-body">
                <img src="{{ asset('img/doc5.jpeg') }}" alt="Foto Dokter">
                <p>Dr. Amelia adalah dokter kandungan berdedikasi yang memberikan perawatan reproduksi
                    dengan perhatian tinggi untuk memastikan kesejahteraan pasien.</p>
                <div class="dokter-info">
                    <div><i class="far fa-clock"></i> 25 tahun</div>
                    <div><i class="fas fa-thumbs-up"></i> 100%</div>
                </div>
            </div>
            <div class="dokter-footer">
                <button onclick="location.href='{{ url('/konsultasi') }}'">Konsultasi</button>
                <span class="price">Rp 100.000</span>
            </div>
        </div>
    </div>
@endsection

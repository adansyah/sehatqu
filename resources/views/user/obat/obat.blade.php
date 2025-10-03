<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehatqu Apotik Online</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body
    style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f8ff; margin: 0; padding: 0;">
    @include('user.layouts.navbar')

    <h1 style="text-align: center; margin: 20px 0; font-size: 24px; font-weight: bold; color: #333;">Obat Tersedia</h1>
    <div class="d-flex ml-5">

    </div>
    <div class="container" style="display: flex; justify-content: center; flex-wrap: wrap; padding: 20px;gap:10px">
        @foreach ($obat as $item)
            <div class="card"
                style="background-color: #fff; border-radius: 8px; padding: 15px; width: 300px; height: 450px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
                <div class="card-header" style="margin-bottom: 10px;">
                    <div class="name text-center" style="font-size: 16px; font-weight: bold; color: #007bff;">
                        {{ $item->nama_obat }}
                    </div>
                </div>
                <div class="card-body">
                    <img src="{{ asset('img/obat') }}/{{ $item->gambar }}" alt="Obat Batuk Cap"
                        style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 8px;">
                    {{ $item->deskripsi_obat }}</p>
                    {{-- <div style="color: #888; font-size: 12px;">{{ $item->indikasi_umum }}</div> --}}
                </div>
                <div class="card-footer"
                    style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                    <span style="font-size: 14px; font-weight: bold; color: #333;">Rp
                        {{ number_format($item->harga) }}</span>
                    <span style="font-size: 14px; font-weight: bold; color: #333;">Stok :
                        {{ number_format((float) $item->stok) }}</span>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>

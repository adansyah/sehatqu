<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehatqu Apotik Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #95dafa;">
    @include('user.layouts.navbar')
    <h1 class="text-center">Dokter</h1>
    <div class="container" style="display: flex; justify-content: space-around; padding: 5px;">
        @foreach ($data as $item)
            <div class="card"
                style="background-color: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); width: 500px; transition: transform 0.3s ease-in-out;">
                <div class="card-header"
                    style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 5px;">
                    <div class="name" style="font-size: 18px; font-weight: bold;">{{ $item->nama_dokter }}</div>
                    <div class="status" style="display: flex; align-items: center;">
                        <i class="fas fa-user-md" style="margin-right: 5px;"></i>
                        <span>Spesialis {{ $item->spesialis }}</span>
                    </div>
                </div>
                <div class="card-body text-center" style="margin-bottom: 20px;">
                    <img src="{{ asset('img/dokter') }}/{{ $item->gambar }}" alt="Doctor image" class="doctor-image"
                        style="width: 150px; height: 150px; border-radius: 50%; margin-right: 20px; transition: transform 0.3s ease-in-out;">
                    <p style="margin: 0; padding: 10px;">{{ $item->deskripsi }}</p>
                    <div class="info"
                        style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                        <div><i class="far fa-clock"></i> 35 tahun</div>
                        <div><i class="fas fa-thumbs-up"></i> 99%</div>
                    </div>
                </div>
                <div class="card-footer" style="display: flex; justify-content: space-between; align-items: center;">
                    <button onclick="location.href='{{ url('/konsultasi') }}'"
                        style="background-color: #ff5733; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease-in-out;">Konsultasi</button>
                    <span class="price" style="font-size: 18px; font-weight: bold;">Rp.
                        {{ $item->harga_konsultasi }}</span>
                </div>
            </div>
        @endforeach

        {{-- <div class="card"
            style="background-color: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); width: 500px; transition: transform 0.3s ease-in-out;">
            <div class="card-header"
                style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 5px;">
                <div class="name" style="font-size: 18px; font-weight: bold;">Dr. Henri</div>
                <div class="status" style="display: flex; align-items: center;">
                    <i class="fas fa-user-md" style="margin-right: 5px;"></i>
                    <span>Dokter Anak</span>
                </div>
            </div>
            <div class="card-body" style="margin-bottom: 20px;">
                <img src="img/doc.jpeg" alt="Doctor image" class="doctor-image"
                    style="width: 150px; height: 150px; border-radius: 50%; margin-right: 20px; transition: transform 0.3s ease-in-out;">
                <p style="margin: 0; padding: 10px;">Dr. Henri adalah dokter anak berdedikasi,Ia fokus pada diagnosis
                    akurat, perawatan tepat, dan pencegahan penyakit untuk mendukung perkembangan optimal anak-anak.</p>
                <div class="info"
                    style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <div><i class="far fa-clock"></i> 25 tahun</div>
                    <div><i class="fas fa-thumbs-up"></i> 100%</div>
                </div>
            </div>
            <div class="card-footer" style="display: flex; justify-content: space-between; align-items: center;">
                <button onclick="location.href='{{ url('/konsultasi') }}'"
                    style="background-color: #ff5733; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease-in-out;">Konsultasi</button>
                <span class="price" style="font-size: 18px; font-weight: bold;">Rp 100.000</span>
            </div>
        </div> --}}
    </div>
    {{-- <div class="container" style="display: flex; justify-content: space-around; padding: 5px;">
        <div class="card"
            style="background-color: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); width: 500px; transition: transform 0.3s ease-in-out;">
            <div class="card-header"
                style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 5px;">
                <div class="name" style="font-size: 18px; font-weight: bold;">Dr. Daffa</div>
                <div class="status" style="display: flex; align-items: center;">
                    <i class="fas fa-user-md" style="margin-right: 5px;"></i>
                    <span>Dokter Gigi</span>
                </div>
            </div>
            <div class="card-body" style="margin-bottom: 20px;">
                <img src="img/doc2.jpeg" alt="Doctor image" class="doctor-image"
                    style="width: 150px; height: 150px; border-radius: 50%; margin-right: 20px; transition: transform 0.3s ease-in-out;">
                <p style="margin: 0; padding: 10px;">Dr. Daffa adalah seorang dokter gigi,Ia fokus pada diagnosis
                    akurat, perawatan tepat, dan pencegahan masalah gigi untuk memastikan kesehatan gigi dan mulut yang
                    optimal bagi pasien.</p>
                <div class="info"
                    style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <div><i class="far fa-clock"></i> 16 tahun</div>
                    <div><i class="fas fa-thumbs-up"></i> 99%</div>
                </div>
            </div>
            <div class="card-footer" style="display: flex; justify-content: space-between; align-items: center;">
                <button onclick="location.href='{{ url('/konsultasi') }}'"
                    style="background-color: #ff5733; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease-in-out;">Konsultasi</button>
                <span class="price" style="font-size: 18px; font-weight: bold;">Rp 45.000</span>
            </div>
        </div>
        <div class="card"
            style="background-color: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); width: 500px; transition: transform 0.3s ease-in-out;">
            <div class="card-header"
                style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 5px;">
                <div class="name" style="font-size: 18px; font-weight: bold;">Dr. Erik</div>
                <div class="status" style="display: flex; align-items: center;">
                    <i class="fas fa-user-md" style="margin-right: 5px;"></i>
                    <span>Dokter Jantung</span>
                </div>
            </div>
            <div class="card-body" style="margin-bottom: 20px;">
                <img src="img/doc3.jpeg" alt="Doctor image" class="doctor-image"
                    style="width: 150px; height: 150px; border-radius: 50%; margin-right: 20px; transition: transform 0.3s ease-in-out;">
                <p style="margin: 0; padding: 10px;">Dr. Erik adalah seorang dokter jantung berdedikasi yang memberikan
                    perawatan kardiovaskular dengan keahlian dan ketelitian tinggi. Ia fokus pada diagnosis akurat,
                    perawatan tepat, dan pencegahan penyakit jantung untuk memastikan kesehatan jantung yang optimal
                    bagi pasien.</p>
                <div class="info"
                    style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <div><i class="far fa-clock"></i> 25 tahun</div>
                    <div><i class="fas fa-thumbs-up"></i> 100%</div>
                </div>
            </div>
            <div class="card-footer" style="display: flex; justify-content: space-between; align-items: center;">
                <button onclick="location.href='{{ url('/konsultasi') }}'"
                    style="background-color: #ff5733; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease-in-out;">Konsultasi</button>
                <span class="price" style="font-size: 18px; font-weight: bold;">Rp 100.000</span>
            </div>
        </div>
    </div>
    <div class="container" style="display: flex; justify-content: space-around; padding: 5px;">
        <div class="card"
            style="background-color: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); width: 500px; transition: transform 0.3s ease-in-out;">
            <div class="card-header"
                style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 5px;">
                <div class="name" style="font-size: 18px; font-weight: bold;">Dr. Saiful Galuh</div>
                <div class="status" style="display: flex; align-items: center;">
                    <i class="fas fa-user-md" style="margin-right: 5px;"></i>
                    <span>Dokter Ginjal</span>
                </div>
            </div>
            <div class="card-body" style="margin-bottom: 20px;">
                <img src="img/doc4.jpeg" alt="Doctor image" class="doctor-image"
                    style="width: 150px; height: 150px; border-radius: 50%; margin-right: 20px; transition: transform 0.3s ease-in-out;">
                <p style="margin: 0; padding: 10px;">Dr. Saiful Galuh adalah seorang dokter ginjal berdedikasi yang
                    memberikan perawatan nefrologi dengan keahlian tinggi. Ia fokus pada diagnosis akurat, perawatan
                    tepat, dan pencegahan penyakit ginjal untuk memastikan kesehatan ginjal yang optimal bagi pasien.
                </p>
                <div class="info"
                    style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <div><i class="far fa-clock"></i> 16 tahun</div>
                    <div><i class="fas fa-thumbs-up"></i> 99%</div>
                </div>
            </div>
            <div class="card-footer" style="display: flex; justify-content: space-between; align-items: center;">
                <button onclick="location.href='{{ url('/konsultasi') }}'"
                    style="background-color: #ff5733; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease-in-out;">Konsultasi</button>
                <span class="price" style="font-size: 18px; font-weight: bold;">Rp 45.000</span>
            </div>
        </div>
        <div class="card"
            style="background-color: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); width: 500px; transition: transform 0.3s ease-in-out;">
            <div class="card-header"
                style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 5px;">
                <div class="name" style="font-size: 18px; font-weight: bold;">Dr. Amelia</div>
                <div class="status" style="display: flex; align-items: center;">
                    <i class="fas fa-user-md" style="margin-right: 5px;"></i>
                    <span>Dokter Kandungan</span>
                </div>
            </div>
            <div class="card-body" style="margin-bottom: 20px;">
                <img src="img/doc5.jpeg" alt="Doctor image" class="doctor-image"
                    style="width: 150px; height: 150px; border-radius: 50%; margin-right: 20px; transition: transform 0.3s ease-in-out;">
                <p style="margin: 0; padding: 10px;">Dr. Amelia adalah seorang dokter kandungan berdedikasi yang
                    memberikan perawatan kesehatan reproduksi dengan keahlian dan perhatian tinggi. Ia fokus pada
                    diagnosis akurat, perawatan tepat, dan pencegahan masalah kesehatan reproduksi untuk memastikan
                    kesejahteraan optimal bagi pasien.</p>
                <div class="info"
                    style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <div><i class="far fa-clock"></i> 25 tahun</div>
                    <div><i class="fas fa-thumbs-up"></i> 100%</div>
                </div>
            </div>
            <div class="card-footer" style="display: flex; justify-content: space-between; align-items: center;">
                <button onclick="location.href='{{ url('/konsultasi') }}'"
                    style="background-color: #ff5733; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease-in-out;">Konsultasi</button>
                <span class="price" style="font-size: 18px; font-weight: bold;">Rp 100.000</span>
            </div>
        </div>
    </div>
</body> --}}

</html>

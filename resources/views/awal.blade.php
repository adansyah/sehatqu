@extends('user.layouts.app')

@section('content')
    <!-- Header -->
    <header
        class="bg-gradient-to-r from-green-400 via-blue-500 to-indigo-500 animate-gradient py-32 text-white text-center shadow-lg">
        <div class="container mx-auto px-6" data-aos="fade-up">
            <h1 class="text-5xl font-extrabold mb-4 drop-shadow-lg">Solusi Kesehatan Terlengkap</h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto opacity-90 leading-relaxed">
                Chat dokter, beli obat, dan dapatkan informasi kesehatan terkini — semua di <span
                    class="font-semibold">Sehatqu</span>!
            </p>
            <div class="mt-8">
                <a href=""
                    class="px-8 py-3 bg-white text-green-600 font-semibold rounded-full hover:bg-green-50 transition-all duration-300 shadow-md">Mulai
                    Sekarang</a>
            </div>
        </div>
    </header>

    <!-- Wave transition -->
    <div class="wave-divider">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,224L48,213.3C96,203,192,181,288,149.3C384,117,480,75,576,74.7C672,75,768,117,864,154.7C960,192,1056,224,1152,208C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>

    <!-- Services -->
    <section class="py-20 bg-gradient-to-b from-white via-gray-50 to-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12" data-aos="fade-up">Layanan
                Kami
            </h2>

            <div class="grid md:grid-cols-3 gap-10">
                <div data-aos="fade-up" data-aos-delay="100"
                    class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border border-gray-100"
                    onclick="Swal.fire('Konsultasi Dokter', 'Silakan login terlebih dahulu untuk konsultasi.', 'info')">
                    <div class="text-6xl text-blue-600 mb-4">💬</div>
                    <h3 class="text-xl font-bold mb-2">Konsultasi Dokter</h3>
                    <p class="text-gray-600">Konsultasi dengan dokter profesional kapan saja dan di mana saja.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200"
                    class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border border-gray-100"
                    onclick="Swal.fire('Toko Kesehatan', 'Login terlebih dahulu untuk mengakses toko.', 'info')">
                    <div class="text-6xl text-blue-600 mb-4">🏪</div>
                    <h3 class="text-xl font-bold mb-2">Toko Kesehatan</h3>
                    <p class="text-gray-600">Beli obat dan alat kesehatan dengan mudah dan aman.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="300"
                    class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border border-gray-100"
                    onclick="Swal.fire('Info Kesehatan', 'Login untuk melihat info terkini.', 'info')">
                    <div class="text-6xl text-blue-600 mb-4">📋</div>
                    <h3 class="text-xl font-bold mb-2">Info Kesehatan</h3>
                    <p class="text-gray-600">Dapatkan berita dan tips terbaru seputar dunia kesehatan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 mt-10">
        <div class="container mx-auto px-6 text-center">
            <p class="text-gray-400 text-sm">© 2025 Sehatqu Apotik Online. Semua Hak Dilindungi.</p>
            <div class="mt-3 flex justify-center space-x-6">
                <a href="#" class="hover:text-green-400 transition"><i data-feather="facebook"></i></a>
                <a href="#" class="hover:text-green-400 transition"><i data-feather="twitter"></i></a>
                <a href="#" class="hover:text-green-400 transition"><i data-feather="instagram"></i></a>
            </div>
        </div>
    </footer>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehatqu Apotik Online</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.95);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        header {
            animation: fadeInUp 1s ease-in-out;
        }

        .service-item {
            animation: zoomIn 0.6s ease-in-out;
        }
    </style>
</head>

<body class="bg-gray-100">

    @include('user.layouts.navbar')
    @include('sweetalert::alert')

    <!-- Header -->
    <header class="bg-[#0072ff] py-20 text-white text-center shadow-lg">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fadeInUp">Solusi Kesehatan Terlengkap</h1>
            <p class="text-lg max-w-2xl mx-auto leading-relaxed">
                Chat dokter, kunjungi toko kesehatan, beli obat, dan update informasi seputar kesehatan, semua bisa di
                Sehatqu!
            </p>
        </div>
    </header>

    <!-- Service Section -->
    <section class="py-16 bg-white text-center">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">

                <!-- Konsultasi Dokter -->
                <div data-aos="zoom-in" data-aos-delay="100"
                    class="service-item bg-gray-50 p-8 rounded-xl shadow-sm hover:-translate-y-2 hover:scale-[1.03] hover:shadow-xl transition duration-300 cursor-pointer"
                    onclick="alert('Konsul dengan Dokter Harus Login!')">
                    <div class="text-5xl text-[#0072ff] mb-4 transition-transform hover:rotate-6 hover:scale-110">💬
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Konsultasi dengan Dokter</h3>
                    <p class="text-gray-600">Konsultasi dengan dokter profesional kapan saja dan di mana saja.</p>
                </div>

                <!-- Toko Kesehatan -->
                <div data-aos="zoom-in" data-aos-delay="200"
                    class="service-item bg-gray-50 p-8 rounded-xl shadow-sm hover:-translate-y-2 hover:scale-[1.03] hover:shadow-xl transition duration-300 cursor-pointer"
                    onclick="alert('Toko Kesehatan Harus Login!')">
                    <div class="text-5xl text-[#0072ff] mb-4 transition-transform hover:rotate-6 hover:scale-110">🏪
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Toko Kesehatan</h3>
                    <p class="text-gray-600">Beli obat dan alat kesehatan dengan mudah dan aman.</p>
                </div>

                <!-- Info Kesehatan -->
                <div data-aos="zoom-in" data-aos-delay="300"
                    class="service-item bg-gray-50 p-8 rounded-xl shadow-sm hover:-translate-y-2 hover:scale-[1.03] hover:shadow-xl transition duration-300 cursor-pointer"
                    onclick="alert('Info Terkini Kesehatan Harus Login!')">
                    <div class="text-5xl text-[#0072ff] mb-4 transition-transform hover:rotate-6 hover:scale-110">📋
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Info Terkini Kesehatan</h3>
                    <p class="text-gray-600">Nantikan info terkini pada dunia kesehatan.</p>
                </div>

            </div>
        </div>
    </section>

    {{-- Footer (opsional)
  <footer class="bg-gray-800 text-white py-4 text-center shadow-inner">
    <div class="container mx-auto">
      <p>© 2024 Sehatqu Apotik Online. All rights reserved.</p>
      <p>
        <a href="#" class="text-white hover:underline">Tentang Kami</a> |
        <a href="#" class="text-white hover:underline">Kebijakan Privasi</a>
      </p>
    </div>
  </footer>
  --}}

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>

</body>

</html>

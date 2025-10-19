<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sehatqu Apotik Online</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://unpkg.com/feather-icons"></script>

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

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradientMove 6s ease infinite;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav id="navbar"
        class="fixed top-0 left-0 w-full bg-transparent backdrop-blur-md z-50 transition-all duration-500 ease-in-out">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <!-- Logo -->
            <a href="/home" class="flex items-center space-x-2">
                <i data-feather="heart" class="text-green-500 w-6 h-6"></i>
                <span class="text-xl font-bold text-green-600">Sehat Selalu</span>
            </a>

            <!-- Toggle Button -->
            <button id="menu-btn"
                class="md:hidden text-green-600 focus:outline-none hover:scale-110 transition-transform duration-300">
                <i data-feather="menu"></i>
            </button>

            <!-- Menu -->
            <ul id="menu"
                class="hidden md:flex space-x-8 font-medium items-center text-green-700 transition-all duration-300">
                <li><a href="/home" class="hover:text-green-500 transition-colors duration-200">Beranda</a></li>
                <li><a href="/obat" class="hover:text-green-500 transition-colors duration-200">Obat</a></li>
                <li><a href="/dokter" class="hover:text-green-500 transition-colors duration-200">Dokter</a></li>
                <li><a href="/konsultasi" class="hover:text-green-500 transition-colors duration-200">Konsultasi</a>
                </li>
                <li class="relative">
                    <a href="/pesan"
                        class="flex items-center space-x-1 hover:text-green-500 transition-colors duration-200 relative">
                        @if ($count > 0)
                            <span
                                class="absolute -top-2 -right-3 bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded-full">{{ $count }}</span>
                        @endif
                        <i data-feather="message-square"></i>
                    </a>
                </li>
                <a href="/login"
                    class="px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition-all duration-300">Login</a>
            </ul>
        </div>
        @include('sweetalert::alert')

        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="hidden md:hidden flex flex-col bg-white border-t border-gray-100 shadow-md fade-in text-center">
            <a href="/home" class="px-6 py-3 hover:bg-green-50 text-green-700 transition">Beranda</a>
            <a href="/obat" class="px-6 py-3 hover:bg-green-50 text-green-700 transition">Obat</a>
            <a href="/dokter" class="px-6 py-3 hover:bg-green-50 text-green-700 transition">Dokter</a>
            <a href="/konsultasi" class="px-6 py-3 hover:bg-green-50 text-green-700 transition">Konsultasi</a>
            <a href="/pesan"
                class="px-6 py-3 hover:bg-green-50 text-green-700 transition flex items-center justify-center space-x-2">
                <i data-feather="message-square"></i><span>Pesan</span>
            </a>
            <a href="/login"
                class="px-6 py-3 bg-green-500 text-white font-medium hover:bg-green-600 transition">Login</a>
        </div>
    </nav>

    <!-- Header -->
    <header
        class="bg-gradient-to-r from-green-400 via-blue-500 to-indigo-500 animate-gradient py-32 text-white text-center shadow-lg">
        <div class="container mx-auto px-6" data-aos="fade-up">
            <h1 class="text-5xl font-extrabold mb-4 drop-shadow-lg">Solusi Kesehatan Terlengkap</h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto opacity-90 leading-relaxed">
                Chat dokter, kunjungi toko kesehatan, beli obat, dan update informasi seputar kesehatan — semua bisa di
                <span class="font-semibold">Sehatqu!</span>
            </p>
            <div class="mt-8">
                <a href="/login"
                    class="px-8 py-3 bg-white text-green-600 font-semibold rounded-full hover:bg-green-50 transition-all duration-300 shadow-md">Mulai
                    Sekarang</a>
            </div>
        </div>
    </header>

    <!-- Services -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12" data-aos="fade-up">Layanan Kami
            </h2>

            <div class="grid md:grid-cols-3 gap-10">
                <!-- Item -->
                <div data-aos="fade-up" data-aos-delay="100"
                    class="service-item bg-gradient-to-br from-green-50 to-blue-50 p-8 rounded-2xl shadow-md hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer"
                    onclick="Swal.fire('Konsul dengan Dokter', 'Silakan login terlebih dahulu untuk konsultasi dengan dokter.', 'info')">
                    <div class="text-6xl text-blue-600 mb-4">💬</div>
                    <h3 class="text-xl font-bold mb-2">Konsultasi Dokter</h3>
                    <p class="text-gray-600">Konsultasi dengan dokter profesional kapan saja dan di mana saja.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200"
                    class="service-item bg-gradient-to-br from-green-50 to-blue-50 p-8 rounded-2xl shadow-md hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer"
                    onclick="Swal.fire('Toko Kesehatan', 'Login terlebih dahulu untuk mengakses toko kesehatan.', 'info')">
                    <div class="text-6xl text-blue-600 mb-4">🏪</div>
                    <h3 class="text-xl font-bold mb-2">Toko Kesehatan</h3>
                    <p class="text-gray-600">Beli obat dan alat kesehatan dengan mudah dan aman.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="300"
                    class="service-item bg-gradient-to-br from-green-50 to-blue-50 p-8 rounded-2xl shadow-md hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer"
                    onclick="Swal.fire('Info Kesehatan', 'Login untuk melihat info terkini seputar dunia kesehatan.', 'info')">
                    <div class="text-6xl text-blue-600 mb-4">📋</div>
                    <h3 class="text-xl font-bold mb-2">Info Kesehatan</h3>
                    <p class="text-gray-600">Dapatkan update terkini mengenai dunia kesehatan setiap hari.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="text-gray-400 text-sm">© 2025 Sehatqu Apotik Online. Semua Hak Dilindungi.</p>
            <div class="mt-3 flex justify-center space-x-6">
                <a href="#" class="hover:text-green-400 transition"><i data-feather="facebook"></i></a>
                <a href="#" class="hover:text-green-400 transition"><i data-feather="twitter"></i></a>
                <a href="#" class="hover:text-green-400 transition"><i data-feather="instagram"></i></a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
        feather.replace();

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('bg-white', 'shadow-md');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-white', 'shadow-md');
                navbar.classList.add('bg-transparent');
            }
        });

        // Mobile menu toggle
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sehat Selalu Apotik Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        /* Animasi fade-in */
        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-gray-50 font-sans text-gray-800">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-white/80 backdrop-blur-md shadow-sm z-50 transition-all duration-300">
        <div class="container mx-auto flex justify-between items-center px-6 py-3 fade-in">
            <!-- Logo -->
            <a href="/home" class="flex items-center space-x-2">
                <i data-feather="heart" class="text-green-500 w-6 h-6"></i>
                <span class="text-xl font-bold text-green-600">Sehat Selalu</span>
            </a>

            <!-- Tombol Toggle (Mobile) -->
            <button id="menu-btn"
                class="md:hidden text-green-600 focus:outline-none hover:scale-110 transition-transform duration-300">
                <i data-feather="menu"></i>
            </button>

            <!-- Menu -->
            <ul id="menu"
                class="hidden md:flex space-x-6 font-medium items-center text-green-700 transition-all duration-300">
                <li><a href="/home" class="hover:text-green-500 transition-colors duration-200">Beranda</a></li>
                <li><a href="/obat" class="hover:text-green-500 transition-colors duration-200">Obat</a></li>
                <li><a href="/dokter" class="hover:text-green-500 transition-colors duration-200">Dokter</a></li>
                <li><a href="/konsultasi" class="hover:text-green-500 transition-colors duration-200">Konsultasi</a>
                </li>

                <li class="relative">
                    <a href="/pesan"
                        class="flex items-center space-x-1 hover:text-green-500 transition-colors duration-200">
                        <!-- Contoh notifikasi -->
                        @if ($count > 0)
                            <span
                                class="absolute -top-2 -right-3 bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded-full">
                                {{ $count }}
                            </span>
                        @endif
                        <i data-feather="message-square"></i>

                    </a>
                </li>

                {{-- Tombol Login / Logout --}}
                {{-- 
        @auth
          <form action="/logoutuser" method="POST">
            @csrf
            <button type="submit"
              class="ml-4 px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition-all duration-300">
              Logout
            </button>
          </form>
        @else
          <a href="/login"
            class="ml-4 px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition-all duration-300">
            Login
          </a>
        @endauth 
        --}}
            </ul>
        </div>

        <!-- Menu Mobile -->
        <div id="mobile-menu"
            class="hidden md:hidden flex flex-col bg-white border-t border-gray-100 shadow-md fade-in">
            <a href="/home" class="px-6 py-3 hover:bg-green-50 text-green-700 transition">Beranda</a>
            <a href="/obat" class="px-6 py-3 hover:bg-green-50 text-green-700 transition">Obat</a>
            <a href="/dokter" class="px-6 py-3 hover:bg-green-50 text-green-700 transition">Dokter</a>
            <a href="/konsultasi" class="px-6 py-3 hover:bg-green-50 text-green-700 transition">Konsultasi</a>
            <a href="/pesan" class="px-6 py-3 hover:bg-green-50 text-green-700 transition flex items-center space-x-2">
                <i data-feather="message-square"></i><span>Pesan</span>
            </a>
            <a href="/login"
                class="px-6 py-3 text-center bg-green-500 text-white font-medium hover:bg-green-600 transition">Login</a>
        </div>
    </nav>

    <!-- Script -->
    <script>
        feather.replace();

        // Toggle menu mobile
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehatqu Apotik Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .navbar-nav .nav-link {
            color: #0072ff !important;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #0051cc !important;
        }

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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .service-item:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 12px 24px rgba(0, 114, 255, 0.2);
        }

        .service-icon {
            transition: transform 0.3s;
        }

        .service-icon:hover {
            transform: rotate(10deg) scale(1.2);
        }

        .footer {
            animation: fadeInUp 1.2s ease-in-out;
        }
    </style>
</head>

<body style="background-color: #f2f3f5;">

    @include('user.layouts.navbar')
    @include('sweetalert::alert')

    <header
        style="background-color: #0072ff; padding: 5rem 0; color: #ffffff; text-align: center; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);">
        <div class="container">
            <h1 style="font-size: 3rem; font-weight: bold;">Solusi Kesehatan Terlengkap</h1>
            <p style="font-size: 1.2rem; margin: 1rem 0;">Chat dokter, kunjungi toko kesehatan, beli obat, dan update
                informasi seputar kesehatan, semua bisa di Sehatqu!</p>
        </div>
    </header>

    <div class="service-section" style="padding: 4rem 0; background-color: #ffffff; text-align: center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="service-item" onclick="alert('Konsul dengan Dokter Harus Login!');"
                        style="margin-bottom: 2rem; padding: 2rem; border-radius: 10px; background-color: #f9f9f9; cursor: pointer;">
                        <div class="service-icon" style="font-size: 3rem; color: #0072ff; margin-bottom: 1rem;">💬</div>
                        <div class="service-title" style="font-size: 1.5rem; font-weight: bold; color: #333333;">
                            Konsultasi dengan Dokter</div>
                        <div class="service-description" style="font-size: 1rem; color: #666666;">Konsultasi dengan
                            dokter profesional kapan saja dan di mana saja.</div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item" onclick="alert('Toko Kesehatan Harus Login!');"
                        style="margin-bottom: 2rem; padding: 2rem; border-radius: 10px; background-color: #f9f9f9; cursor: pointer;">
                        <div class="service-icon" style="font-size: 3rem; color: #0072ff; margin-bottom: 1rem;">🏪</div>
                        <div class="service-title" style="font-size: 1.5rem; font-weight: bold; color: #333333;">Toko
                            Kesehatan</div>
                        <div class="service-description" style="font-size: 1rem; color: #666666;">Beli obat dan alat
                            kesehatan dengan mudah dan aman.</div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="service-item" onclick="alert('Info Terkini Kesehatan Harus Login!');"
                        style="margin-bottom: 2rem; padding: 2rem; border-radius: 10px; background-color: #f9f9f9; cursor: pointer;">
                        <div class="service-icon" style="font-size: 3rem; color: #0072ff; margin-bottom: 1rem;">📋</div>
                        <div class="service-title" style="font-size: 1.5rem; font-weight: bold; color: #333333;">Info
                            Terkini Kesehatan</div>
                        <div class="service-description" style="font-size: 1rem; color: #666666;">Nantikan info terkini
                            pada dunia kesehatan.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <footer class="footer"
        style="background-color: #3a3a3a; color: #ffffff; padding: 1rem 0; text-align: center; box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);">
        <div class="container">
            <p>© 2024 Sehatqu Apotik Online. All rights reserved.</p>
            <p><a href="#" style="color: #ffffff; text-decoration: none;">Tentang Kami</a> | <a href="#"
                    style="color: #ffffff; text-decoration: none;">Kebijakan Privasi</a></p>
        </div>
    </footer> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
</body>

</html>
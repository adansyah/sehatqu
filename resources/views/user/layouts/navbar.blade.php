<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Selalu Apotik Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #007bff;
        }

        .navbar-nav .nav-link {
            color: #007bff;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #0056b3;
        }

        .btn-login {
            background-color: #007bff;
            color: #fff;
            border-radius: 25px;
            padding: 8px 20px;
            text-transform: uppercase;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .notif {
            position: relative;
        }

        .circle {
            position: absolute;
            top: -1px;
            right: -5px;
            border-radius: 50%;
            background-color: rgba(249, 32, 32, 0.86);
            color: white;
            font-size: 12px;
            padding: 2px 9px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/home">SEHAT SELALU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/obat">Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dokter">Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/konsultasi">Konsultasi</a>
                    </li>
                    <li class="nav-item position-relative ms-2">
                        <a class="nav-link" href="/pesan">
                            <i data-feather="message-square"></i>
                            @if ($count > 0)
                                <span
                                    class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $count }}
                                </span>
                            @endif
                        </a>
                    </li>

                    {{-- @auth
                        <li class="nav-item ms-3">
                            <form action="/logoutuser" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger" type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item ms-3">
                            <a class="btn btn-login" href="/login">Login</a>
                        </li>
                    @endauth --}}
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0Xb2w5jRsZTtF3Fb2v9ZOxw2pZ4R3S3XtD7WnK4yG4sAApyS" crossorigin="anonymous">
    </script>

    <script>
        feather.replace();
    </script>

</body>

</html>

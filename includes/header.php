<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Di Desa Wisata Pulasari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .full-screen {
            background-image: url("./assets/background-img.jpg");
            background-size: cover;
            background-position: center;
            height: 30vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar-nav .nav-item+.nav-item {
            margin-left: 1rem;
        }

        .content {
            margin: 2rem 0;
        }

        .content .card {
            margin-right: 1rem;
        }
    </style>
</head>

<body>
    <div>

        <div class="full-screen">
            <h3 class="text-light">SELAMAT DATANG DI TRAVEL ADVENTURE</h3>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Beranda <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pemesanan_wisata.php">Daftar paket wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="modifikasi_pemesanan.php">Modifikasi Pesanan</a>
                    </li>
                </ul>
            </div>
        </nav>
</body>

</html>
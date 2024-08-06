<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Full Screen Image with Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      margin-bottom: 1rem;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .card-body {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .deskripsi-yt {
      text-align: justify;
    }
  </style>
</head>

<body>

  <div class="container content m-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-4 d-flex">
        <div class="card w-100">
          <img src="./assets/camping.jpg" class="card-img-top" alt="Camping">
          <div class="card-body d-flex flex-column">
            <p class="card-text fst-italic"><i class="fa-solid fa-calendar-days me-2"></i> 17 Agustus 2024</p>
            <p class="card-text fw-bold">Paket Mendaki Gunung Batur dan Camping</p>
            <p class="card-text text-truncate" title="Gunung Batur merupakan destinasi populer untuk pendaki. Nikmati pemandangan indah dan pengalaman camping yang tak terlupakan di bawah langit berbintang. Trekking ke puncak Gunung Batur menawarkan pemandangan matahari terbit yang spektakuler, membuat pengalaman mendaki ini tidak terlupakan.">Gunung Batur merupakan destinasi populer untuk pendaki. Nikmati pemandangan indah dan pengalaman camping yang tak terlupakan di bawah langit berbintang. Trekking ke puncak Gunung Batur menawarkan pemandangan matahari terbit yang spektakuler, membuat pengalaman mendaki ini tidak terlupakan.</p>

            <a href="pemesanan_wisata.php" class="btn btn-primary mt-auto">Lihat Detail</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex">
        <div class="card w-100">
          <img src="./assets/jeep.jpg" class="card-img-top" alt="Jeep">
          <div class="card-body d-flex flex-column">
            <p class="card-text fst-italic"><i class="fa-solid fa-calendar-days me-2"></i> 20 Agustus 2024</p>
            <p class="card-text fw-bold">Paket Kuber Bali ATV - Harga Promo</p>
            <p class="card-text text-truncate" title="Nikmati petualangan seru dengan ATV di Bali! Promo spesial untuk liburan Anda, menjelajahi keindahan alam Bali dengan sensasi mengendarai ATV melalui medan off-road yang menantang dan pemandangan alam yang menakjubkan.">Nikmati petualangan seru dengan ATV di Bali! Promo spesial untuk liburan Anda, menjelajahi keindahan alam Bali dengan sensasi mengendarai ATV melalui medan off-road yang menantang dan pemandangan alam yang menakjubkan.</p>
            <a href="pemesanan_wisata.php" class="btn btn-primary mt-auto">Lihat Detail</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex">
        <div class="card w-100">
          <div class="card-body">
            <h4>Paket Wisata 1</h4>
            <iframe src="https://www.youtube.com/embed/2df5m0JcNS0" title="YouTube video player" allowfullscreen style="width: 100%; height: 200px;"></iframe>
            <p class="deskripsi-yt">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid repellendus reprehenderit commodi deleniti cum assumenda, ab nisi optio, suscipit ut praesentium. Blanditiis voluptas vero reprehenderit aliquam a inventore quas eligendi hic earum neque eaque ipsum, fugit excepturi dolores pariatur, soluta ipsam sint? Similique laborum eligendi corrupti mollitia perspiciatis unde earum.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4 d-flex justify-content-center">
      <div class="col-md-4 d-flex">
        <div class="card w-100">
          <img src="./assets/curug.jpg" class="card-img-top" alt="curug">
          <div class="card-body">
            <p class="card-text fst-italic"><i class="fa-solid fa-calendar-days me-2"></i> 25 Agustus 2024</p>
            <p class="card-text fw-bold">Paket Curug untuk 10 Orang</p>
            <p class="card-text text-truncate" title="Nikmati keindahan curug dengan paket spesial kami untuk 10 orang. Paket ini mencakup kunjungan ke lokasi curug yang menakjubkan, dengan berbagai aktivitas outdoor dan pemandangan alam yang memukau. Dapatkan pengalaman yang tak terlupakan bersama keluarga atau teman dengan paket lengkap kami, yang dirancang untuk memberikan kenyamanan dan kesenangan maksimal selama liburan Anda.">Nikmati keindahan curug dengan paket spesial kami untuk 10 orang. Paket ini mencakup kunjungan ke lokasi curug yang menakjubkan, dengan berbagai aktivitas outdoor dan pemandangan alam yang memukau. Dapatkan pengalaman yang tak terlupakan bersama keluarga atau teman dengan paket lengkap kami, yang dirancang untuk memberikan kenyamanan dan kesenangan maksimal selama liburan Anda.</p>
            <a href="pemesanan_wisata.php" class="btn btn-primary mt-auto">Lihat Detail</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex">
        <div class="card w-100">
          <img src="./assets/gunung.jpg" class="card-img-top" alt="gunung">
          <div class="card-body">
            <p class="card-text fst-italic"><i class="fa-solid fa-calendar-days me-2"></i> 28 Agustus 2024</p>
            <p class="card-text fw-bold">Paket Gunung BROMO untuk 6 Orang</p>
            <p class="card-text text-truncate" title="Eksplorasi Gunung Bromo dengan paket spesial untuk 6 orang kami. Paket ini termasuk perjalanan ke puncak Gunung Bromo untuk menikmati matahari terbit yang mempesona, serta eksplorasi sekitar kawasan Bromo yang terkenal dengan lanskap vulkaniknya yang unik. Dengan berbagai pilihan aktivitas dan kenyamanan yang disediakan, paket ini cocok untuk liburan bersama kelompok atau keluarga.">Eksplorasi Gunung Bromo dengan paket spesial untuk 6 orang kami. Paket ini termasuk perjalanan ke puncak Gunung Bromo untuk menikmati matahari terbit yang mempesona, serta eksplorasi sekitar kawasan Bromo yang terkenal dengan lanskap vulkaniknya yang unik. Dengan berbagai pilihan aktivitas dan kenyamanan yang disediakan, paket ini cocok untuk liburan bersama kelompok atau keluarga.">Eksplorasi Gunung Bromo dengan paket spesial untuk 6 orang kami. Paket ini termasuk perjalanan ke puncak Gunung Bromo untuk menikmati matahari terbit yang mempesona, serta eksplorasi sekitar kawasan Bromo yang terkenal dengan lanskap vulkaniknya yang unik. Dengan berbagai pilihan aktivitas dan kenyamanan yang disediakan, paket ini cocok untuk liburan bersama kelompok atau keluarga.">Eksplorasi Gunung Bromo dengan paket spesial untuk 6 orang kami. Paket ini termasuk perjalanan ke puncak Gunung Bromo untuk menikmati matahari terbit yang mempesona, serta eksplorasi sekitar kawasan Bromo yang terkenal dengan lanskap vulkaniknya yang unik. Dengan berbagai pilihan aktivitas dan kenyamanan yang disediakan, paket ini cocok untuk liburan bersama kelompok atau keluarga.</p>
            <a href="pemesanan_wisata.php" class="btn btn-primary mt-auto">Lihat Detail</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex">
        <div class="card w-100">
          <div class="card-body">
            <h4>Paket Wisata 2</h4>
            <iframe src="https://www.youtube.com/embed/2df5m0JcNS0" title="YouTube video player" allowfullscreen style="width: 100%; height: 200px;"></iframe>
            <p class="deskripsi-yt">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid repellendus reprehenderit commodi deleniti cum assumenda, ab nisi optio, suscipit ut praesentium. Blanditiis voluptas vero reprehenderit aliquam a inventore quas eligendi hic earum neque eaque ipsum, fugit excepturi dolores pariatur, soluta ipsam sint? Similique laborum eligendi corrupti mollitia perspiciatis unde earum.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <?php include 'includes/footer.php'; ?>
</body>

</html>
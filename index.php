<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Full Screen Image with Navbar</title>
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

  <div class="container content">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="./assets/camping.jpg" class="card-img-top" alt="Camping">
          <div class="card-body">
            <p class="card-text fst-italic">17 Agustus 2024</p>
            <p class="card-text fw-bold">Paket Mendaki Gunung Batur dan Camping</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="./assets/jeep.jpg" class="card-img-top" alt="Jeep">
          <div class="card-body">
            <p class="card-text fst-italic">20 Agustus 2024</p>
            <p class="card-text fw-bold">Paket Kuber Bali ATV - Harga Promo Mulai 650rb</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
        </div>
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/2df5m0JcNS0" title="YouTube video player" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
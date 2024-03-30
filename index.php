<?php
require "./backend/connection.php";
require "./backend/listDataMaduLimit.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sinergi Honey</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    .carousel::after {
      content: "";
      position: absolute;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.5);
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg fixed-top bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Sinergi Honey</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="#product">Produk</a>
          <a class="nav-link" href="#testimoni">Testimoni</a>
          <a class="nav-link" href="./pages/auth/login.php">Login</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="carousel carousel-dark slide" data-bs-ride="false">
    <div class="carousel-inner" style="height: 400px;">
      <div class="carousel-item active" style="height: 400px;">
        <img src="./assets/images/slider/1.jpg" class="d-block w-100" style="height: 400px; object-fit:cover">
        <div class="carousel-caption d-none d-md-block text-white" style="z-index: 100;">
          <h3 class="fw-bold text-uppercase">Sinergi Honey</h3>
          <p>Tempat beli madu terpecaya dengan kulitas terbaik!</p>
        </div>
      </div>
    </div>
  </div>

  <section id="product" class="container mt-5">
    <h2 class="text-center mb-3">LIST PRODUK</h2>
    <div class="row">
      <?php if (mysqli_num_rows($products)) : ?>
        <?php foreach ($products as $product) : ?>
          <div class="col-3">
            <div class="card">
              <img src="./assets/images/products/<?= $product["foto_produk"] ?>" class="card-img-top" style="height: 250px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title"><?= $product["nama_produk"] ?></h5>
                <p class="card-text">
                  <?= "Rp " . number_format($product["harga_produk"], 0, ',', '.') ?>
                </p>
                <button class="btn btn-warning w-100" onclick="youMustLogin()">
                  <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  Beli
                </button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <h6 class="text-center text-secondary">Produk tidak ditemukan</h6>
      <?php endif; ?>
    </div>

  </section>

  <section id="testimoni" class="bg-light my-5 py-5">
    <h2 class="text-center mb-3">TESTIMONI</h2>
    <div class="container">
      <div class="row">
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="me-3">
                  <img src="./assets/images/profile/user.png" width="40" height="40" style="object-fit: cover; border-radius: 50%">
                </div>
                <div>
                  <h5 class="card-title">Juned</h5>
                  <h6 class="card-subtitle mb-2 text-muted">penikmat madu</h6>
                </div>
              </div>
              <p class="card-text mt-2">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="me-3">
                  <img src="./assets/images/profile/user.png" width="40" height="40" style="object-fit: cover; border-radius: 50%">
                </div>
                <div>
                  <h5 class="card-title">Eman</h5>
                  <h6 class="card-subtitle mb-2 text-muted">penikmat madu</h6>
                </div>
              </div>
              <p class="card-text mt-2">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="me-3">
                  <img src="./assets/images/profile/user.png" width="40" height="40" style="object-fit: cover; border-radius: 50%">
                </div>
                <div>
                  <h5 class="card-title">Harun</h5>
                  <h6 class="card-subtitle mb-2 text-muted">penikmat madu</h6>
                </div>
              </div>
              <p class="card-text mt-2">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-dark text-white">
    <div class="container">
      <footer class="py-5">
        <div class="row">
          <div class="col-12 text-center">
            <div class="d-flex align-items-center justify-content-center">
              <img src="./assets/images/logo.png" width="100">
              <div>
                <h5>Sinergi Honey</h5>
                <p>Tempat beli madu terpecaya dengan kulitas terbaik!</p>
              </div>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-center py-4 my-4 border-top">
          <p>&copy; 2023 Sinergi Honey.</p>
          </ul>
        </div>
      </footer>
    </div>
  </section>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script type="text/javascript">
    const youMustLogin = () => {
      swal("Tidak Bisa Beli", "Silahkan Login atau Daftar Dahulu", "error");
    }
  </script>
</body>

</html>
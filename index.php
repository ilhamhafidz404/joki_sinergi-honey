<?php
require "./backend/connection.php";
require "./backend/pelanggan/listDataMaduLimit.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sinergi Honey</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

  <div class="carousel carousel-dark  slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" style="height: 600px;">
      <div class="carousel-item active" style="height: 600px;">
        <img src="./assets/images/slider/1.jpg" class="d-block w-100" style="height: 600px; object-fit:cover">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item" style="height: 600px;">
        <img src="./assets/images/slider/2.jpg" class="d-block w-100" style="height: 600px; object-fit:cover">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item" style="height: 600px;">
        <img src="./assets/images/slider/3.jpg" class="d-block w-100" style="height: 600px; object-fit:cover">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <section id="product" class="container mt-5">
    <h2 class="text-center mb-3">LIST PRODUK</h2>
    <div class="row">
      <?php foreach ($products as $product) : ?>
        <div class="col-3">
          <div class="card">
            <img src="./assets/images/products/<?= $product["foto"] ?>" class="card-img-top" style="height: 250px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?= $product["nama"] ?></h5>
              <p class="card-text"><?= $product["harga"] ?></p>
              <form method="POST">
                <input type="text" value="<?= $product['nama'] ?>" name="productName" hidden>
                <input type="text" value="<?= $product['harga'] ?>" name="productPrice" hidden>
                <input type="text" value="<?= $product['foto'] ?>" name="productImage" hidden>
                <button class="btn btn-primary w-100" name="addToCart" onclick="return confirm('Yakin menmbah ke keranjang?')">
                  <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  Tambah ke Keranjang
                </button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
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
                  <img src="./assets/images/profile/1.jpeg" width="60" height="60" style="object-fit: cover; border-radius: 50%">
                </div>
                <div>
                  <h5 class="card-title">Ilham Hafidz</h5>
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
                  <img src="./assets/images/profile/1.jpeg" width="60" height="60" style="object-fit: cover; border-radius: 50%">
                </div>
                <div>
                  <h5 class="card-title">Ilham Hafidz</h5>
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
                  <img src="./assets/images/profile/1.jpeg" width="60" height="60" style="object-fit: cover; border-radius: 50%">
                </div>
                <div>
                  <h5 class="card-title">Ilham Hafidz</h5>
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
          <div class="col-6 col-md-2 mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
            </ul>
          </div>

          <div class="col-6 col-md-2 mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
            </ul>
          </div>

          <div class="col-6 col-md-2 mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
            </ul>
          </div>

          <div class="col-md-5 offset-md-1 mb-3">
            <form>
              <h5>Subscribe to our newsletter</h5>
              <p>Monthly digest of what's new and exciting from us.</p>
              <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn btn-primary" type="button">Subscribe</button>
              </div>
            </form>
          </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
          <p>&copy; 2022 Company, Inc. All rights reserved.</p>
          <ul class="list-unstyled d-flex">
            <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                  <use xlink:href="#twitter" />
                </svg></a></li>
            <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                  <use xlink:href="#instagram" />
                </svg></a></li>
            <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                  <use xlink:href="#facebook" />
                </svg></a></li>
          </ul>
        </div>
      </footer>
    </div>
  </section>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
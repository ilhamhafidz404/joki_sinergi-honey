<?php
session_start();
require "./../../backend/pelanggan/listDataMadu.php";


$test = mysqli_query($connect, "SELECT * FROM carts INNER JOIN accounts on carts.account_id=accounts.account_id");
var_dump($test);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sinergi Honey</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="./../../dist/css/pelanggan/index.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Sinergi Honey</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION["nama"] ?>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="#">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  <main class="row">
    <aside class="col-2 px-4">
      <div class="list-group mt-3">
        <a href="./index.php" class="list-group-item list-group-item-action">
          <i class="fa-solid fa-list"></i>
          Produk
        </a>
        <a href="./keranjang.php" class="list-group-item list-group-item-action">
          <i class="fa-solid fa-cart-shopping"></i>
          Keranjang
        </a>
        <button type="button" class="list-group-item list-group-item-action">
          <i class="fa-solid fa-money-check"></i>
          Transaksi
        </button>
        <button type="button" class="list-group-item list-group-item-action">
          <i class="fa-solid fa-file-invoice"></i>
          Order
        </button>
      </div>
    </aside>
    <section class="col-10">


      <section class="container row">

        <div class="col-3 p-2">
          <div class="card">
            <img src="./../../assets/images/products/2.webp" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Madu ABC</h5>
              <h4>Rp. 2000.000</h4>
              <a href="#" class="btn btn-danger w-100">
                <i class="fa-solid fa-trash"></i>
                Hapus Dari Keranjang
              </a>
            </div>
          </div>
        </div>
      </section>

    </section>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/4b990370bb.js" crossorigin="anonymous"></script>
</body>

</html>
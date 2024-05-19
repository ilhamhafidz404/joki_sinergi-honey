<?php
session_start();
require "./../../backend/connection.php";
require "./../../backend/listDataMadu.php";
require "./../../backend/addToCart.php";


if (!isset($_SESSION["login"])) {
  header("Location: ./../auth/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Produk - Pelanggan
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./../../template/argon-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./../../template/argon-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./../../template/argon-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./../../template/argon-dashboard/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-gradient-warning position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <span class="ms-1 font-weight-bold">Sinergi Honey</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./keranjang.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-cart text-warning text-sm opacity-10" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Keranjang</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./transaksi.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Transaksi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./history.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">History Transaksi</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <?php if (isset($_GET["search"])) : ?>
              <div class="me-2">
                <a href="./index.php" class="btn btn-white mb-0">
                  Reset
                </a>
              </div>
            <?php endif; ?>
            <form action="">
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Search.." name="search">
              </div>
            </form>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="./../../backend/auth/logout.php" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Log Out</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">List Produk Madu</h6>
            </div>
            <div class="card-body p-3">
              <div class="row">
                <?php if (mysqli_num_rows($products)) : ?>
                  <?php foreach ($products as $product) : ?>
                    <div class="col-6">
                      <div class="card">
                        <img src="./../../assets/images/products/<?= $product["foto_produk"] ?>" class="card-img-top" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                          <h4 class="card-title"><?= $product["nama_produk"] ?></h4>
                          <h5 class="card-title fw-bold">
                            <?= "Rp " . number_format($product["harga_produk"], 0, ',', '.') ?>
                          </h5>
                          <p class="card-text">Stok tersedia: <span class="fw-bold"><?= $product["stok"] ?></span></p>
                          <p class="fw-bold">Khasiat: </p>
                          <p><?= $product["khasiat"] ?></p>
                          <p class="fw-bold">Tersedia Ukuran: <span class="fw-normal"><?= $product["ukuran"] ?></span></p>
                          <form method="POST">
                            <input type="text" value="<?= $product['id_product'] ?>" name="productId" hidden>
                            <input type="text" value="<?= $product['nama_produk'] ?>" name="productName" hidden>
                            <input type="text" value="<?= $product['harga_produk'] ?>" name="productPrice" hidden>
                            <input type="text" value="<?= $product['foto_produk'] ?>" name="productImage" hidden>
                            <a href="./transaksi.php?nama=<?= $product['nama_produk'] ?>&harga=<?= $product['harga_produk'] ?>&id=<?= $product['id_product'] ?>&img=<?= $product['foto_produk'] ?>" class="btn btn-warning w-100">
                              <i class="fas fa-money-bill-wave d-inline-block me-2" aria-hidden="true"></i>
                              Beli Produk
                            </a>
                            <button class="btn btn-secondary w-100" name="addToCart" onclick="return confirm('Yakin menmbah ke keranjang?')">
                              <i class="ni ni-cart text-lg opacity-10 d-inline-block me-2" aria-hidden="true"></i>
                              Tambah ke Keranjang
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else : ?>
                  <center>
                    <h5>Belum ada Produk</h5>
                  </center>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="" class="font-weight-bold" target="_blank">Harun</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
</body>

</html>
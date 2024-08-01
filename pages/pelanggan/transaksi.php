<?php
session_start();
require "./../../backend/connection.php";
require "./../../backend/listCart.php";
require "./../../backend/submitTransaction.php";

if (isset($_GET["nama"]) && isset($_GET["harga"]) && isset($_GET["id"]) && isset($_GET["img"])) {
  $accountId = $_SESSION["id"];
  $productId = $_GET["id"];
  $productName = $_GET["nama"];
  $productPrice = $_GET["harga"];
  $productImage = $_GET["img"];

  mysqli_query($connect, "INSERT INTO keranjang (`id_account`, `name_product`, `price_product`, `quantity`, `image_product`, `id_product`) VALUES ($accountId, '$productName', $productPrice, 1, '$productImage', '$productId')");
}

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
    Transaksi - Pelanggan
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
          <a class="nav-link" href="./index.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./keranjang.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-cart text-warning text-sm opacity-10" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Keranjang</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./transaksi.php">
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Transaksi</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Transaksi</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="./../../backend/auth/logout.php" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Keluar</span>
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
              <h6 class="text-capitalize">Transaksi</h6>
            </div>
            <section class="p-4">
              <form method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6 mb-3">
                    <label for="product">Produk</label>
                    <select class="form-select" name="product" id="product">
                      <?php if (isset($_GET["nama"]) && isset($_GET["harga"]) && isset($_GET["id"])) : ?>
                        <option value="<?= $_GET["id"] ?>" harga="<?= $_GET["harga"] ?>" onclick="changeProduct(event)">
                          <?= $_GET["nama"] ?>
                          (Rp <?= $_GET["harga"] ?>)
                        </option>
                      <?php else : ?>
                        <option selected hidden>Pilih Produk</option>
                      <?php endif; ?>
                      <?php foreach ($cartList as $product) : ?>
                        <option value="<?= $product["id_product"] ?>" harga="<?= $product["price_product"] ?>" onclick="changeProduct(event)">
                          <?= $product["name_product"] ?>
                          ( Rp <?= $product["price_product"] ?>)
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-6 mb-3">
                    <label for="jumlah">Jumlah Beli</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah">
                  </div>
                  <div class="col-3 mb-3">
                    <label for="village">Desa</label>
                    <input type="text" class="form-control" id="village" name="village">
                  </div>
                  <div class="col-3 mb-3">
                    <label for="subdistrict">Kecamatan</label>
                    <input type="text" class="form-control" id="subdistrict" name="subdistrict">
                  </div>
                  <div class="col-3 mb-3">
                    <label for="district">Kabupaten</label>
                    <input type="text" class="form-control" id="district" name="district">
                  </div>
                  <div class="col-3 mb-3">
                    <label for="city">Kota</label>
                    <input type="text" class="form-control" id="city" name="city">
                  </div>
                  <div class="col-12 mb-3">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" rows="5" id="address" name="address"></textarea>
                  </div>
                  <div class="col-3">
                    <label for="">Pilih Ekpedisi</label>
                    <br>
                    <input type="radio" name="expedition" id="JNE" value="JNE">
                    <label for="JNE" class="me-4">JNE</label>
                    <input type="radio" name="expedition" id="JNT" value="JNT">
                    <label for="JNT">JNT</label>
                  </div>
                  <div class="col-4 mb-3">
                    <label for="payment_method">Metode Pembayaran</label>
                    <select class="form-select" id="payment_method" name="payment_method">
                      <option selected hidden>Pilih Metode Pembayaran</option>
                      <option value="BRI">BRI : 4266 0104 6708 537 (MOH SAHERI)</option>
                      <option value="DANA">DANA : 085863836003 (MOH SAHERI)</option>
                    </select>
                  </div>
                  <div class="d-flex justify-content-end">
                    <?php if (isset($_GET["harga"])) : ?>
                      <button type="button" onclick="hitungTotalTransaksi(<?= $_GET['harga'] ?>)" data-bs-toggle="modal" data-bs-target="#modalTransaksi" class="btn btn-warning">
                        Submit
                      </button>
                    <?php else : ?>
                      <button type="button" onclick="hitungTotalTransaksi()" data-bs-toggle="modal" data-bs-target="#modalTransaksi" class="btn btn-warning">
                        Submit
                      </button>
                    <?php endif; ?>
                  </div>
                </div>


                <div class="modal fade" id="modalTransaksi">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pembayaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="col-12 mb-3">
                          <label for="payment_proof" class="form-label">Total Yang Harus Dibayar</label>
                          <h4 id="totalBayar"></h4>
                        </div>
                        <div class="col-12 mb-3">
                          <label for="payment_proof" class="form-label">Bukti Pembayaran</label>
                          <input class="form-control" type="file" name="payment_proof" id="payment_proof">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-warning" name="submitTransaction"> Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </section>
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



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script>
    let totalBayar = 0;

    const changeProduct = (e) => {
      totalBayar = 0;

      if (e) {
        totalBayar = parseInt(e.target.getAttribute("harga"));
      }
    }

    const hitungTotalTransaksi = (harga) => {

      const jumlahBeli = document.getElementById("jumlah").value;

      if (harga) {
        totalBayar = parseInt(harga) * parseInt(jumlahBeli);
        document.getElementById("totalBayar").innerHTML = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR'
        }).format(totalBayar);
      } else {
        document.getElementById("totalBayar").innerHTML = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR'
        }).format(totalBayar * parseInt(jumlahBeli));
      }
    }
  </script>
</body>

</html>
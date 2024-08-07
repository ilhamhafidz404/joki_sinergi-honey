<?php
session_start();
require "./../../backend/connection.php";
require "./../../backend/listDataTransaksi.php";
require "./../../backend/approveTransaksi.php";
require "./../../backend/rejectTransaksi.php";
require "./../../backend/listDataMadu.php";
require "./../../backend/addTransaksiForAdmin.php";

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
    Transaksi - Admin
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
      <a class="navbar-brand m-0">
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
          <a class="nav-link" href="./listProduct.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-box-2 text-warning text-sm opacity-10" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Produk</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./listPelanggan.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-warning text-sm opacity-10" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Data Pelanggan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./transaksi.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Transaksi</span>
          </a>
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
          <h6 class="font-weight-bolder text-white mb-0">Data Transaksi</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <?php if (isset($_GET["search"])) : ?>
              <div class="me-2">
                <a href="./transaksi.php" class="btn btn-white mb-0">
                  Reset
                </a>
              </div>
            <?php endif; ?>
            <form action="">
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Search..." name="search">
              </div>
            </form>
          </div>
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
      <div class="row">
        <div class="card">
          <div class="card-header pb-0 px-3 d-flex align-items-center justify-content-between">
            <h6 class="mb-0"> Data Transaksi</h6>
            <div>
              <a href="./../../backend/exportTransaksiApprove.php" class="btn btn-warning btn-sm">
                Cetak Data Transaksi
              </a>
              <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addTransaksiAdmin">Tambah Transaksi</button>
              <!-- <button class="btn btn-warning">Pending</button>
              <button class="btn btn-danger">Reject</button>
              <button class="btn btn-success">Approve</button> -->
            </div>
          </div>
          <div class="card-body pt-4 p-3">
            <div class="row">
              <?php if (mysqli_num_rows($transactions)) : ?>
                <?php foreach ($transactions as $transaction) : ?>
                  <div class="col-6 mb-3">
                    <div class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm"><?= $transaction["name_account"] ?></h6>
                        <span class="mb-2 text-xs">
                          Produk :
                          <span class="text-dark font-weight-bold ms-sm-2">
                            <?= $transaction["name_product"] ?>
                            (Rp <?= $transaction["price_product"] ?>)
                          </span>
                        </span>
                        <span class="mb-2 text-xs">
                          Address:
                          <span class="text-dark ms-sm-2 font-weight-bold">
                            <?= $transaction["address"] ?>
                          </span>
                        </span>
                        <span class="mb-2 text-xs">
                          Payment Method
                          <span class="text-dark ms-sm-2 font-weight-bold">
                            <?= $transaction["payment_method"] ?>
                          </span>
                        </span>
                        <span class="text-xs">
                          Status
                          <?php if ($transaction["status"] == "pending") : ?>
                            <span class="badge bg-warning">
                              Pending
                            </span>
                          <?php endif; ?>
                          <?php if ($transaction["status"] == "approve") : ?>
                            <span class="badge bg-success">
                              Approve
                            </span>
                          <?php endif; ?>
                          <?php if ($transaction["status"] == "reject") : ?>
                            <span class="badge bg-danger">
                              Reject
                            </span>
                          <?php endif; ?>
                        </span>
                      </div>
                      <div class="ms-auto text-end d-flex">
                        <div class="me-2">
                          <a href="./../../assets/images/transactions/<?= $transaction["payment_proof"] ?>" class="btn btn-warning btn-sm px-3" target="_blank">
                            <!-- <i class="fas fa-download"></i> -->
                            Lihat Bukti Pembayaran
                          </a>
                        </div>
                        <?php if ($transaction["status"] == "approve") : ?>
                          <form method="POST">
                            <input type="text" value="<?= $transaction["id_order"] ?>" name="rejectedId" hidden>
                            <button name="reject" class="btn btn-danger btn-sm px-3">
                              Reject
                            </button>
                          </form>
                        <?php endif; ?>
                        <?php if ($transaction["status"] == "reject") : ?>
                          <form method="POST" class="me-2">
                            <input type="text" value="<?= $transaction["id_order"] ?>" name="approvedId" hidden>
                            <button name="approve" class="btn btn-success btn-sm px-3">
                              Approve
                            </button>
                          </form>
                        <?php endif; ?>
                        <?php if ($transaction["status"] == "pending") : ?>
                          <form method="POST" class="me-2">
                            <input type="text" value="<?= $transaction["id_order"] ?>" name="rejectedId" hidden>
                            <button name="reject" class="btn btn-danger btn-sm px-3">
                              Reject
                            </button>
                          </form>
                          <form method="POST" class="me-2">
                            <input type="text" value="<?= $transaction["id_order"] ?>" name="approvedId" hidden>
                            <button name="approve" class="btn btn-success btn-sm px-3">
                              Approve
                            </button>
                          </form>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else : ?>
                <h6 class="text-center">Belum ada data transaksi</h6>
              <?php endif; ?>
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
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Harun</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>



  <!-- Modal -->
  <div class="modal fade" id="addTransaksiAdmin">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Transaksi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <input type="text" name="id" id="id" hidden>
            <div class="form-group">
              <label for="nama">Nama</label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="ni ni-circle-08" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama">
              </div>
            </div>
            <div class="form-group">
              <label for="product">Produk</label>
              <select class="form-select" name="product" id="product">
                <option selected hidden>Pilih Produk</option>
                <?php if (mysqli_num_rows($products)) : ?>
                  <?php foreach ($products as $product) : ?>
                    <option value="<?= $product["id_product"] ?>">
                      <?= $product["nama_produk"] ?>
                      ( Rp <?= $product["harga_produk"] ?>)
                    </option>
                  <?php endforeach; ?>
                <?php else : ?>
                  <option disabled>Tidak ada produk tersedia!</option>
                <?php endif; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="total">Total Beli</label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="fas fa-cart-shopping"></i>
                </span>
                <input type="text" class="form-control" placeholder="Total" name="total" id="total">
              </div>
            </div>
            <div class="form-group">
              <label for="metode">Metode Pembayaran</label>
              <select class="form-select" name="metode" id="metode">
                <option value="Cash" selected>Cash / Tunai</option>
                <option value="DANA">DANA</option>
                <option value="BRI">BRI</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-warning" name="submitAdminTransaksi"> Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>




  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="https://kit.fontawesome.com/4b990370bb.js" crossorigin="anonymous"></script>
  <script>
    const confirmDelete = (id) => {
      swal({
          title: "Are you sure?",
          text: "Are you sure that you want to leave this page?",
          icon: "warning",
          dangerMode: true,
          buttons: {
            confirm: "Yes",
            cancel: true,
          },
        })
        .then(willDelete => {
          if (willDelete) {
            swal("Deleted!", "Your imaginary file has been deleted!", "success");
            setTimeout(() => {
              window.location.href = "./../../backend/admin/deleteProduk.php?id=" + id;
            }, 1500);
          }
        });
    }
  </script>
</body>

</html>
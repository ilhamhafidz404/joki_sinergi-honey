<?php
session_start();
require "./../../backend/connection.php";
require "./../../backend/listDataMadu.php";
require "./../../backend/insertTypes.php";
require "./../../backend/getTypes.php";
require "./../../backend/deleteType.php";
require "./../../backend/editType.php";

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
    List Produk - Admin
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
          <a class="nav-link active" href="./listProduct.php">
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
          <a class="nav-link " href="./transaksi.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Transaksi</span>
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Produk</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">List Data Madu</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <?php if (isset($_GET["search"])) : ?>
              <div class="me-2">
                <a href="./listProduct.php" class="btn btn-white mb-0">
                  Reset
                </a>
              </div>
            <?php endif; ?>
            <form action="">
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Search...." name="search">
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
      <div class="d-flex justify-content-between">
        <a href="./addProduct.php" class="btn btn-white text-warning">Tambah Produk</a>
        <button type="button" class="btn btn-white text-warning" data-bs-toggle="modal" data-bs-target="#modalJenisMadu">
          Manajemen Jenis Madu
        </button>
      </div>
      <div class="row">
        <?php foreach ($products as $product) : ?>
          <div class="col-3 mb-4">
            <div class="card">
              <img src="./../../assets/images/products/<?= $product["foto"] ?>" class="card-img-top" style="height: 250px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title"><?= $product["nama"] ?></h5>
                <p class="card-text">
                  <?= "Rp " . number_format($product["harga"], 0, ',', '.') ?>
                </p>
                <form method="POST">
                  <input type="text" value="<?= $product['id'] ?>" name="productId" hidden>
                  <div class="d-flex">
                    <button type="button" class="btn btn-danger w-100 me-1" onclick="confirmDelete(<?= $product['id'] ?>)">
                      <i class="fas fa-trash me-2"></i>
                      Hapus
                    </button>
                    <a href="./editProduct.php?id=<?= $product['id'] ?>" class="btn btn-warning w-100 ms-1">
                      <i class="fas fa-pen me-2"></i>
                      Edit
                    </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
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

    <div class="modal modal-lg fade" id="modalJenisMadu" tabindex="-1" aria-labelledby="modalJenisMaduLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalJenisMaduLabel">Manajemen Jenis Madu</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="dataJenis-tab" data-bs-toggle="tab" data-bs-target="#dataJenis" type="button" role="tab" aria-controls="dataJenis" aria-selected="true">Data Jenis Madu</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Tambah Jenis Madu</button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="dataJenis">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Jenis</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($types as $index => $type) : ?>
                      <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td>
                          <?= $type["nama"] ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-info btn-sm px-3" onclick="showModalEdit(<?= $type['id'] ?>, '<?= $type['nama'] ?>')" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fas fa-pen"></i>
                          </button>
                          <button class="btn btn-danger btn-sm px-3" onclick=" confirmDeleteType(<?= $type['id'] ?>)">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <br>
                <form method="POST">
                  <div class="row">
                    <div class="mb-3 col-10">
                      <label for="jenis" class="form-label">Nama Jenis Madu</label>
                      <input type="text" class="form-control" id="jenis" name="jenis">
                    </div>
                    <div class="col-2">
                      <label for="jenis" class="form-label d-block text-white">submit</label>
                      <button type="submit" class="btn btn-primary" name="submitTypes">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal modal-lg fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Edit Jenis Madu</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="row">
                <div class="mb-3 col-10">
                  <label for="jenis" class="form-label">Nama Jenis Madu</label>
                  <input type="text" class="form-control" id="jenisEdit" name="jenisEdit">
                  <input type="number" class="form-control" id="idJenisEdit" name="idJenisEdit" hidden>
                </div>
                <div class="col-2">
                  <label for="jenis" class="form-label d-block text-white">submit</label>
                  <button type="submit" class="btn btn-primary" name="editTypeSubmit">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script>
    const confirmDelete = (id) => {
      swal({
          title: "Apakah Kamu Yakin ?",
          text: "Produk akan dihapus dari list product?",
          icon: "warning",
          dangerMode: true,
          buttons: {
            confirm: "Yes",
            cancel: true,
          },
        })
        .then(willDelete => {
          if (willDelete) {
            swal("Berhasil!", "Produk berhasil dihapus!", "success");
            setTimeout(() => {
              window.location.href = "./../../backend/deleteProduk.php?id=" + id;
            }, 1500);
          }
        });
    }

    const confirmDeleteType = (id) => {
      swal({
          title: "Apakah Kamu Yakin ?",
          text: "Jenis ini akan dihapus dari list jenis product?",
          icon: "warning",
          dangerMode: true,
          buttons: {
            confirm: "Yes",
            cancel: true,
          },
        })
        .then(willDelete => {
          if (willDelete) {
            swal("Berhasil!", "Jenis Madu berhasil dihapus!", "success");
            setTimeout(() => {
              window.location.href = "./../../backend/deleteType.php?deleteTypeId=" + id;
            }, 1500);
          }
        });
    }


    const showModalEdit = (id, nama) => {
      const inputId = document.getElementById("idJenisEdit");
      const inputName = document.getElementById("jenisEdit");

      inputId.value = id;
      inputName.value = nama;
    }
  </script>
</body>

</html>
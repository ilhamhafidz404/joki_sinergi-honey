<?php

if (isset($_POST["submitProduct"])) {
  $nama = $_POST["nama"];
  $harga = $_POST["harga"];

  // ambil data file
  $namaFile = $_FILES['foto']['name'];
  $namaSementara = $_FILES['foto']['tmp_name'];

  // tentukan lokasi file akan dipindahkan
  $dirUpload = "./../../assets/images/products/";

  // pindahkan file
  $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);


  mysqli_query(
    $connect,
    "INSERT INTO produk(`nama_produk`, `harga_produk`, `foto_produk`) 
    VALUES ('$nama', $harga, '$namaFile')"
  );

  $products = mysqli_query($connect, "SELECT * FROM produk WHERE nama_produk='$nama' ORDER BY id_product DESC");

  $idProduk = 0;
  foreach ($products as $product) {
    $idProduk = $product["id_product"];
  }

  mysqli_query(
    $connect,
    "INSERT INTO laporan(`id_produk`, `total_jual`) 
    VALUES ($idProduk, 0)"
  );

  echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

      swal({
        title: "Berhasil!",
        text: "Produk Berhasil Ditambahkan",
        icon: "success",
        timer: 1500,
        button: false,
      })
    });

    </script>
  ';
}

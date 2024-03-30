<?php
if (isset($_POST["submitTransaction"])) {
  extract($_POST);

  $account_id = $_SESSION["id"];
  $account_name = $_SESSION["nama"];
  $product_name = "";
  $product_price = 0;

  $product = mysqli_query($connect, "SELECT * FROM produk WHERE id_product=$product");
  foreach ($product as $item) {
    $product_name = $item["nama_produk"];
    $product_price = $item["harga_produk"];
    $product_id = $item["id_product"];
  }

  // ambil data file
  $namaFile = $_FILES['payment_proof']['name'];
  $namaSementara = $_FILES['payment_proof']['tmp_name'];

  // tentukan lokasi file akan dipindahkan
  $dirUpload = "./../../assets/images/transactions/";

  // pindahkan file
  $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);


  $date = date('Y-m-d H:i:s');

  mysqli_query(
    $connect,
    "INSERT INTO `order` (
        `id_account`, 
        `name_account`, 
        `name_product`, 
        `price_product`,
        `village`, 
        `subdistrict`,
        `district`,
        `city`,
        `address`,
        `expedition`,
        `payment_method`,
        `payment_proof`,
        `status`,
        `tanggal`,
        `jumlah`,
        `id_product`
      ) VALUES (
        $account_id,
        '$account_name',
        '$product_name',
        $product_price,
        '$village',
        '$subdistrict',
        '$district',
        '$city',
        '$address',
        '$expedition',
        '$payment_method',
        '$namaFile',
        'pending',
        '$date',
        $jumlah,
        $product_id
      )
      "
  );

  $order = mysqli_query($connect, "SELECT id_order FROM `order` ORDER BY id_order DESC LIMIT 1");

  $orderId;
  $uangBayar = $product_price * $jumlah;
  foreach ($order as $id) {
    $orderId = $id["id_order"];
  }

  mysqli_query(
    $connect,
    "INSERT INTO `bayar` (
        `id_order`, 
        `bukti_bayar`, 
        `uang_bayar` 
      ) VALUES (
        $orderId,
        '$namaFile',
        $uangBayar
      )
      "
  );

  $laporans = mysqli_query($connect, "SELECT total_jual FROM laporan WHERE id_produk=$product_id");

  $totalSekarang = 0;
  foreach ($laporans as $laporan) {
    $totalSekarang += $laporan["total_jual"];
  }

  $totalBaru = $totalSekarang + $jumlah;

  mysqli_query(
    $connect,
    "UPDATE laporan SET total_jual=$totalBaru WHERE id_produk=$product_id"
  );

  // // swal({
  // //   title: "Berhasil!",
  // //   text: "Berhasil Melakukan Transaksi",
  // //   icon: "success",
  // //   timer: 1500,
  // //   button: false,
  // // })

  echo '
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <script type="text/javascript">

      $(document).ready(function(){


        swal({
          title: "Berhasil!",
          text: "Ingin Belanja barang lain?",
          icon: "success",
          buttons: ["Tidak", "Ya"],
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = `http://localhost/sinergiHoney/pages/pelanggan/index.php`;
          } else {
            window.location.href = `http://localhost/sinergiHoney/pages/pelanggan/history.php`;
          }
        });
      });

      </script>
    ';
}

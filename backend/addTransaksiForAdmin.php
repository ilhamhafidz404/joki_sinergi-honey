<?php
if (isset($_POST["submitAdminTransaksi"])) {
  extract($_POST);

  $product = mysqli_query($connect, "SELECT * FROM produk WHERE id_product=$product");
  foreach ($product as $item) {
    $product_name = $item["nama_produk"];
    $product_price = $item["harga_produk"];
    $product_id = $item["id_product"];
  }

  $date = date('Y-m-d H:i:s');

  mysqli_query(
    $connect,
    "INSERT INTO `order` (
        `id_account`, 
        `name_account`, 
        `name_product`, 
        `price_product`,
        `payment_method`,
        `status`,
        `tanggal`,
        `jumlah`,
        `id_product`
      ) VALUES (
        2,
        '$nama',
        '$product_name',
        $product_price,
        '$metode',
        'approve',
        '$date',
        $total,
        $product_id
      )
      "
  );

  $transactions = mysqli_query($connect, "SELECT * FROM `order` ORDER BY id_order DESC");

  echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

      swal({
        title: "Berhasil!",
        text: "Transaksi Berhasil Ditambahkan",
        icon: "success",
        timer: 1500,
        button: false,
      })
    });

    </script>
  ';
}

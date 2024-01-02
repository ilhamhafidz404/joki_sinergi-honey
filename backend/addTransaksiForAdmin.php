<?php
if (isset($_POST["submitAdminTransaksi"])) {
  extract($_POST);

  $product = mysqli_query($connect, "SELECT * FROM products WHERE id=$product");
  foreach ($product as $item) {
    $product_name = $item["nama"];
    $product_price = $item["harga"];
    $product_id = $item["id"];
  }

  $date = date('Y-m-d H:i:s');

  mysqli_query(
    $connect,
    "INSERT INTO transactions (
        `account_name`, 
        `product_name`, 
        `product_price`,
        `payment_method`,
        `status`,
        `tanggal`,
        `jumlah`,
        `product_id`
      ) VALUES (
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

  $transactions = mysqli_query($connect, "SELECT * FROM transactions ORDER BY id DESC");

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

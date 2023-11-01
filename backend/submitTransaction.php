<?php
if (isset($_POST["submitTransaction"])) {
  extract($_POST);

  $account_id = $_SESSION["id"];
  $account_name = $_SESSION["nama"];
  $product_name = "";
  $product_price = 0;

  $cart = mysqli_query($connect, "SELECT * FROM carts WHERE id=$product");
  foreach ($cart as $item) {
    $product_name = $item["product_name"];
    $product_price = $item["product_price"];
  }

  // ambil data file
  $namaFile = $_FILES['payment_proof']['name'];
  $namaSementara = $_FILES['payment_proof']['tmp_name'];

  // tentukan lokasi file akan dipindahkan
  $dirUpload = "./../../assets/images/transactions/";

  // pindahkan file
  $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);


  mysqli_query(
    $connect,
    "INSERT INTO transactions (
      `account_id`, 
      `account_name`, 
      `product_name`, 
      `product_price`,
       `village`, 
       `subdistrict`,
       `district`,
       `city`,
       `address`,
       `expedition`,
       `payment_method`,
       `payment_proof`,
       `status`
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
      'pending'
    )
    "
  );

  echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

      swal({
        title: "Berhasil!",
        text: "Berhasil Melakukan Transaksi",
        icon: "success",
        timer: 1500,
        button: false,
      })
    });

    </script>
  ';
}

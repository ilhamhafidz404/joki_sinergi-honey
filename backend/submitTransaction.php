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


  mysqli_query(
    $connect,
    "INSERT INTO transaction (
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
      '-',
      'pending'
    )
    "
  );
}

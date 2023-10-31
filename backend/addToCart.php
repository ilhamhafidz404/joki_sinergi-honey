<?php

if (isset($_POST["addToCart"])) {
  $accountId = $_SESSION["id"];
  $productName = $_POST["productName"];
  $productPrice = $_POST["productPrice"];
  $productImage = $_POST["productImage"];

  mysqli_query($connect, "INSERT INTO carts (`account_id`, `product_name`, `product_price`, `product_image`) VALUES ($accountId, '$productName', $productPrice, '$productImage')");

  if (mysqli_affected_rows($connect)) {
    echo "
      <script>
        alert('Berhasil menambah ke keranjang')
      </script>
    ";
  }
}

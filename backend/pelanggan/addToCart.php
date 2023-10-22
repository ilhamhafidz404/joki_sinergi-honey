<?php

if (isset($_POST["addToCart"])) {
  $accountId = $_SESSION["id"];
  $productId = $_POST["productId"];

  mysqli_query($connect, "INSERT INTO carts (`account_id`, `product_id`) VALUES ($accountId, $productId)");

  if (mysqli_affected_rows($connect)) {
    echo "
      <script>
        alert('Berhasil menambah ke keranjang')
      </script>
    ";
  }
}

<?php

if (isset($_POST["addToCart"])) {
  $accountId = $_SESSION["id"];
  $productId = $_POST["productId"];
  $productName = $_POST["productName"];
  $productPrice = $_POST["productPrice"];
  $productImage = $_POST["productImage"];

  mysqli_query($connect, "INSERT INTO keranjang (`id_account`, `name_product`, `price_product`, `image_product`, `id_product`) VALUES ($accountId, '$productName', $productPrice, '$productImage', '$productId')");

  if (mysqli_affected_rows($connect)) {
    echo "
      <script>
        alert('Berhasil menambah ke keranjang')
      </script>
    ";
  }
}

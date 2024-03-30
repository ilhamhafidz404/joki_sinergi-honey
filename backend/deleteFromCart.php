<?php
if (isset($_POST["deleteFromCart"])) {
  $id = $_POST["cartDeleteId"];
  mysqli_query($connect, "DELETE FROM keranjang WHERE id_keranjang=$id");

  $accountId = $_SESSION["id"];
  $cartList = mysqli_query($connect, "SELECT * FROM keranjang WHERE id_account=$accountId");
}

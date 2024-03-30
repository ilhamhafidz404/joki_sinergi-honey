<?php
$accountId = $_SESSION["id"];

if (isset($_GET["search"])) {
  $search = $_GET["search"];
  $cartList = mysqli_query($connect, "SELECT * FROM keranjang WHERE id_account=$accountId AND name_product LIKE '%" . $search . "%'");
} else {
  $cartList = mysqli_query($connect, "SELECT * FROM keranjang WHERE id_account=$accountId");
}

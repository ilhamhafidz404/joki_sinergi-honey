<?php
$accountId = $_SESSION["id"];

if (isset($_GET["search"])) {
  $search = $_GET["search"];
  $cartList = mysqli_query($connect, "SELECT * FROM carts WHERE account_id=$accountId AND product_name LIKE '%" . $search . "%'");
} else {
  $cartList = mysqli_query($connect, "SELECT * FROM carts WHERE account_id=$accountId");
}

<?php
if (isset($_GET["search"])) {
  $search = $_GET['search'];
  $products = mysqli_query($connect, "SELECT * FROM produk WHERE nama LIKE '%" . $search . "%'");
} else {
  $products = mysqli_query($connect, "SELECT * FROM produk");
}

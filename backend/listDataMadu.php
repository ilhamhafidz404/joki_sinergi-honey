<?php
if (isset($_GET["search"])) {
  $search = $_GET['search'];
  $products = mysqli_query($connect, "SELECT * FROM products WHERE nama='%'+$search+'%'");
} else {
  $products = mysqli_query($connect, "SELECT * FROM products");
}

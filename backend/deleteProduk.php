<?php
require "./connection.php";
$id = $_GET["id"];

mysqli_query($connect, "DELETE FROM produk WHERE id_product=$id");

header("Location: ./../pages/admin/listProduct.php");

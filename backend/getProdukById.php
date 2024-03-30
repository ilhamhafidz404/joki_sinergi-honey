<?php
$id = intval($_GET["id"]);
$product = mysqli_query($connect, "SELECT * FROM produk WHERE `id_product`=$id");

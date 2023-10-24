<?php
$id = intval($_GET["id"]);
$product = mysqli_query($connect, "SELECT * FROM products WHERE `id`=$id");

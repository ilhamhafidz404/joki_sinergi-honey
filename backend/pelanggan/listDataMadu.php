<?php
include("./../../backend/connection.php");

$products = mysqli_query($connect, "SELECT * FROM products");

<?php
$products = mysqli_query($connect, "SELECT * FROM products ORDER BY id DESC LIMIT 5");

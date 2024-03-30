<?php

$products = mysqli_query($connect, "SELECT * FROM produk ORDER BY id_product DESC LIMIT 4");

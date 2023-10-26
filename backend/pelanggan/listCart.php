<?php
$accountId = $_SESSION["id"];
$cartList = mysqli_query($connect, "SELECT * FROM carts WHERE account_id=$accountId");

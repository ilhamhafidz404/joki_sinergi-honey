<?php
$accountId = $_SESSION["id"];
$transactions = mysqli_query($connect, "SELECT * FROM `order` WHERE id_account=$accountId");

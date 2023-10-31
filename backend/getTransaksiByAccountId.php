<?php
$accountId = $_SESSION["id"];
$transactions = mysqli_query($connect, "SELECT * FROM transactions WHERE account_id=$accountId");

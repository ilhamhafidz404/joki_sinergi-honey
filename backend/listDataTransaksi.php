<?php

if (isset($_GET["search"])) {
  $search = $_GET["search"];
  $transactions = mysqli_query($connect, "SELECT * FROM transactions WHERE account_name LIKE '%" . $search . "%' ");
} else {
  $transactions = mysqli_query($connect, "SELECT * FROM transactions ORDER BY id DESC");
}

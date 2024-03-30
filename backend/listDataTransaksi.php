<?php

if (isset($_GET["search"])) {
  $search = $_GET["search"];
  $transactions = mysqli_query($connect, "SELECT * FROM `order` WHERE name_account LIKE '%" . $search . "%' ");
} else {
  $transactions = mysqli_query($connect, "SELECT * FROM `order` ORDER BY id_order DESC");
}

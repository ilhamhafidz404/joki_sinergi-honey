<?php


if (isset($_GET["search"])) {
  $search = $_GET["search"];
  $pelanggan = mysqli_query($connect, "SELECT * FROM pelanggan WHERE user_type='pelanggan' AND nama LIKE '%" . $search . "%'");
} else {
  $pelanggan = mysqli_query($connect, "SELECT * FROM pelanggan WHERE user_type='pelanggan'");
}

<?php

if (isset($_POST["editProduct"])) {
  extract($_POST);
  mysqli_query($connect, "UPDATE accounts SET nama='$nama', email='$email', password='$password' WHERE id=$id");

  $pelanggan = mysqli_query($connect, "SELECT * FROM accounts WHERE role='pelanggan'");
}

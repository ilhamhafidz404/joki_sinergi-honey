<?php

if (isset($_POST["editProduct"])) {
  extract($_POST);
  mysqli_query($connect, "UPDATE pelanggan SET nama='$nama', email='$email', password='$password' WHERE id_account=$id");

  $pelanggan = mysqli_query($connect, "SELECT * FROM pelanggan WHERE user_type='pelanggan'");
}

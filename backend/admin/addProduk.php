<?php

if (isset($_POST["submitProduct"])) {
  $nama = $_POST["nama"];
  $harga = $_POST["harga"];

  // ambil data file
  $namaFile = $_FILES['foto']['name'];
  $namaSementara = $_FILES['foto']['tmp_name'];

  // tentukan lokasi file akan dipindahkan
  $dirUpload = "./../../assets/images/products/";

  // pindahkan file
  $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

  mysqli_query($connect, "INSERT INTO products(`nama`, `harga`, `foto`) VALUES ('$nama', $harga, '$namaFile')");
}

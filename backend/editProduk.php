<?php

if (isset($_POST["submitProduct"])) {
  $nama = $_POST["nama"];
  $harga = $_POST["harga"];
  $id = $_GET["id"];

  if ($_FILES["foto"]['name']) {
    $namaFile = $_FILES['foto']['name'];
    $namaSementara = $_FILES['foto']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = "./../../assets/images/products/";

    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

    mysqli_query($connect, "UPDATE products SET nama='$nama', harga=$harga, foto='$namaFile' WHERE id=$id");
  } else {
    mysqli_query($connect, "UPDATE products SET nama='$nama', harga=$harga WHERE id=$id");
  }


  echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

      swal({
        title: "Berhasil!",
        text: "Produk Berhasil Diedit",
        icon: "success",
        timer: 1500,
        button: false,
      })
    });

    </script>
  ';
}

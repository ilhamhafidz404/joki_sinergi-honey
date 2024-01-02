<?php

if (isset($_POST["submitProduct"])) {
  $nama = $_POST["nama"];
  $harga = $_POST["harga"];
  $jenis = $_POST["jenis"];

  // ambil data file
  $namaFile = $_FILES['foto']['name'];
  $namaSementara = $_FILES['foto']['tmp_name'];

  // tentukan lokasi file akan dipindahkan
  $dirUpload = "./../../assets/images/products/";

  // pindahkan file
  $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

  $jenisMadu = mysqli_query($connect, "SELECT * FROM types WHERE nama='$jenis'");

  $resJenisMadu = mysqli_fetch_assoc($jenisMadu);
  $idJenisMadu = $resJenisMadu["id"];

  mysqli_query($connect, "INSERT INTO products(`nama`, `harga`, `foto`, `jenis`, `type_id`) VALUES ('$nama', $harga, '$namaFile', '$jenis', $idJenisMadu)");

  echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

      swal({
        title: "Berhasil!",
        text: "Produk Berhasil Ditambahkan",
        icon: "success",
        timer: 1500,
        button: false,
      })
    });

    </script>
  ';
}

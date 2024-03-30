<?php
if (isset($_POST["editTypeSubmit"])) {
  $nama = $_POST["jenisEdit"];
  $id = $_POST["idJenisEdit"];


  mysqli_query($connect, "UPDATE jenis_produk SET nama='$nama' WHERE id_type=$id");

  echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

      swal({
        title: "Berhasil!",
        text: "Jenis Berhasil Diedit",
        icon: "success",
        timer: 1500,
        button: false,
      })
    });

    </script>
  ';

  header("Location: ./../../pages/admin/listProduct.php");
}

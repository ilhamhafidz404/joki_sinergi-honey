<?php
if (isset($_POST["submitTypes"])) {
  $nameType = $_POST["jenis"];
  mysqli_query($connect, "INSERT INTO types (`nama`) VALUES('$nameType')");


  echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

      swal({
        title: "Berhasil!",
        text: "Type Madu Berhasil Ditambahkan",
        icon: "success",
        timer: 1500,
        button: false,
      })
    });

    </script>
  ';
}

<?php

if (isset($_POST["register"])) {
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  mysqli_query($connect, "INSERT INTO accounts (`nama`, `email`, `password`) VALUES ('$nama', '$email', '$password')");

  echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

      swal({
        title: "Berhasil!",
        text: "Silahkan Login",
        icon: "success",
        timer: 1500,
        button: false,
      })
    });

    </script>
  ';
}

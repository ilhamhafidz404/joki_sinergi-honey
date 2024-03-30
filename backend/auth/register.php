<?php

if (isset($_POST["register"])) {
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $hp = $_POST["hp"];
  $lahir = $_POST["lahir"];
  mysqli_query($connect, "INSERT INTO pelanggan (`nama`, `email`, `password`, `hp`, `lahir`, `user_type`) VALUES ('$nama', '$email', '$password', '$hp', '$lahir', 'pelanggan')");

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

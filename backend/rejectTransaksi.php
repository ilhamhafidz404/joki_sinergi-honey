<?php
if (isset($_POST["reject"])) {
  $id = $_POST["rejectedId"];
  mysqli_query($connect, "UPDATE transactions SET status='reject' WHERE id=$id");

  $transactions = mysqli_query($connect, "SELECT * FROM transactions ORDER BY id DESC");

  echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

      swal({
        title: "Berhasil!",
        text: "Berhasil Reject Transaksi",
        icon: "success",
        timer: 1500,
        button: false,
      })
    });

    </script>
  ';
}

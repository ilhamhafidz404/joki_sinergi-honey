<?php
if (isset($_POST["reject"])) {
  $id = $_POST["rejectedId"];
  mysqli_query($connect, "UPDATE `order` SET status='reject' WHERE id_order=$id");

  $transactions = mysqli_query($connect, "SELECT * FROM `order` ORDER BY id_order DESC");

  $validations = mysqli_query($connect, "SELECT * FROM validasi WHERE id_order=$id");
  $bayars = mysqli_query($connect, "SELECT * FROM bayar WHERE id_order=$id ORDER BY id_bayar DESC LIMIT 1");

  $bayarId = 0;
  foreach ($bayars as $idb) {
    $bayarId = $idb["id_bayar"];
  }

  if (mysqli_num_rows($validations)) {
    mysqli_query($connect, "UPDATE validasi SET status='reject' WHERE id_order=$id");
  } else {
    mysqli_query($connect, "INSERT INTO validasi(`id_order`, `id_bayar`, `status`) VALUES ($id, $bayarId, 'reject') ");
  }

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

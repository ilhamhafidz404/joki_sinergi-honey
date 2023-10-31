<?php
if (isset($_POST["approve"])) {
  $id = $_POST["approvedId"];
  mysqli_query($connect, "UPDATE transactions SET status='approve' WHERE id=$id");
}

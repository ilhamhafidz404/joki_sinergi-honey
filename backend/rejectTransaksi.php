<?php
if (isset($_POST["reject"])) {
  $id = $_POST["rejectedId"];
  mysqli_query($connect, "UPDATE transactions SET status='reject' WHERE id=$id");
}

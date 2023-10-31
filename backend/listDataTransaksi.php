<?php
$transactions = mysqli_query($connect, "SELECT * FROM transactions ORDER BY id DESC");

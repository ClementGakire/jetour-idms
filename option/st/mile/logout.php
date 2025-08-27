<?php
include 'conn.php';
setcookie("user", $id, time() - (86400 * 30), "/");
header("location:login.php");
?>
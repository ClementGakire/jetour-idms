<?php
include 'conn.php';
if (!isset($_COOKIE['user'])) {
	header("location:login.php");
}
$id=$_COOKIE['user'];
$del=mysqli_query($conn,"DELETE FROM cart WHERE user_id='$id'");
header("location:shoping-cart.php");
?>
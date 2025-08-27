<?php
include 'conn.php';
if (!isset($_COOKIE['user'])) {
	header("location:login.php");
}
$id=$_GET['id'];
$del=mysqli_query($conn,"DELETE FROM cart WHERE id='$id'");
header("location:shoping-cart.php");
?>
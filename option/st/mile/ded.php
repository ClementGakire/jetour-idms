<?php
include 'conn.php';
if (!isset($_COOKIE['user'])) {
	header("location:login.php");
}
$id=$_GET['id'];
$del=mysqli_query($conn,"DELETE FROM wishlist WHERE id='$id'");
header("location:wishlist.php");
?>
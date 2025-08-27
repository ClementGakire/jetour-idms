<?php
include 'conn.php';
session_start();
if (!isset($_SESSION['user'])) {
	header("location:login1.php");
}
$id=$_GET['id'];
$del=mysqli_query($conn,"DELETE FROM discounts WHERE id='$id'");
header("location:view.php");
?>
<?php
include 'conn.php';
if (!isset($_COOKIE['user'])) {
	header("location:login.php");
}
$user=$_COOKIE['user'];
$idd=$_GET['idd'];
$sel=mysqli_query($conn,"SELECT * FROM likes WHERE user_id='$user' AND product_id='$idd'");
if (mysqli_num_rows($sel)>0) {
$del=mysqli_query($conn,"DELETE FROM likes WHERE user_id='$user' AND product_id='$idd'");
}
else{
$sql=mysqli_query($conn,"INSERT INTO likes(user_id,product_id)VALUES('$user','$idd')");
}
header("location:shop-details.php?id=$idd");
?>
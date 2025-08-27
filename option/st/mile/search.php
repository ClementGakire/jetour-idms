<?php 
include 'conn.php';
if (isset($_POST['search'])) {
	$search=$_POST['sea'];
	$sel=mysqli_query($conn,"SELECT * FROM product WHERE name like %$search%");
	header("location:result.php?search=$search");
}
 ?>
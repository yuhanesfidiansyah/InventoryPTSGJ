<?php
	include "../koneksi.php";
	$id_user= $_GET['id_user'];
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql2 = "UPDATE user SET username = '$username', password = '$password' WHERE id_user = '$id_user'";
	$query = mysqli_query($db_link,$sql2);
	if($query)
	{
	header('location:admin.php');
	}
	else
	{
	echo "Edit admin gagal";
	}
?>
<?php
	include "../koneksi.php";
	
	$id_user = $_GET['id_user'];
	$sql = "DELETE FROM user WHERE id_user = '$id_user'";
	$query = mysqli_query($db_link,$sql);
	if($query)
	{
	header('location:admin.php');
	}
	else
	{
	echo "hapus admin Gagal";
	}
?>
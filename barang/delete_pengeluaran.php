<?php
	include "../koneksi.php";
	
	$id_pengeluaran = $_GET['id_pengeluaran'];
	$sql = "DELETE FROM pengeluaran WHERE id_pengeluaran = '$id_pengeluaran'";
	$query = mysqli_query($db_link,$sql);
	if($query)
	{
	header('location:brg_keluar.php');
	}
	else
	{
	echo "hapus gagal "."<br>";
	}
?>
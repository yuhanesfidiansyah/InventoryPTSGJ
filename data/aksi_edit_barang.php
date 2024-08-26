<?php
	include "../koneksi.php";
	$id_barang= $_GET['id_barang'];
	$barcode=$_POST['barcode'];
    $merk_barang=$_POST['merk_barang'];
    $nama_barang=$_POST['nama_barang'];

	$sql2 = "UPDATE barang SET barcode = '$barcode', merk_barang = '$merk_barang', nama_barang = '$nama_barang' WHERE id_barang = '$id_barang'";
	$query = mysqli_query($db_link,$sql2);
	if($query)
	{
	header('location:barang.php');
	}
	else
	{
	echo "Edit admin gagal";
	}
?>
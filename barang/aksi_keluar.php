<?php
    include "../koneksi.php";

    $id_user=$_POST['id_user'];
	$jumlah=$_POST['jumlah'];
	$id_det_pemasukan=$_POST['id_det_pemasukan'];

	echo "$id_user";
	echo "$jumlah";
	echo  "$id_det_pemasukan";

	
	// $sql1="SELECT * FROM det_pemasukan, pemasukan WHERE pemasukan.id_pemasukan=det_pemasukan.id_pemasukan and det_pemasukan.id_det_pemasukan='$id_det_pemasukan'";
 //    $data= mysqli_query($db_link,$sql1);
	// $cek = mysqli_fetch_array($data);
	
	// $id_det_pemasukan = $cek['id_det_pemasukan'];
	// if ($cek == null) {
	// 	$sql="INSERT INTO pengeluaran(id_det_pemasukan,id_user,tanggal,jumlah) values('$id_det_pemasukan', '$id_user', NOW(), '$jumlah')";
	// 	mysqli_query($db_link,$sql);
	// }elseif ($cek !=null) {
	// 	$a = "SELECT * FROM pemasukan WHERE pemasukan.id_pemasukan='$id_pemasukan' ";
	// 	$a = mysqli_query($db_link,$a);
	// 	$a = mysqli_fetch_array($a);
	// 	$total = $a['total_pemasukan'];
	// 	$total_pemasukan = $total - $jumlah;
	// 	$sql= "UPDATE det_pemasukan, pemasukan SET det_pemasukan.pemasukan='$pemasukan', det_pemasukan.status='1', pemasukan.total_pemasukan = '$total_pemasukan' WHERE id_det_pemasukan='$id_det_pemasukan' and pemasukan.id_pemasukan='$cek[id_pemasukan]'";
	// 	mysqli_query($db_link,$sql);
	// }
 //    $tambah= "INSERT INTO pengeluaran(id_pemasukan,id_user,tanggal,jumlah) values('$id_pemasukan', '$id_user', NOW(), '$jumlah')";
	// mysqli_query($db_link,$tambah);
	// if($sql1){		  
	// 	header('location:brg_keluar.php');
	// }else{
	// //echo "salah";
	// }
	
?>
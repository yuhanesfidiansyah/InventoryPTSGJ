<?php
	include "../koneksi.php";

	$tunggakan = $_POST['tunggakan'];
	$bulan = $_POST['bulan'];
	$t_a = $_POST['t_a'];

	$sql1="SELECT * FROM pemasukan, id_pemasukan WHERE siswa_kelas.id_sk='$t_a' AND siswa_kelas.id_sk=tunggakan.id_sk";
    $data= mysqli_query($db_link,$sql1);
	while($cek = mysqli_fetch_array($data)){
		$id_tunggakan = $cek['id_tunggakan'];
		$a = "SELECT * FROM tunggakan,siswa_kelas WHERE siswa_kelas.id_sk=tunggakan.id_sk AND siswa_kelas.id_sk='$t_a' AND tunggakan.id_tunggakan='$id_tunggakan' ";
		$a = mysqli_query($db_link,$a);
		$a = mysqli_fetch_array($a);
		$total = $a['total_tunggakan'];
		$total_tunggakan = $total + $tunggakan;
		$sql= "UPDATE tunggakan SET total_tunggakan = '$total_tunggakan' WHERE id_tunggakan = '$id_tunggakan'";
		mysqli_query($db_link,$sql);

		$tambah= "INSERT INTO det_tunggakan (id_tunggakan, status, bulan,tunggakan) VALUES ('$id_tunggakan', '0','$bulan', '$tunggakan')";
		mysqli_query($db_link,$tambah);

		$query= "SELECT * FROM tunggakan, det_tunggakan WHERE tunggakan.id_tunggakan = '$id_tunggakan'";
		$que = mysqli_query($db_link,$query);
		$qe = mysqli_fetch_array($que);

		$sql2 = "UPDATE det_tunggakan SET tunggakan ='$tunggakan' WHERE id_det_tunggakan ='$id_det_tunggakan'";
		mysqli_query($db_link,$sql2);
		
	}
	if($sql1){
	header('location:../tunggakan.php');
	}else{
	//echo "SELECT * FROM tunggakan, siswa_kelas WHERE siswa_kelas.t_a='$t_a' AND siswa_kelas.id_sk=tunggakan.id_sk";
	}
	
?>
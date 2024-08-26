<?php
    include "../koneksi.php";

    $id_user=$_POST['id_user'];
    $jumlah=$_POST['jumlah'];
    $barcode=$_POST['barcode'];
    
    $que="SELECT * FROM pemasukan WHERE pemasukan.id_barang='$barcode'";
    $que= mysqli_query($db_link,$que);
    $cek= mysqli_fetch_array($que);
    
    $id_pemasukan = $cek['id_pemasukan'];
    if ($cek == null) {
        $sql="INSERT INTO pengeluaran(id_pemasukan, id_user, tanggal, jumlah) values ('$id_pemasukan', '$id_user', NOW(), '$jumlah')";
        mysqli_query($db_link,$sql);
    }elseif ($cek !=null) {
    $que="SELECT * FROM pemasukan WHERE pemasukan.id_barang='$barcode'";
    $que= mysqli_query($db_link,$que);
    $qq= mysqli_fetch_array($que);
    $total_pemasukan = $qq['total_pemasukan'] - $jumlah;
    $sql1= "UPDATE  pemasukan SET  pemasukan.total_pemasukan='$total_pemasukan' WHERE pemasukan.id_pemasukan='id_pemasukan'";
    mysqli_query($db_link,$sql1);
    if($sql1){		  
        header('location:brg_masuk.php');
    }else{
    //echo "salah";
    }
	
?>
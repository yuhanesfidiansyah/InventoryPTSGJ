<?php
    $host = "localhost";
	$user_name = "root";
	$pass="";
	$database_name = "dailyre1_gudang";
	$db_link = mysqli_connect ($host,$user_name,$pass,$database_name);
	if(!$db_link){
		echo"Tidak Terhubung";
		}		
?>
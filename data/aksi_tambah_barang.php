<?php
include '../koneksi.php';

$barcode = $_POST['barcode'];
$merk_barang = $_POST['merk_barang'];
$nama_barang = $_POST['nama_barang'];
$nama_supplier = $_POST['nama_supplier'];

// Prepare and execute the SQL statement
$sql = "INSERT INTO barang (barcode, merk_barang, nama_barang, nama_supplier) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($db_link, $sql);
mysqli_stmt_bind_param($stmt, 'ssss', $barcode, $merk_barang, $nama_barang, $nama_supplier);
mysqli_stmt_execute($stmt);

// Check for errors and redirect
if (mysqli_stmt_affected_rows($stmt) > 0) {
    header('Location: barang.php');
} else {
    echo "Error: " . mysqli_error($db_link);
}

mysqli_stmt_close($stmt);
mysqli_close($db_link);
?>

<?php
include "../koneksi.php";

// Ambil data dari form
$pemasukan = $_POST['pemasukan'];
$barcode = $_POST['id_barang'];
$tanggal_produksi = $_POST['tanggal_produksi'];

// Menggunakan prepared statements untuk keamanan
// Cek apakah data sudah ada di tabel pemasukan
$sql1 = "SELECT * FROM pemasukan WHERE id_barang = ?";
$stmt1 = mysqli_prepare($db_link, $sql1);
mysqli_stmt_bind_param($stmt1, "s", $barcode);
mysqli_stmt_execute($stmt1);
$result1 = mysqli_stmt_get_result($stmt1);
$cek = mysqli_fetch_array($result1);

if ($cek == null) {
    // Jika data tidak ditemukan, masukkan data baru ke tabel pemasukan
    $sql_insert = "INSERT INTO pemasukan (id_barang, total_pemasukan) VALUES (?, ?)";
    $stmt_insert = mysqli_prepare($db_link, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "ss", $barcode, $pemasukan);
    mysqli_stmt_execute($stmt_insert);

    // Mendapatkan id_pemasukan yang baru saja dimasukkan
    $id_pemasukan = mysqli_insert_id($db_link);
} else {
    // Jika data ditemukan, update total pemasukan
    $id_pemasukan = $cek['id_pemasukan'];
    $total_pemasukan = $cek['total_pemasukan'] + $pemasukan;
    
    $sql_update = "UPDATE pemasukan SET total_pemasukan = ? WHERE id_pemasukan = ?";
    $stmt_update = mysqli_prepare($db_link, $sql_update);
    mysqli_stmt_bind_param($stmt_update, "is", $total_pemasukan, $id_pemasukan);
    mysqli_stmt_execute($stmt_update);
}

// Menambahkan data ke tabel det_pemasukan
$sql_det = "INSERT INTO det_pemasukan (id_pemasukan, status, tanggal, pemasukan, tanggal_produksi) VALUES (?, 'OKE', NOW(), ?, ?)";
$stmt_det = mysqli_prepare($db_link, $sql_det);
mysqli_stmt_bind_param($stmt_det, "iss", $id_pemasukan, $pemasukan, $tanggal_produksi);
mysqli_stmt_execute($stmt_det);

// Menutup semua prepared statements
mysqli_stmt_close($stmt1);
if (isset($stmt_insert)) mysqli_stmt_close($stmt_insert);
if (isset($stmt_update)) mysqli_stmt_close($stmt_update);
mysqli_stmt_close($stmt_det);

// Menutup koneksi database
mysqli_close($db_link);

// Redirect ke halaman brg_masuk.php
header('Location: brg_masuk.php');
exit();
?>

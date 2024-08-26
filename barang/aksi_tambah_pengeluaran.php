<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_POST['id_user'];
    $id_det_pemasukan = $_POST['id_det_pemasukan'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $jumlah = $_POST['jumlah'];
    $bukti_foto = $_FILES['bukti_foto']['name'];
    $tanggal = date('Y-m-d');

    // Dapatkan stok barang saat ini dari tabel pemasukan
    $sql_stok = "SELECT total_pemasukan FROM pemasukan WHERE id_pemasukan = (SELECT id_pemasukan FROM det_pemasukan WHERE id_det_pemasukan = '$id_det_pemasukan')";
    $result_stok = mysqli_query($db_link, $sql_stok);
    $stok_data = mysqli_fetch_assoc($result_stok);
    $stok_tersedia = $stok_data['total_pemasukan'];

    if ($jumlah > $stok_tersedia) {
        echo "<script>alert('Stok tidak mencukupi. Jumlah barang keluar melebihi stok yang tersedia.'); window.location.href = 'brg_keluar.php';</script>";
    } else {
        // Proses upload file
        if ($bukti_foto != "") {
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($bukti_foto);
            move_uploaded_file($_FILES['bukti_foto']['tmp_name'], $target_file);
        }

        // Kurangi stok dengan jumlah barang keluar
        $stok_baru = $stok_tersedia - $jumlah;
        $sql_update_stok = "UPDATE pemasukan SET total_pemasukan = '$stok_baru' WHERE id_pemasukan = (SELECT id_pemasukan FROM det_pemasukan WHERE id_det_pemasukan = '$id_det_pemasukan')";
        mysqli_query($db_link, $sql_update_stok);

        // Insert data pengeluaran
        $sql = "INSERT INTO pengeluaran (id_user, id_det_pemasukan, penanggung_jawab, jumlah, bukti_foto, tanggal) VALUES ('$id_user', '$id_det_pemasukan', '$penanggung_jawab', '$jumlah', '$bukti_foto', '$tanggal')";

        if (mysqli_query($db_link, $sql)) {
            echo "<script>alert('Data pengeluaran berhasil ditambahkan.'); window.location.href = 'brg_keluar.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db_link);
        }
    }
}
?>

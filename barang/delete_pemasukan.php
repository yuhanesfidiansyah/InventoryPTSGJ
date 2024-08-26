<?php
include "../koneksi.php";

if (isset($_GET['id_pemasukan'])) {
    $id_pemasukan = $_GET['id_pemasukan'];

    // Use prepared statements to prevent SQL injection
    $sql = "DELETE FROM pemasukan WHERE id_pemasukan = ?";
    $stmt = mysqli_prepare($db_link, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_pemasukan);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header('Location: brg_masuk.php');
            exit;
        } else {
            echo "Error deleting record: " . mysqli_error($db_link);
        }
    } else {
        echo "Failed to prepare delete statement: " . mysqli_error($db_link);
    }

    mysqli_close($db_link);
} else {
    echo "ID pemasukan not provided.";
}
?>

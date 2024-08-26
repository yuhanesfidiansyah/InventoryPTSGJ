<?php
include '../koneksi.php';

// Ensure POST variables are set
if (isset($_POST['id_det_pemasukan']) && isset($_POST['pemasukan']) && isset($_POST['id_pemasukan'])) {
    $id_det_pemasukan = $_POST['id_det_pemasukan'];
    $pemasukan = $_POST['pemasukan'];
    $id_pemasukan = $_POST['id_pemasukan'];

    // Retrieve current total_pemasukan
    $que = "SELECT total_pemasukan FROM pemasukan WHERE id_pemasukan = ?";
    $stmt_que = mysqli_prepare($db_link, $que);

    if ($stmt_que) {
        mysqli_stmt_bind_param($stmt_que, "i", $id_pemasukan);
        mysqli_stmt_execute($stmt_que);
        mysqli_stmt_bind_result($stmt_que, $total_pemasukan);
        mysqli_stmt_fetch($stmt_que);
        mysqli_stmt_close($stmt_que);

        if ($total_pemasukan !== null) {
            $new_total_pemasukan = $total_pemasukan - $pemasukan;

            // Update total_pemasukan
            $sql1 = "UPDATE pemasukan SET total_pemasukan = ? WHERE id_pemasukan = ?";
            $stmt1 = mysqli_prepare($db_link, $sql1);

            if ($stmt1) {
                mysqli_stmt_bind_param($stmt1, "ii", $new_total_pemasukan, $id_pemasukan);

                if (mysqli_stmt_execute($stmt1)) {
                    mysqli_stmt_close($stmt1);

                    // Delete from det_pemasukan
                    $sql = "DELETE FROM det_pemasukan WHERE id_det_pemasukan = ?";
                    $stmt = mysqli_prepare($db_link, $sql);

                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "i", $id_det_pemasukan);

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
                } else {
                    echo "Error updating total_pemasukan: " . mysqli_error($db_link);
                }
            } else {
                echo "Failed to prepare update statement: " . mysqli_error($db_link);
            }
        } else {
            echo "Data pemasukan tidak ditemukan.";
        }
    } else {
        echo "Failed to prepare select statement: " . mysqli_error($db_link);
    }

    mysqli_close($db_link);
} else {
    echo "Data tidak lengkap.";
}
?>

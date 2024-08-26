<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Keluar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <style>
        .container {
            margin-top: 20px;
        }
        .table thead th {
            background-color: #5F9EA0;
            color: white;
        }
        .pagination {
            justify-content: center;
        }
        .footer-signature {
            margin-top: 40px;
            text-align: right;
        }
        .print-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Report Header -->
        <div class="text-center mb-4">
            <h2>Laporan Barang Keluar</h2>
            <h3>PT KANTORKU INVENTORY</h3>
            <h4>Jl. Brigjen Darsono By Pas, Sunyaragi Kota Cirebon Jawa Barat 45132
                <br>(0231) 863721
            </h4>
        </div>

        <!-- Report Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal & Waktu</th>
                        <th>Operator Gudang</th>
                        <th>Barcode</th>
                        <th>Merk Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Pengeluaran</th>
                        <th>Penanggung Jawab</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Paging variables
                    $baris = 10;
                    $hal = isset($_GET['hal']) ? intval($_GET['hal']) : 0;
                    
                    // Pagination query
                    $pageSql = "SELECT user.username, barang.*, pemasukan.*, pengeluaran.*, det_pemasukan.*
                                FROM pemasukan
                                INNER JOIN barang ON barang.id_barang = pemasukan.id_barang
                                INNER JOIN det_pemasukan ON pemasukan.id_pemasukan = det_pemasukan.id_pemasukan
                                INNER JOIN pengeluaran ON det_pemasukan.id_det_pemasukan = pengeluaran.id_det_pemasukan
                                INNER JOIN user ON pengeluaran.id_user = user.id_user
                                ORDER BY pengeluaran.tanggal";
                                
                    $pageQry = mysqli_query($db_link, $pageSql);
                    if (!$pageQry) {
                        die("Error paging: " . mysqli_error($db_link));
                    }
                    
                    $jumlah = mysqli_num_rows($pageQry);
                    $maksData = ceil($jumlah / $baris);

                    // Fetch data with pagination
                    $mySql = "SELECT user.username, barang.*, pemasukan.*, pengeluaran.*, det_pemasukan.*
                              FROM pemasukan
                              INNER JOIN barang ON barang.id_barang = pemasukan.id_barang
                              INNER JOIN det_pemasukan ON pemasukan.id_pemasukan = det_pemasukan.id_pemasukan
                              INNER JOIN pengeluaran ON det_pemasukan.id_det_pemasukan = pengeluaran.id_det_pemasukan
                              INNER JOIN user ON pengeluaran.id_user = user.id_user
                              ORDER BY pengeluaran.tanggal ASC
                              LIMIT $hal, $baris";
                    
                    $myQry = mysqli_query($db_link, $mySql);
                    if (!$myQry) {
                        die("Query error: " . mysqli_error($db_link));
                    }
                    
                    $nomor = $hal + 1;
                    while ($myData = mysqli_fetch_array($myQry)) {
                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $myData['tanggal']; ?></td>
                            <td><?php echo $myData['username']; ?></td>
                            <td><?php echo $myData['barcode']; ?></td>
                            <td><?php echo $myData['merk_barang']; ?></td>
                            <td><?php echo $myData['nama_barang']; ?></td>
                            <td><?php echo $myData['jumlah']; ?></td>
                            <td><?php echo $myData['penanggung_jawab']; ?></td>
                        </tr>
                        <?php
                        $nomor++;
                    }
                    ?>
                    <tr>
                        <td colspan="8">
                            <b>Jumlah Data :</b> <?php echo $jumlah; ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php
                    for ($h = 1; $h <= $maksData; $h++) {
                        $list[$h] = $baris * ($h - 1);
                        $active = ($hal == $list[$h]) ? ' active' : '';
                        echo "<li class='page-item$active'><a class='page-link' href='?hal=$list[$h]'>$h</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>

        <!-- Footer Signature -->
        <div class="footer-signature">
            <label>Mengetahui<br>Kepala Gudang</label>
            <br><br><br><br><br>
            <strong>Anonymous</strong>
        </div>

        <!-- Print Button -->
       
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

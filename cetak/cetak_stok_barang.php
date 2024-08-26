<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../karre.css">
    <title>Laporan Stok Barang</title>
</head>
<body>

<div class="container my-5">
    <div class="text-center">
        <h2>Laporan Stok Barang</h2>
        <h3>PT KANTORKU INVENTORY</h3>
        <h4>Jl. Brigjen Darsono By Pas, Sunyaragi Kota Cirebon Jawa Barat 45132<br>(0231) 863721</h4>
    </div>
    
    <?php
        // Pagination setup
        $baris = 5;
        $hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
        $pageSql = "SELECT barang.barcode, barang.merk_barang, barang.nama_barang, pemasukan.* FROM pemasukan 
                    INNER JOIN barang ON pemasukan.id_barang = barang.id_barang ORDER BY pemasukan.tanggal";
        $pageQry = mysqli_query($db_link, $pageSql) or die ("Error paging: ".mysqli_error());
        $jumlah = mysqli_num_rows($pageQry);
        $maksData = ceil($jumlah / $baris);
    ?>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode Barang</th>
                    <th>Merk Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $mySql = "SELECT barang.barcode, barang.merk_barang, barang.nama_barang, pemasukan.* FROM pemasukan 
                              INNER JOIN barang ON pemasukan.id_barang = barang.id_barang LIMIT $hal, $baris";
                    $myQry = mysqli_query($db_link, $mySql) or die ("Query error: ".mysqli_error());

                    $nomor = $hal;
                    while ($myData = mysqli_fetch_array($myQry)) {
                        $nomor++;
                ?>
                <tr>
                    <td class="text-center"><?php echo $nomor; ?></td>
                    <td><?php echo $myData['tanggal']; ?></td>
                    <td><?php echo $myData['barcode']; ?></td>
                    <td><?php echo $myData['merk_barang']; ?></td>
                    <td><?php echo $myData['nama_barang']; ?></td>
                    <td><?php echo $myData['total_pemasukan']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Jumlah Data:</strong> <?php echo $jumlah; ?></p>
        </div>
        <div class="col-md-6 text-right">
            <p><strong>Halaman ke:</strong>
                <?php
                for ($h = 1; $h <= $maksData; $h++) {
                    $list[$h] = $baris * $h - $baris;
                    echo "<a href='?open=Cetak-cetak_stok_barang&hal=$list[$h]'>$h</a> ";
                }
                ?>
            </p>
        </div>
    </div>

    <div class="text-right my-4">
        <p>
            <label>Mengetahui<br>Kepala Gudang</label><br><br><br><br><br>
            <strong>Anonymous</strong>
        </p>
    </div>

    <div class="text-center">
        <button class="btn btn-primary" onclick="location.href='cetakstokbarang/cetakall.php'">Print Out</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

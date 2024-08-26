<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantorku Inventory</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="../karre.css" rel="stylesheet" />
    <style>
        body {
            background-image: url('../selecta1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
            background-color: #333;
            border: none;
        }
        .navbar-brand, .navbar-nav > li > a {
            color: #fff !important;
        }
        .navbar-nav > li > a:hover, .navbar-nav > li.active > a {
            color: #d4a3a3 !important;
            background-color: transparent !important;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin-top: 20px;
        }
        .btn-primary, .btn-danger {
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
        }
        .btn-primary {
            background-color: #33cd77;
            border: none;
        }
        .btn-primary:hover {
            background-color: #28a45e;
        }
        .btn-danger {
            background-color: #d9534f;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c9302c;
        }
        .table {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Kantorku Inventory</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav">
                <li><a href="../beranda.php">Beranda</a></li>
                <li><a href="../admin/admin.php">Admin</a></li>
                <li><a href="../data/barang.php">Barang</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Barang <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="brg_masuk.php">Barang Masuk</a></li>
                        <li><a href="brg_keluar.php">Barang Keluar</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../cetak/cetak_stok_barang.php" target="tengah">Stok Barang</a></li>
                        <li><a href="../cetak/pemasukan.php" target="tengah">Pemasukan</a></li>
                        <li><a href="../cetak/pengeluaran.php" target="tengah">Pengeluaran</a></li>
                    </ul>
                </li>
                <li><a href="../index.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="text-center">Detail Pemasukan Barang</h2>
    <form method="post" action="brg_masuk.php">
        <center><button type="submit" class="btn btn-primary">KEMBALI</button></center>
    </form>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Barcode</th>
                <th>Merk Barang</th>
                <th>Nama Barang</th>
                <th>Tanggal Produksi</th>
                <th>Pemasukan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $id_pemasukan = $_GET['id_pemasukan'];
        $sql = "SELECT barang.barcode, barang.merk_barang, barang.nama_barang, det_pemasukan.*, pemasukan.* 
                FROM ((barang 
                INNER JOIN pemasukan ON pemasukan.id_barang = barang.id_barang) 
                INNER JOIN det_pemasukan ON pemasukan.id_pemasukan = det_pemasukan.id_pemasukan) 
                WHERE det_pemasukan.id_pemasukan = '$id_pemasukan'";
        $query = mysqli_query($db_link, $sql);
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['tanggal']; ?></td>
                <td><?php echo $data['barcode']; ?></td>
                <td><?php echo $data['merk_barang']; ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td><?php echo $data['tanggal_produksi']; ?></td>
                <td><?php echo $data['pemasukan']; ?></td>
                <td><?php echo $data['status']; ?></td>
                <td>
                    <a href="aksi_hps_pemasukan.php?id_det_pemasukan=<?php echo $data['id_det_pemasukan']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus item ini?');">HPS</a>
                    <a href="cetak_pemasukan.php?id_det_pemasukan=<?php echo $data['id_det_pemasukan']; ?>" class="btn btn-info btn-xs" target="_blank">Cetak</a>
                </td>

            </tr>
        <?php
            $no++;
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>

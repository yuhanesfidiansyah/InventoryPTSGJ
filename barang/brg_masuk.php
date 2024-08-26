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
        .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .btn-primary {
            background-color: #33cd77;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #28a45e;
        }
        .table {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .dropdown-menu > li > a {
            color: #333 !important;
        }
        .dropdown-menu > li > a:hover {
            background-color: #f2f2f2 !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Data barang yang memuat kode dan nama supplier
            var barangData = {
                <?php
                // Mengambil data barang beserta nama supplier dari database
                $sql = "SELECT * FROM barang";
                $query = mysqli_query($db_link, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "'" . $data['id_barang'] . "': '" . $data['nama_supplier'] . "',";
                }
                ?>
            };

            // Event listener ketika kode barang dipilih
            $('#id_barang').on('change', function() {
                var selectedId = $(this).val();
                $('#nama_supplier').val(barangData[selectedId]);
            });
        });
    </script>
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
                <li><a href="../admin/admin.php">Staff Gudang</a></li>
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
    <h2 class="text-center">Input Data Barang (Pemasukan)</h2>
    <form method="post" action="aksi_tambah_pemasukan.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id_barang"><strong>Kode Barang</strong></label>
            <select class="form-control" id="id_barang" name="id_barang" required>
                <option disabled selected value="">--pilih--</option>
                <?php
                // Ambil kembali data barang untuk menampilkan dropdown
                $sql = "SELECT * FROM barang";
                $query = mysqli_query($db_link, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo '<option value="' . $data['id_barang'] . '">' . $data['barcode'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama_supplier"><strong>Nama Supplier</strong></label>
            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" readonly>
        </div>
        <div class="form-group">
            <label for="tanggal_produksi"><strong>Tanggal Produksi</strong></label>
            <input type="date" class="form-control" id="tanggal_produksi" name="tanggal_produksi" required>
        </div>
        <div class="form-group">
            <label for="pemasukan"><strong>Jumlah Barang Masuk</strong></label>
            <input type="text" class="form-control" id="pemasukan" name="pemasukan" placeholder="Nominal" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

    <h2 class="text-center" style="margin-top: 40px;">Data Barang Masuk</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Merk Barang</th>
                <th>Nama Barang</th>
                <th>Detail Barang Masuk</th>
                <th>Stok Barang</th>
                <th>Nama Supplier</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $sql = "SELECT barang.barcode, barang.merk_barang, barang.nama_barang,barang.nama_supplier, pemasukan.* FROM pemasukan INNER JOIN barang ON pemasukan.id_barang = barang.id_barang ORDER BY pemasukan.tanggal";
        $query = mysqli_query($db_link, $sql);
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['barcode']; ?></td>
                <td><?php echo $data['merk_barang']; ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td>
                    <a href="det_pemasukan.php?id_pemasukan=<?php echo $data['id_pemasukan']; ?>" class="btn btn-warning btn-xs">DETAIL</a>
                </td>
                <td><?php echo $data['total_pemasukan']; ?></td>
                <td><?php echo $data['nama_supplier']; ?></td>
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

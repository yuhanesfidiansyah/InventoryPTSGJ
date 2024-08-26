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
        .form-group {
            margin-bottom: 1rem;
        }
        /* Add this CSS for low stock warning */
        .low-stock {
            background-color: #FAEBD7 !important;
            color: #721c24; /* Dark red text color */
        }
          /* CSS for almost low stock warning */
        .almost-low-stock {
            background-color: #fff3cd !important; /* Yellow background */
            color: #856404; /* Dark yellow text color *
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
    <h2 class="text-center">Input Data Pengeluaran</h2>
    <form method="post" action="aksi_tambah_pengeluaran.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id_user"><strong>User</strong></label>
            <select class="form-control" id="id_user" name="id_user" required>
                <option disabled selected value="">--pilih--</option>
                <?php
                $sql = "SELECT * FROM user";
                $query = mysqli_query($db_link, $sql);
                if (!$query) {
                    die("Query failed: " . mysqli_error($db_link));
                }
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <option value="<?php echo $data['id_user']; ?>"><?php echo $data['username']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_det_pemasukan"><strong>Barang</strong></label>
            <select class="form-control" id="id_det_pemasukan" name="id_det_pemasukan" required>
                <option disabled selected value="">--pilih--</option>
                <?php
                $sql = "
                SELECT barang.*, pemasukan.*, det_pemasukan.* 
                FROM ((pemasukan 
                INNER JOIN barang ON barang.id_barang = pemasukan.id_barang) 
                INNER JOIN det_pemasukan ON pemasukan.id_pemasukan = det_pemasukan.id_pemasukan) 
                ORDER BY det_pemasukan.tanggal_produksi";
                $query = mysqli_query($db_link, $sql);
                if (!$query) {
                    die("Query failed: " . mysqli_error($db_link));
                }
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <option value="<?php echo $data['id_det_pemasukan']; ?>">
                    <?php echo $data['barcode'] . ' --- ' . $data['nama_barang'] . ' --- ' . $data['tanggal_produksi']; ?>
                </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="penanggung_jawab"><strong>Penanggung Jawab Penerima Barang</strong></label>
            <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" placeholder="Nama Penanggung Jawab" required />
        </div>
        <div class="form-group">
            <label for="jumlah"><strong>Jumlah Barang Keluar</strong></label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Nominal" required />
        </div>
        <div class="form-group">
            <label for="bukti_foto"><strong>Bukti Foto</strong></label>
            <input type="file" class="form-control" id="bukti_foto" name="bukti_foto" accept="image/*" capture="camera" required />
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

    <h2 class="text-center" style="margin-top: 40px;">Data Barang Keluar</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Operator Gudang</th>
                <th>Barcode</th>
                <th>Merk Barang</th>
                <th>Nama Barang</th>
                <th>Tanggal Produksi</th>
                <th>Jumlah</th>
                <th>Penanggung Jawab</th>
                <th>Bukti Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = "
            SELECT user.username, barang.*, pemasukan.*, pengeluaran.*, det_pemasukan.*, 
                   pengeluaran.penanggung_jawab, pengeluaran.bukti_foto 
            FROM ((((pemasukan 
            INNER JOIN barang ON barang.id_barang = pemasukan.id_barang) 
            INNER JOIN det_pemasukan ON pemasukan.id_pemasukan = det_pemasukan.id_pemasukan) 
            INNER JOIN pengeluaran ON det_pemasukan.id_det_pemasukan = pengeluaran.id_det_pemasukan) 
            INNER JOIN user ON pengeluaran.id_user = user.id_user) 
            ORDER BY pengeluaran.tanggal";
            $query = mysqli_query($db_link, $sql);
            if (!$query) {
                die("Query failed: " . mysqli_error($db_link));
            }
            while ($data = mysqli_fetch_array($query)) {
                // Determine if stock is low
                
            ?>
            <tr class="<?php echo $row_class; ?>">
                <td><?php echo $no; ?></td>
                <td><?php echo $data['tanggal']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['barcode']; ?></td>
                <td><?php echo $data['merk_barang']; ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td><?php echo $data['tanggal_produksi']; ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td><?php echo $data['penanggung_jawab']; ?></td>
                <td>
                    <?php if ($data['bukti_foto']) { ?>
                        <a href="../uploads/<?php echo $data['bukti_foto']; ?>" target="_blank">Lihat Foto</a>
                    <?php } ?>
                </td>
                <td>
                    <a href="delete_pengeluaran.php?id_pengeluaran=<?php echo $data['id_pengeluaran']; ?>" onclick="return confirm('Anda yakin?')">
                        <button type="button" class="btn btn-danger btn-xs">Hapus</button>
                    </a>
                </td>
            </tr>
            <?php
            $no++;
            }
            ?>
        </tbody>
    </table>

    <h2 class="text-center" style="margin-top: 40px;">Stok Tersisa Barang</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Merk Barang</th>
                <th>Nama Barang</th>
                <th>Detail Barang Masuk</th>
                <th>Stok Barang</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $sql = "SELECT barang.barcode, barang.merk_barang, barang.nama_barang, pemasukan.* FROM pemasukan INNER JOIN barang ON pemasukan.id_barang = barang.id_barang ORDER BY pemasukan.tanggal";
        $query = mysqli_query($db_link, $sql);
        while ($data = mysqli_fetch_array($query)) {
            // Determine if stock is low
            if ($data['total_pemasukan'] < 6) {
                    $row_class = 'almost-low-stock';
                } elseif ($data['total_pemasukan'] < 10) {
                    $row_class = 'low-stock';
                } else {
                    $row_class = '';
                }
        ?>
            <tr class="<?php echo $row_class; ?>">
                <td><?php echo $no; ?></td>
                <td><?php echo $data['barcode']; ?></td>
                <td><?php echo $data['merk_barang']; ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td>
                    <a href="det_pemasukan.php?id_pemasukan=<?php echo $data['id_pemasukan']; ?>" class="btn btn-warning btn-xs">DETAIL</a>
                </td>
                <td><?php echo $data['total_pemasukan']; ?></td>
            </tr>
        <?php
            $no++;
        }
        ?>
        </tbody>
    </table>
     <h4 class="text-center" style="margin-top: 20px;">* Baris yang berwarna kuning menandakan stok barang yang hampir habis</h4>
      <h4 class="text-center" style="margin-top: 20px;">* Baris yang berwarna merah menandakan stok barang yang hampir habis, harus segera dipesan</h4
</div>

</body>
</html>

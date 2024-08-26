<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - Kantorku Inventory</title>
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
        }
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }
        .navbar-brand, .navbar-nav > li > a {
            color: #fff !important;
        }
        .navbar-nav > li > a:hover {
            color: #d4a3a3 !important;
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
                <li><a href="../admin/admin.php">Operator Gudang</a></li>
                <li><a href="barang.php">Barang</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Barang <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../barang/brg_masuk.php">Barang Masuk</a></li>
                        <li><a href="../barang/brg_keluar.php">Barang Keluar</a></li>
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
    <?php
    $id_barang = $_GET['id_barang'];
    $sql = "SELECT * FROM barang WHERE id_barang = ?";
    $stmt = $db_link->prepare($sql);
    $stmt->bind_param("i", $id_barang);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    ?>
    <h2 class="text-center">Edit Barang</h2>
    <form action="aksi_edit_barang.php?id_barang=<?php echo urlencode($id_barang); ?>" method="POST">
        <div class="form-group">
            <label for="barcode"><strong>Barcode</strong></label>
            <input type="text" class="form-control" id="barcode" name="barcode" value="<?php echo htmlspecialchars($data['barcode']); ?>" required>
        </div>
        <div class="form-group">
            <label for="merk_barang"><strong>Merk Barang</strong></label>
            <input type="text" class="form-control" id="merk_barang" name="merk_barang" value="<?php echo htmlspecialchars($data['merk_barang']); ?>" required>
        </div>
        <div class="form-group">
            <label for="nama_barang"><strong>Nama Barang</strong></label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo htmlspecialchars($data['nama_barang']); ?>" required>
        </div>
        <div class="form-group">
            <label for="nama_supplier"><strong>Nama Supplier</strong></label>
            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?php echo htmlspecialchars($data['nama_supplier']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

</body>
</html>

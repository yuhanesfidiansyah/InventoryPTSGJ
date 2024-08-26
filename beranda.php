<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantorku Inventory</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('selecta1.jpg');
            background-size: cover; /* Membuat gambar latar belakang menutupi seluruh area */
            background-position: center; /* Menjaga gambar tetap berada di tengah */
            background-attachment: fixed; /* Membuat gambar latar belakang tetap saat menggulir */
            background-repeat: no-repeat; /* Menghindari pengulangan gambar latar belakang */
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff !important;
        }
        .navbar-nav .nav-link:hover {
            color: #f8d7da !important;
        }
        .welcome-message {
            margin-top: 30px;
            text-align: center;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 5px;
            font-size: 1.5em;
            font-weight: bold;
        }
        .welcome-message marquee {
            color: #f8d7da;
        }
        .copyright {
            position: fixed;
            bottom: 10px;
            right: 10px;
            color: #fff;
            font-size: 14px;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Kantorku Inventory</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="beranda.php">Beranda</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownWarehouse" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Staff Gudang
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownWarehouse">
                    <a class="dropdown-item" href="admin/admin.php">Akun Staff Gudang</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBarang" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Barang
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownBarang">
                    <a class="dropdown-item" href="data/barang.php">Barang</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownData" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Data Barang
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownData">
                    <a class="dropdown-item" href="barang/brg_masuk.php">Barang Masuk</a>
                    <a class="dropdown-item" href="barang/brg_keluar.php">Barang Keluar</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownReport" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Laporan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownReport">
                    <a class="dropdown-item" href="cetak/pemasukan.php" target="tengah">Cetak Pemasukan</a>
                    <a class="dropdown-item" href="cetak/pengeluaran.php" target="tengah">Cetak Pengeluaran</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownRequest" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Permintaan Barang
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownRequest">
                    <a class="dropdown-item" href="permintaan/request_stock.php" target="tengah">Permintaan Barang</a>
                    <a class="dropdown-item" href="permintaan/tambah_supplier.php" target="tengah">Tambah Data Supplier</a>
                    <a class="dropdown-item" href="permintaan/view_requests.php" target="tengah">View Permintaan Barang</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">LogOut</a>
            </li>
        </ul>
    </div>
</nav>

<div class="welcome-message">
    <marquee>Selamat Datang Di Inventoryku</marquee>
</div>

<div class="copyright">
    &copy; Yuhanes Firdiansyah - 200511145
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

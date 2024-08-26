<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kantorku Inventory</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="karre.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #ffffff;
        }
        .bg {
            /* Background image */
            background-image: url('selecta.jpg');
            /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /* Adding a dark overlay for better readability */
            position: relative;
            background-attachment: fixed;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.6); /* Dark overlay with transparency */
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }
        .content {
            position: relative;
            z-index: 2;
        }
        .nav {
            background-color: rgba(0, 123, 255, 0.8);
            padding: 10px;
        }
        .nav .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .nav .menu ul li {
            display: inline;
            margin-right: 20px;
        }
        .nav .menu ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .nav .menu ul li ul {
            display: none;
            position: absolute;
            background-color: rgba(0, 123, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
            margin-top: 5px;
        }
        .nav .menu ul li:hover ul {
            display: block;
        }
        .nav .menu ul li ul li {
            display: block;
            margin: 0;
        }
        .nav .menu ul li ul li a {
            display: block;
            padding: 5px;
        }
        h1 {
            color: #ffffff;
            text-align: center;
            margin-top: 20px;
            font-size: 2.5em;
            font-weight: bold;
        }
        .container {
            margin-top: 50px;
        }
        .marquee {
            font-size: 1.5em;
            font-weight: bold;
            color: #ffffff;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="bg">
        <div class="overlay"></div>
        <div class="content">
            <div class="nav">
                <div class="container">
                    <div class="menu">
                        <ul>
                            <li><a href="index.php"><i class="fas fa-home"></i> Beranda</a></li>
                            <li><a href="#"><i class="fas fa-boxes"></i> Data Barang</a>
                                <ul>
                                    <li><a href="stok_barang.php">Stok Barang</a></li>
                                    <li><a href="brg_masuk1.php">Barang Masuk</a></li>
                                    <li><a href="brg_keluar1.php">Barang Keluar</a></li>
                                </ul>
                            </li>
                            <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> LogIn</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container text-center">
                <h1>Selamat Datang Di Inventoryku</h1>
                <p class="marquee">This is an inventory management system that helps you keep track of your stock effectively.</p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

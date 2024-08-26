<?php
require 'koneksi.php'; // Pastikan file koneksi database Anda sudah benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $supplier_name = $_POST['supplier_name'];
    $supplier_phone = $_POST['supplier_phone'];

    // Insert supplier ke dalam database
    $stmt = $pdo->prepare('INSERT INTO suppliers (name, phone) VALUES (:name, :phone)');
    $stmt->execute([
        'name' => $supplier_name,
        'phone' => $supplier_phone,
    ]);

    echo "<div class='alert alert-success' role='alert'>Supplier berhasil ditambahkan!</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Tambah Supplier</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h2 class="form-header">Tambah Supplier Baru</h2>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="supplier_name">Nama Supplier:</label>
                            <input type="text" class="form-control" id="supplier_name" name="supplier_name" required>
                        </div>
                        <div class="form-group">
                            <label for="supplier_phone">Nomor Telepon:</label>
                            <input type="text" class="form-control" id="supplier_phone" name="supplier_phone" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Tambah Supplier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

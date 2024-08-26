<?php
require 'koneksi.php';

try {
    $stmt = $pdo->prepare('SELECT * FROM stock_requests ORDER BY request_date DESC');
    $stmt->execute();
    $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Data Permintaan Barang</title>
    <link href="karre.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h2>Data Permintaan Barang</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Supplier</th>
                    <th>Tanggal Permintaan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($requests)): ?>
                    <?php foreach ($requests as $request): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($request['id']); ?></td>
                            <td><?php echo htmlspecialchars($request['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($request['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($request['supplier']); ?></td>
                            <td><?php echo htmlspecialchars($request['request_date']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Tidak ada data permintaan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

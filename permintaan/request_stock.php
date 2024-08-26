<?php
require 'koneksi.php';
require_once('tcpdf/tcpdf.php');

date_default_timezone_set('Asia/Jakarta');

// Mendapatkan daftar supplier dari database
$suppliers = [];
$stmt = $pdo->query('SELECT id, name FROM suppliers');
while ($row = $stmt->fetch()) {
    $suppliers[] = $row;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $selected_suppliers = $_POST['supplier'];

    // Insert stock request into the database
    $stmt = $pdo->prepare('INSERT INTO stock_requests (product_name, quantity, supplier) VALUES (:product_name, :quantity, :supplier)');
    $stmt->execute([
        'product_name' => $product_name,
        'quantity' => $quantity,
        'supplier' => implode(', ', $selected_suppliers),
    ]);

    // Generate PDF
    class MYPDF extends TCPDF {
        public function Header() {
            $this->Image('logo.png', 10, 10, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $this->SetFont('helvetica', 'B', 20);
            $this->Cell(0, 15, 'Permintaan Barang', 0, true, 'C', 0, '', 0, false, 'M', 'M');
        }

        public function Footer() {
            $this->SetY(-15);
            $this->SetFont('helvetica', 'I', 8);
            $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }

    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Company');
    $pdf->SetTitle('Permintaan Barang');
    $pdf->SetSubject('Permintaan Barang');
    $pdf->SetKeywords('TCPDF, PDF, permintaan, barang');

    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    $html = '
    <h1>Permintaan Barang</h1>
    <table border="1" cellpadding="4">
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Supplier</th>
            <th>Tanggal Permintaan</th>
        </tr>
        <tr>
            <td>'.$product_name.'</td>
            <td>'.$quantity.'</td>
            <td>'.implode(', ', $selected_suppliers).'</td>
            <td>'.date('Y-m-d H:i:s').'</td>
        </tr>
    </table>';

    $pdf->writeHTML($html, true, false, true, false, '');

    // Output PDF
    $pdf->Output('permintaan_barang.pdf', 'I');

    // Send WhatsApp notification
    $apiToken = "xnjctf1hr1unaxor";
    $instanceId = "instance88807";

    foreach ($selected_suppliers as $supplier) {
        // Get phone number from database
        $stmt = $pdo->prepare('SELECT phone FROM suppliers WHERE name = :name');
        $stmt->execute(['name' => $supplier]);
        $supplier_data = $stmt->fetch();

        $phone = $supplier_data['phone'];
        $message = "Permintaan barang baru dari PT Selecta Grage Jaya 
        Jl. Kalijaga No.108, Pegambiran, Kec. Lemahwungkuk,
        Kota Cirebon, Jawa Barat 45113 :\n\nNama Produk: $product_name\nJumlah: $quantity\nSupplier: $supplier\nTanggal Permintaan: ".date('Y-m-d H:i:s');

        $data = [
            "token" => $apiToken,
            "to" => $phone,
            "body" => $message
        ];

        $jsonData = json_encode($data);

        $ch = curl_init("https://api.ultramsg.com/$instanceId/messages/chat");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

        $response = curl_exec($ch);
        curl_close($ch);
    }
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
    <title>Kantorku Inventory</title>
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
        .checkbox {
            margin-left: 10px;
        }
        .btn-custom {
            background-color: #007bff;
            color: #fff;
            border: none;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="form-header">Permintaan Stok Barang ke Supplier</h2>
                    <form method="POST" action="request_stock.php">
                        <div class="form-group">
                            <label for="product_name">Nama Produk:</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Jumlah:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="form-group">
                            <label>Supplier:</label>
                            <div class="form-check">
                                <?php foreach ($suppliers as $supplier): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="supplier[]" value="<?php echo $supplier['name']; ?>">
                                        <label class="form-check-label">
                                            <?php echo $supplier['name']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-custom btn-block">Kirim Permintaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

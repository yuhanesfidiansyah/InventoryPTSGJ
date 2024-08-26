<?php
require '../koneksi.php';
require_once('tcpdf/tcpdf.php');

$id_det_pemasukan = $_GET['id_det_pemasukan'];

// Mendapatkan data pemasukan berdasarkan id_det_pemasukan
$sql = "SELECT barang.barcode, barang.merk_barang, barang.nama_barang, det_pemasukan.*, pemasukan.* 
        FROM ((barang 
        INNER JOIN pemasukan ON pemasukan.id_barang = barang.id_barang) 
        INNER JOIN det_pemasukan ON pemasukan.id_pemasukan = det_pemasukan.id_pemasukan) 
        WHERE det_pemasukan.id_det_pemasukan = '$id_det_pemasukan'";

$query = mysqli_query($db_link, $sql);
$data = mysqli_fetch_array($query);

// Inisialisasi PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set informasi dokumen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Kantorku Inventory');
$pdf->SetTitle('Detail Pemasukan Barang');
$pdf->SetSubject('Detail Pemasukan Barang');
$pdf->SetKeywords('TCPDF, PDF, pemasukan, barang');

// Set header dan footer
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set margin
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set default font
$pdf->SetFont('helvetica', '', 12);

// Tambah halaman
$pdf->AddPage();

// Buat HTML untuk isi PDF
$html = '<h2>Detail Pemasukan Barang</h2>
<table border="1" cellpadding="4">
    <tr>
        <th>No</th>
        <td>1</td>
    </tr>
    <tr>
        <th>Tanggal</th>
        <td>' . $data['tanggal'] . '</td>
    </tr>
    <tr>
        <th>Barcode</th>
        <td>' . $data['barcode'] . '</td>
    </tr>
    <tr>
        <th>Merk Barang</th>
        <td>' . $data['merk_barang'] . '</td>
    </tr>
    <tr>
        <th>Nama Barang</th>
        <td>' . $data['nama_barang'] . '</td>
    </tr>
    <tr>
        <th>Tanggal Produksi</th>
        <td>' . $data['tanggal_produksi'] . '</td>
    </tr>
    <tr>
        <th>Pemasukan</th>
        <td>' . $data['pemasukan'] . '</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>' . $data['status'] . '</td>
    </tr>
</table>';

// Tulis HTML ke dalam PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF
$pdf->Output('detail_pemasukan.pdf', 'I');
?>

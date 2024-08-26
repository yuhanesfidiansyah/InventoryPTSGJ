<?php
  include 'koneksi.php';
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
<title>Kantorku Inventory</title>
<link href="karre.css" rel="stylesheet" />

</head>

<body>

<div class="nav">
    <div class="bingkai">
        <div class="menu">
            <ul>
                <li><a href="index.php">Beranda</a></li>
                
                <li><a href="#">Data Barang</a>
                  <ul>
                <li><a href="stok_barang.php">Stok Barang</a></li>
                <li><a href="brg_masuk1.php">Barang Masuk</a></li>
                <li><a href="brg_keluar1.php">Barang Keluar</a></li>
                
                  </ul>
                </li>
                <li><a href="login.php">LogIn</a></li>             
                
            </ul>
        </div>
    </div>  
</div>
        
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
</form>
</div>
<div class="bingkai jarak_atas">
<div class="judul">Data Barang Keluar</div>
  <table width="1000px" border="0">
      <tr align="center">
        <td width="40" height="49"><strong>No</strong></td>
        <td width="148"><strong>Tanggal</strong></td>
        <td width="148"><strong>Barcode</strong></td>
        <td width="148"><strong>Merk Barang</strong></td>
        <td width="148"><strong>Nama Barang</strong></td>
        <td width="148"><strong>Total Barang Keluar</strong></td>
        
        
      </tr>
      <?php
      $no=1;
      $sql="SELECT user.username, barang.*, pemasukan.*, pengeluaran.*, det_pemasukan.* from ((((pemasukan inner join barang on barang.id_barang=pemasukan.id_barang) inner join det_pemasukan on pemasukan.id_pemasukan=det_pemasukan.id_pemasukan) inner join pengeluaran on det_pemasukan.id_det_pemasukan=pengeluaran.id_det_pemasukan) inner join user on pengeluaran.id_user=user.id_user) ORDER BY pengeluaran.tanggal";
      $query= mysqli_query($db_link,$sql);
      while($data = mysqli_fetch_array($query))
        {
        ?>
        <tr align="center">
          <td width="40"><?php echo "$no"; ?></td>
          <td width="148"><?php echo "$data[tanggal]"; ?></td>
          <td width="148"><?php echo "$data[barcode]"; ?></td>
          <td width="148"><?php echo "$data[merk_barang]"; ?></td>
          <td width="148"><?php echo "$data[nama_barang]"; ?></td>
          <td width="207"><?php echo "$data[jumlah]"; ?></td>
          <td width="90">
          </td>
        </tr>
        <?php
        $no++;
        }
    ?>
    </table>
</div>
</body>
</html>
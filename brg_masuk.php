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
<div class="header"></div>
<div class="nav">
    <div class="bingkai">
        <div class="menu">
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="#">Data Barang</a>
                  <ul>
                <li><a href="brg_masuk1.php">Barang Masuk</a></li>
                <li><a href="brg_keluar1.php">Barang Keluar</a></li>
                
                  </ul>
                </li>
                <li><a href="tunggakan.php">Tagihan</a></li>
                <li><a href="pembayaran.php">Pembayaran</a></li>
                <li><a href="#">Laporan</a>
                  <ul>
                    <li><a href="cetak/tagihan.php" target="tengah">Cetak tagihan</a></li>
                    <li><a href="cetak/bayar.php" target="tengah">Cetak Bayar</a></li>
                  </ul>
                </li>  
                       
                <li><a href="login.php">Logout</a></li>
            </ul>
        </div>
    </div>  
</div>
        <tr>
          <td height="40" valign="top">&nbsp;</td>
          <td valign="top"> <input type="submit" value="Tambah" class="tombol" required/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
</form>
</div>
<div class="bingkai jarak_atas">
<div class="judul">Data Siswa</div>
  <table width="1000px" border="0">
      <tr align="center">
        <td width="40" height="49"><strong>No</strong></td>
        <td width="148"><strong>NIS</strong></td>
        <td width="148"><strong>Nama Siswa</strong></td>
        <td width="207"><strong>Alamat</strong></td>
        <td width="207"><strong>Jenis Kelamin</strong></td>
        <td width="108"><strong>aksi</strong></td>
      </tr>
      <?php
      $no=1;
      $sql="SELECT * FROM siswa";
      $query= mysqli_query($db_link,$sql);
      while($data = mysqli_fetch_array($query))
        {
        ?>
        <tr align="center">
          <td width="40"><?php echo "$no"; ?></td>
          <td width="148"><?php echo "$data[nis]"; ?></td>
          <td width="148"><?php echo "$data[nama]"; ?></td>
          <td width="207"><?php echo "$data[alamat]"; ?></td>
          <td width="207"><?php echo "$data[jk]"; ?></td>
          <td width="90">
            <a href="siswa/editsiswa.php?id_siswa=<?php echo "$data[id_siswa]"; ?>"><button type="button" class="btn btn-warning btn-xs">EDIT</a></button>
            <a href="siswa/delete.php?id_siswa=<?php echo "$data[id_siswa]"; ?>" onclick="return confirm('Anda yakin?')"><button type="button" class="btn btn-danger btn-xs">HPS</a></button>
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
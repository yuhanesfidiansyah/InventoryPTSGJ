<?php
  include '../koneksi.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kantorku Inventory</title>
<link href="../karre.css" rel="stylesheet" />

</head>

<body>
<div class="nav">
    <div class="bingkai">
        <div class="menu">
        <ul>
                <li><a href="../beranda.php">Beranda</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="../data/barang.php">Barang</a></li>
                <li><a href="#">Data Barang</a>
                  <ul>
                <li><a href="../barang/brg_masuk.php">Barang Masuk</a></li>
                <li><a href="../barang/brg_keluar.php">Barang Keluar</a></li>
                
                  </ul>
                </li>
                <li><a href="#">Laporan</a>
                  <ul>
                    <li><a href="../cetak/cetak_stok_barang.php" target="tengah">Stok Barang</a></li>
                    <li><a href="../cetak/pemasukan.php" target="tengah">Pemasukan</a></li>
                    <li><a href="../cetak/pengeluaran.php" target="tengah">Pengeluaran</a></li>
                  </ul>
                </li>  
                <li><a href="../index.php">Logout</a></li>
            </ul>
        </div>
    </div>  
</div>
<div class="jarak_atas bingkai">
  <?php
      $id_user=$_GET['id_user'];
      $sql = "SELECT * FROM user WHERE id_user ='$id_user'";
      $query = mysqli_query($db_link,$sql);
      $data = mysqli_fetch_array($query);
      ?>
  <div class="judul">Edit Admin</div>
  <form action='aksi_edit_admin.php?id_user=<?php echo "$id_user"; ?>' method='POST'>
      <table width="1000px" border="0" class="jarak_atas">   
     <tr>
          <td width="248" height="58" valign="top"><strong>Username</strong></td>
          <td width="742" valign="top">
          <input type="text" name="username" id="username" class="tulisan" value="<?php echo $data['username'] ?>" required/></td>
        </tr>
        <tr>
          <td width="248" height="58" valign="top"><strong>Password</strong></td>
          <td width="742" valign="top">
          <input type="password" name="password" id="password" class="tulisan" value="<?php echo $data['password'] ?>" required/></td>
        </tr>
        <tr>
          <td height="40" valign="top">&nbsp;</td>
          <td valign="top"> <input type="submit" value="Simpan" class="tombol" required/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
  </form>
</div></body></html>
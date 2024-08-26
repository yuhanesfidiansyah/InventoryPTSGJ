<?php
  include "../../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../../karre.css">
</head>
<body>
  <div name="a" id="a">
    <link rel="stylesheet" type="text/css" href="../../karre.css">
  <br><center><<h2>Laporan Barang Keluar</h2> 
             <h3>PT KANTORKU INVENTORY</h3>
             <h4>Jl. Brigjen Darsono By Pas, Sunyaragi Kota Cirebon Jawa Barat 45132
             <br>(0231) 863721</h4></center>
         <br>
         <br>
            <table width="1000px" border='0' cellpadding='5' align='center' cellspacing="0" >
                 <thead>
                 <tr bgcolor="silver">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Admin</th>
                    <th>Barcode</th>
                    <th>Merk Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>                   
                    
                    </tr>
                </thead>
                <tbody>
                  <?php
            $no=1;
            $sql="SELECT user.username, barang.barcode, barang.nama_barang, barang.merk_barang, pemasukan.*, pengeluaran.* from (((pemasukan inner join barang on pemasukan.id_barang=barang.id_barang) inner join pengeluaran on pemasukan.id_pemasukan=pengeluaran.id_pemasukan) inner join user on pengeluaran.id_user=user.id_user) ORDER BY pengeluaran.tanggal";
          $query= mysqli_query($db_link,$sql);
          while($data = mysqli_fetch_array($query)){
            echo"<tr>
            <td>$no</td>
            <td>$data[tanggal]</td>
                <td>$data[username]</td>
            <td>$data[barcode]</td>
                <td>$data[merk_barang]</td>
                <td>$data[nama_barang]</td>
                <td>$data[jumlah]</td>
                
                
           
              </tr>";$no++;
          } 
          ?>
                </tbody>
            </table>
          </div>
          <br>
            <center><button class="bflat" style="margin-left:5%"onclick="javascript:printDiv('a');">Cetak</button></center>

             <textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
        <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
        <script type="text/javascript">
        function printDiv(elementId) {
         var a = document.getElementById('printing-css').value;
         var b = document.getElementById(elementId).innerHTML;
         window.frames["print_frame"].document.title = document.title;
         window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
        }
            function PrintPreview() {
          var toPrint = document.getElementById('a');
          var popupWin = window.open('');
          popupWin.document.open();
          popupWin.document.write('<html><title>::Printpreview Data::</title><link rel="stylesheet" type="text/css" href="../CSS/style.css" media="screen"/></head><body">')
          popupWin.document.write(toPrint.outerHTML);
          popupWin.document.write('</html>');
          popupWin.document.close();
         }
        </script>

</body>
</html>
        









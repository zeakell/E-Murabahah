<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php
 date_default_timezone_set('Asia/Jakarta');
include "koneksi.php";
$awal = $_GET['awal'];
$akhir = $_GET['akhir'];

/*$query = mysqli_query($conn,  "SELECT angsuran.no_transaksi, angsuran.angsuran_ke, angsuran.jml_bayar, angsuran.tgl_bayar, anggota.nama_lengkap, pembelian.sisa_angsuran FROM (angsuran JOIN pembelian on pembelian.id_pemb = angsuran.id_pemb) JOIN anggota on pembelian.NIP = anggota.NIP where (tgl_bayar BETWEEN '$awal' and '$akhir' )" );*/

$query=mysqli_query($conn,"select data_nasabah.nama_nasabah, data_nasabah.NIP, pembelian.id_pemb, pembelian.tgl_pembelian, pembelian.sisa_angsuran, angsuran.* from angsuran join (pembelian join data_nasabah on pembelian.NIP=data_nasabah.NIP) on angsuran.id_pemb=pembelian.id_pemb where (tgl_bayar BETWEEN '$awal' and '$akhir' ) ");

?>
<!DOCTYPE html>
<html lang="en">

  <head>
  <style>
    table, th{
      text-align: center;
    }
  </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/icon" href="../img/KOSIKA.png">
	  <title>CETAK LAPORAN TRANSAKSI | KOSIKA TAZKIA</title>

<title></title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">


      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        
      </form>

    

      <!-- Sidebar -->
     

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          
          <!-- DataTables Example -->

          <h1 align="center">
          <img src="../img/KOSIKA.png" width="150" height="150" /><br>  
             LAPORAN TRANSAKSI PENERIMAAN PEMBAYARAN ANGSURAN <BR> KOSIKA TAZKIA
          </h1>
          <?php
          $d=date("d-F-Y"); ?>
           
              <p>Customer Service : <?php echo $_SESSION['user'];?></p>
              <p>Tanggal :<?php echo $d; ?></p>
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     
                      <th>No.Transaksi</th>
                      <th>Nama Nasabah</th>
                      <th>Angsuran Ke</th>
                      <th>Jumlah Bayar</th>
                      
                      <th>Tanggal Transaksi</th>
                    </tr>
                  </thead>
                  
                 <tbody>
            
            <?php
          $c=0;
          while ($rows=mysqli_fetch_array($query)) 
          {
          ?>

    <tr>
    
      <td><?php echo $rows['no_transaksi'];?></td>
      <td><?php echo $rows['nama_nasabah'];?></td>
      <td><?php echo $rows['angsuran_ke'];?></td>
      <td><?php echo "Rp. ".number_format($rows['jml_bayar']);?></td>
      
      <td><?php echo $rows['tgl_bayar'];?></td>

    
     
    </tr><br><br>
 <?php
    }
    $beban = mysqli_query($conn,"select SUM(jml_bayar) as jumlah FROM angsuran where tgl_bayar BETWEEN '$awal' and '$akhir'");
    $beban1=mysqli_fetch_array($beban);
  $beban2=$beban1['jumlah'];
?>
        </tbody>
    </table> <br><br>
<div class="col-md-3">
                    
                  </div><p align="right"> TOTAL PENERIMAAN PEMBAYARAN ANGSURAN ADALAH  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<b> <?php echo "Rp. ".number_format($beban2); ?> ,- </b>
                  <p align="right"> Diterima oleh, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Disetor oleh,</p>
                  <p align="right"> Admin  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;CS</p>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <p align="right">_________________________  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;_________________________</p>
              </div>
               
            </div>
         
          </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
      

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
  

    
<script>
  window.print();
</script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>

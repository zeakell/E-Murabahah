<?php
    include("koneksi.php");
    date_default_timezone_set('Asia/Jakarta');
    ?>
<?php 
session_start();
  $nama_nasabah = $_SESSION['user'];
  $password = $_SESSION['pass'];
  $NIP = $_SESSION['NIP'] ;
        
         //manggil user 
         $sql = "select * from data_nasabah where NIP = '$NIP' AND password = '$password'";
         $result = mysqli_query($conn, $sql); 
?>

<!doctype html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../asset/css/admin.css"> 
      <link rel="stylesheet" type="text/css" href="../asset/fonts/Font-Awesome-master/css/all.min.css">
      <link rel="icon" type="image/png" href="img/KOSIKA.png" />

      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- Main Stylesheet File -->
    <link href="csss/style.css" rel="stylesheet">
      <title>Data Pribadi |KOSIKA TAZKIA</title>
  </head>
  <body>
    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="mainmenu.php">
            <img src="img/KOSIKA.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
        </a>

        <a class="navbar-brand" href="mainmenu.php">Selamat Datang <?php echo $_SESSION['user']; ?></a>
        <div class="icon my-2 my-lg-0 ml-auto" >
                <h5>
                      <!--untuk menampilkan title pada icon ketika diarahkan ke icon tersebut
                    <a class="btn btn-default" href="#" aria-label="Settings">
                      <i class="fas fa-bell mr-3"  data-toogle="tooltip"  title="Notifikasi "></i>
                    </a>
                    -->
                    <a class="btn btn-default" href="ganti_pw.php" aria-label="Settings">
                      <i class="fas fa-user mr-3 " data-toogle="tooltip"  title="Ubah Password " aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-default" href="logout_process.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')" aria-label="Settings">
                      <i class="fas fa-sign-out-alt mr-3" data-toogle="tooltip"  title="Keluar "></i>
                    </a>
                </h5>
        </div>
      </nav>

 <!--==========================
      View Data KEUANGAN 
    ============================-->

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 
<section id="pendaftaran"  class="section-bg">
      <div class="container">
         <!-- Begin Page Content -->
        <div class="container-fluid"><br>
          <a href="data_keuangan.php"><button type="submit"  class="btn btn-info btn-sm"  name="submit">Tambah Data</button></a><br><br>
          <input type="submit"  class="btn btn-info btn-sm" name="submit" value="Kembali" onclick=self.history.back()><br>

          <!-- Page Heading -->
          <br><br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Keuangan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>           
               <tr>  
                <tr>
                  <td rowspan="2" valign="middle">No</td>
                  <td colspan="4" align="center">Data Keuangan</td>
                  <td colspan="4" align="center">Pembelian Lainnya</td>
                </tr>               
               	              
               	<td>Penghasilan Bersih</td>
               	<td>Penghasilan Bersih Istri/suami</td>
               	<td>Penghasilan Tambahan</td>
                <td>Pengeluaran</td>
                <td>Nama Barang </td>   
                <td>Harga Barang</td>  
                <td>Nama Kreditur</td>   
                <td>Tanggal Tempo</td>   	
                            
               	</tr>         
               </thead>         
              <tbody>             
               	<?php  $sqll = "select * from data_keuangan where NIP = '$NIP'"; 
                 $resultt = mysqli_query($conn, $sqll);    
               	$no = 1;                 
               	while($row = mysqli_fetch_assoc($resultt)) { ?>                         
               	<tr>                             
               		<td><?php echo $no; ?></td>                   
               		<td><?php echo "Rp. ".number_format($row['peng_bersih']); ?></td>
               		<td><?php echo "Rp. ".number_format($row['peng_bersih_istri']); ?></td>
               		<td><?php echo "Rp. ".number_format($row['peng_tambahan']); ?></td>
                  <td><?php echo "Rp. ".number_format($row['pengeluaran']); ?></td>
               		<td><?php echo $row['jns_pembelian']; ?></td>
                  <td><?php echo "Rp. ".number_format($row['jml_pembelian']); ?></td>
                  <td><?php echo $row['nama_kreditur']; ?></td>
                  <td><?php echo $row['tgl_tempo']; ?></td>         
               		</td>                         
               	</tr>                    
               	 <?php $no++; } ?>        
              </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include "footer.php"; ?>
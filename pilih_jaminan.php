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
      <title>JAMINAN |KOSIKA TAZKIA</title>
  </head>
  <body>
    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="img/KOSIKA.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
        </a>

        <a class="navbar-brand" href="#">Selamat Datang <?php echo $_SESSION['user']; ?></a>
        <div class="icon my-2 my-lg-0 ml-auto" >
                <h5>
                
                    <!--untuk menampilkan title pada icon ketika diarahkan ke icon tersebut-->
                    <a class="btn btn-default" href="#" aria-label="Settings">
                      <i class="fas fa-bell mr-3"  data-toogle="tooltip"  title="Notifikasi "></i>
                    </a>
                    <a class="btn btn-default" href="Dpengaturan.html" aria-label="Settings">
                      <i class="fas fa-user mr-3 " data-toogle="tooltip"  title="Pengaturan " aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-default" href="../Lmurid.html" aria-label="Settings">
                      <i class="fas fa-sign-out-alt mr-3" data-toogle="tooltip"  title="Keluar "></i>
                    </a>
                </h5>
        </div>
      </nav>

<?php $id_pemb = $_GET['id_pemb'];  ?>


  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 
<section id="pendaftaran"  class="section-bg">

      <div class="container"><br>
      <!-- Begin Page Content -->
        <div class="container-fluid"><br>
             
          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">Pilih Jenis Jaminan</h1><br>
              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Pilih Jaminan</h6>
                </div>
                <div class="card-body">  
    <h3> <center> 
        <form action="tbayar.php" method="get">
        <label>Jenis Jaminan :</label><br>
            <input type="radio" name="jns_jaminan" id="jns_jaminan" value="Tanah" onclick="javascript:window.location.href='jtanah.php?id_pemb=<?php echo $id_pemb; ?>'; return false;"> Tanah
            <input type="radio" name="jns_jaminan" id="jns_jaminan" value="Rumah"  onclick="javascript:window.location.href='jrumah.php?id_pemb=<?php echo $id_pemb; ?>'; return false;"> Rumah 
            <input type="radio" name="jns_jaminan" id="jns_jaminan" value="BPKN Motor"  onclick="javascript:window.location.href='jmotor.php?id_pemb=<?php echo $id_pemb; ?>'; return false;"> BPKN Motor
            <input type="radio" name="jns_jaminan" id="jns_jaminan" value="BPKN Mobil"  onclick="javascript:window.location.href='jmobil.php?id_pemb=<?php echo $id_pemb; ?>'; return false;"> BPKN Mobil
        
        </form>
        
        </center>
        
    </h3>
    <input type="submit"  class="btn btn-danger btn-sm btn-block" name="submit" value="Kembali" onclick=self.history.back()><br>
</section>
  



   
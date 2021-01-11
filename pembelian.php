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
      <title>Form Keuangan |KOSIKA TAZKIA</title>
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

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 
<section id="pendaftaran"  class="section-bg">


      <div class="container"><br>
        
          

           <!-- Begin Page Content -->
        <div class="container-fluid">

        <table style="width:100%;">
            <img align="center" src="img/KOSIKA.png" />
        </table><br>

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">Pengajuan Pembelian Barang</h1>
          <p class="mb-4">Silahkan isi data dengan benar.</p>

        <!-- Content Row -->
          <div class="row">

            <!-- First Column -->
            <div class="col-lg-4">

              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan</h6> 
                </div>
                <div class="card-body">       

    <?php 
         $hasil = mysqli_query($conn, "SELECT max(id_pemb) as idMaks FROM pembelian");
         $data = mysqli_fetch_array($hasil);
         $idMax = $data['idMaks'];
         $noUrut = (int) substr($idMax, 6, 8);
         $noUrut++;
         $format = "PMBL";
         $newID = $format . sprintf("%03s", $noUrut)
    ?>  



<form action="save_pembelian.php" name="myform" method="post" role="form" class="contactForm">
           
                <input type="hidden" name="submit">
        
               <div class="form-group">
                  <label>ID Pembelian</label>
                  <input type="text" name="id_pemb" class="form-control" id="id_pemb" value="<?php echo $newID;?>" readonly/>
                  <div class="validation"></div>
                </div>
               <div class="form-group">
                  <label>NIP</label>
                  <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $_SESSION['NIP'];?>" required="required" readonly/>
                  <div class="validation"></div>
                </div>
                
               
              <div class="form-group">
                      <label>Nama barang</label>
                        <select id="namabarang" class="form-control" name="namabarang" required="required" >
                          <option value="Mobil">Mobil</option>
                          <option value="Sembako">Sembako</option>
                          <option value="Motor">Motor</option>
                        </select>
                        <div class="validation"></div>
              </div>

                <div class="form-group">
                  <label>Harga Barang</label>
                  <input type="text" class="form-control" name="hrg_barang" id="hrg_barang" placeholder="Harga Barang" oninput="Hitung(this.value)" onchange="Amount()" autofocus="autofocus" required="required" />
                  <div class="validation"></div>
                </div>

                 <div class="form-group">
                  <label>% Margin</label>
                  <input type="text" class="form-control" name="persen_margin" id="persen_margin" placeholder="Persen Margin" required="required" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Margin</label>
                  <input type="text" class="form-control" name="margin" id="margin"  placeholder="Margin" required="required" readonly />
                  <div class="validation"></div>
                </div>    
            </div>
          </div>
        </div>
     
      <!-- Second Column -->
            <div class="col-lg-4">

              <!-- Background Gradient Utilities -->
              <div class="card shadow mb-4">
                 <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan</h6>
                </div>
                <div class="card-body">
               
                
                <div class="form-group">
                 <label>Tenor</label>
                  <select class="form-control" name="durasi_pemb" id="durasi_pemb" onchange ="Amount()" placeholder="Durasi Pembiayaan" default selected required="required" />
                  <option id="durasi_pemb" name="durasi_pemb" value="12">12 Bulan</option>
                  <option id="durasi_pemb" name="durasi_pemb" value="24">24 Bulan</option>
                  </select> 
                  <div class="validation"></div>
                </div>

                  <div class="form-group">
                  <label>Jumlah Angsuran</label>
                  <input type="text" class="form-control" name="angsuran" id="angsuran" placeholder="Jumlah Angsuran" required="required"  />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Total Harga Pengajuan Pembelian</label>
                  <input type="text" class="form-control" name="jml_pemb" id="jml_pemb"  placeholder="Total Harga Pengajuan Pembelian" required="required"  />
                  <div class="validation"></div>
                </div>
                
                <div class="form-group">
                  <label>Tujuan Pengajuan Pembelian</label>
                  <input type="text" class="form-control" name="keperluan" id="keperluan"  placeholder="Tujuan Pengajuan Pembelian" required="required"  />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label>Tanggal mulai</label>
                  <input type="date" class="form-control" name="tgl_pembelian" id="tgl_pembelian" placeholder="Tanggal pembelian" />
                  <div class="validation"></div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-sm btn-block" name="submit">Simpan</button>
                    <input type="submit"  class="btn btn-danger btn-sm btn-block" name="submit" value="Kembali" onclick=self.history.back()><br>
                </div>
        
                <div id="errormessage"></div>    
           </form>
       
      </div>
    </div>
</div>
</div>

<script>
          function Hitung(val) {
            if (val<=10000000) {
              var nilMar = val * 2.5/100;
              var nilPemb = parseInt(val) + parseInt(nilMar); 
              var persen = "2.5%";  
            }
            else if (val>10000000){
              var nilMar = val * 2/100;
              var nilPemb = parseInt(val) + parseInt(nilMar); 
              var persen = "2%";  
            }
            /*display the result*/
            var divobj = document.getElementById('margin');
            divobj.value = nilMar;

            var divobjp = document.getElementById('persen_margin');
            divobjp.value = persen;

            
          }

        function Amount() {
          var x = document.myform.hrg_barang.value;
          var y = document.myform.durasi_pemb.value;
          var z = document.myform.margin.value;
            var tot_price = (parseInt(x/y)+ parseInt(z));
           
            //tot_price = nilMar
            /*display the result*/
            var divobja = document.getElementById('angsuran');
            divobja.value = tot_price;//nilai angsuran

          var a = document.myform.angsuran.value;
          var b = document.myform.durasi_pemb.value;
          var  tot_pemb = parseInt(a) * parseInt(b);

            var divobjt = document.getElementById('jml_pemb');
            divobjt.value = tot_pemb;
        }
</script>
</body>
</hmtl>
<?php include "footer.php"; ?>
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

  <!--==========================
      Formulir Pendafatan JAMINAN  
    ============================-->
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
          <h1 class="h3 mb-1 text-gray-800">Data Jaminan </h1>
          <p class="mb-4">Silahkan isi formulir dibawah ini..</p>

                  <!-- Content Row -->
          <div class="row">

            <!-- First Column -->
            <div class="col-lg-4">

              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Jaminan</h6>
                </div>
                <div class="card-body">   

    <?php 
         $hasil = mysqli_query($conn, "SELECT max(id_jaminan) as idMaks FROM jaminan");
         $data = mysqli_fetch_array($hasil);
         $idMax = $data['idMaks'];
         $noUrut = (int) substr($idMax, 6, 8);
         $noUrut++;
         $format = "JAMN";
         $newID = $format . sprintf("%03s", $noUrut)
    ?>      

<form action="save_jam.php" method="post" role="form" class="contactForm">
          
                <input type="hidden" name="submit">
               
               <div class="form-group">
                  <label>ID Jaminan</label>
                  <input type="text" name="id_jaminan" class="form-control" id="id_jaminan" value="<?php echo $newID;?>" readonly/>
                  <div class="validation"></div>
                </div>
               <div class="form-group">
                  <label>ID Anggota</label>
                  <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $_SESSION['NIP'];?>" required="required" readonly/>
                  
                  <div class="validation"></div>
                </div>
                 <p class="mb-4">Silahkan pilih satu jenis jaminan dari 4 pilihan dibawah ini..</p>
                <div class="form-group">
                  <label>Jenis Jaminan</label><br>
                  <input type="radio" name="jns_jaminan" id="jns_jaminan" value="Tanah"> Tanah
                  <input type="radio" name="jns_jaminan" id="jns_jaminan" value="Rumah"> Rumah <br>
                  
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Alamat Jaminan</label>
                  <textarea class="form-control" name="alamat"  rows="5" placeholder="Alamat"></textarea> 
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Tahun Dibangun</label>
                  <input type="text" class="form-control" name="th_dibangun" id="th_dibangun" onkeypress="return hanyaAngka(event)" placeholder="Tahun Dibangun" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Luas Bangunan</label>
                  <input type="text" class="form-control" name="luas_bangunan" id="luas_bangunan" placeholder="Luas Bangunan" />
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Jaminan</h6>
                </div>
                <div class="card-body">
                  <div class="form-group">
                  <label>Luas Tanah</label>
                  <input type="text" class="form-control" name="luas_tanah" id="luas_tanah" placeholder="Luas Tanah" /> 
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Harga Taksiran</label>
                  <input type="text" class="form-control" name="harga_taksiran" id="harga_taksiran" onkeypress="return hanyaAngka(event)" placeholder="Harga Taksiran" />
                  <div class="validation"></div>
                </div> 
                
                <div class="form-group">
                  <label>Status Tanah</label>
                  <select id="stat_tanah" class="form-control" name="stat_tanah"  placeholder="Status Tanah" >
                    <option value="null"> </option>
                    <option value="HGB">HGB</option>
                    <option value="Hak Milik">Hak Milik</option>
                    <option value="Hak Garap">Hak Garap</option>
                   </select>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Bentuk Surat</label>
                  <select id="bentuk_surat" class="form-control" name="bentuk_surat"  placeholder="Bentuk Surat" >
                    <option value="null"> </option>
                    <option value="Sertifikat">Sertifikat</option>
                    <option value="Akta Jual Beli">Akta Jual Beli</option>
                    <option value="Akta Waris">Akta Waris</option>
                   </select>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Nama Pemilik Jaminan</label>
                  <input type="text" class="form-control" name="pemilik_jaminan" id="pemilik_jaminan" placeholder=" Nama Pemilik Jaminan" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Jenis Jaminan</label><br>
                  <input type="radio" name="jns_jaminan" id="jns_jaminan" value="BPKN Motor"> BPKN Motor
                  <input type="radio" name="jns_jaminan" id="jns_jaminan" value="BPKN Mobil"> BPKN Mobil
                </div>
                <div class="form-group">
                  <label>Merk Kendaraan</label>
                 <input type="text" class="form-control" name="merk_kendaraan" id="merk_kendaraan" placeholder="Merk Kendaraan" />
                <div class="validation"></div>
                </div>
                   <div class="form-group">
                  <label>Type</label>
                  <input type="text" class="form-control" name="type" id="type" placeholder="Type" />
                  <div class="validation"></div>
                </div>
              </div>
            </div>
          </div>

        <!-- Third Column -->
            <div class="col-lg-4">

              <!-- Grayscale Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Jaminan</h6>
                </div>
                <div class="card-body">
             
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="text" class="form-control" name="tahun" id="tahun" onkeypress="return hanyaAngka(event)" placeholder="Tahun"  />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Warna</label>
                  <input type="text" class="form-control" name="warna" id="warna" placeholder="Warna" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>No. Polisi</label>
                   <input type="text" class="form-control" name="no_polisi" id="no_polisi" placeholder="No. Polisi" />
                   <div class="validation"></div>
                </div>
                 <div class="form-group">
                  <label>No. BPKB</label>
                   <input type="text" class="form-control" name="no_BPKB" id="no_BPKB" onkeypress="return hanyaAngka(event)" placeholder="No. BPKB" />
                   <div class="validation"></div>
                 <div class="form-group">
                  <label>No. Mesin</label>
                   <input type="text" class="form-control" name="no_mesin" id="no_mesin" onkeypress="return hanyaAngka(event)"  placeholder="No. Mesin" />
                   <div class="validation"></div>
                </div> 
                 <div class="form-group">
                  <label>Nama di BPKB</label>
                   <input type="text" class="form-control" name="nama_di_BPKB" id="nama_di_BPKB" placeholder="Nama di BPKB" />
                   <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Harga Kendaraan</label>
                   <input type="text" class="form-control" name="harga_kendaraan" id="harga_kendaraan" onkeypress="return hanyaAngka(event)" placeholder="Harga Kendaraan" />
                   <div class="validation"></div>
                </div>

                <div class="text-center">
                  <button type="submit"  class="btn btn-info btn-sm btn-block" name="submit">Submit</button></div><br>
                  
                <div id="errormessage"></div>                        
           
          </form>
       
      </div>
    </div>
  </div>
</div>

<form action="mainmenu.php" action="post">
<input type="submit"  class="btn btn-danger btn-sm btn-block" name="submit" value="Kembali" onclick=self.history.back()><br>
          </form><br>
<?php include "footer.php"; ?>

<script>
 function Rupiah(objek) {
    separator = ".";
    a = objek.value;
    b = a.replace(/[^\d]/g,"");
    c = "";
    panjang = b.length; 
    j = 0; 
    for (i = panjang; i > 0; i--) {
      j = j + 1;
      if (((j % 3) == 1) && (j != 1)) {
        c = b.substr(i-1,1) + separator + c;
      } else {
        c = b.substr(i-1,1) + c;
      }
    }
    objek.value = c;

  }       

  function convertToAngka()
  { var nominal= document.getElementById("nominal").value;
    var angka = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
    document.getElementById("angka").innerHTML= angka;
  }       

  function convertToAngka()
  { var nominal1= document.getElementById("nominal1").value;
    var angka1 = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
    document.getElementById("angka1").innerHTML= angka;
  }

    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
</script>
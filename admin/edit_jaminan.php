<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php"; ?>
 <?php 
  $id = $_GET['id']; 
         include('koneksi.php'); 
         $sql = "select * from jaminan where id_jaminan = '$id'";         
         $result = mysqli_query($conn, $sql); 
         if (mysqli_num_rows($result) > 0) {            
            $row = mysqli_fetch_assoc($result);         
       }     
     ?>   
      <!-- Begin Page Content -->
        <div class="container-fluid"><br>
              <input type="submit"  class="btn btn-info btn-sm" name="submit" value="Kembali" onclick=self.history.back()><br><br>
                  <!-- Content Row -->
          <div class="row">

            <!-- First Column -->
            <div class="col-lg-4">

              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data Jaminan</h6>
                </div>
                <div class="card-body">       

<form action="Pr_Ejaminan.php" method="POST">
              
                <input type="hidden" name="id_jaminan" value="<?php echo $id;?>">
               
               <div class="form-group">
                  <label>ID Jaminan</label>
                  <input type="text" name="id_jaminan" class="form-control" id="id_jaminan" value="<?php echo $row['id_jaminan']; ?>" readonly />
                  <div class="validation"></div>
                </div>
               <div class="form-group">
                  <label>NIP</label>
                  <input type="text" name="NIP" class="form-control" id="NIP" value="<?php echo $row['NIP']; ?>" readonly/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Jenis Jaminan</label>
                  <input type="text" class="form-control" name="jns_jaminan" id="jns_jaminan" value="<?php echo $row['jns_jaminan']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Alamat Jaminan</label>
                  <textarea class="form-control" name="alamat"><?php echo $row['alamat']; ?></textarea>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Tahun Dibangun</label>
                  <input type="text" class="form-control" name="th_dibangun" id="th_dibangun" onkeypress="return hanyaAngka(event)" value="<?php echo $row['th_dibangun']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Luas Bangunan</label>
                  <input type="text" class="form-control" name="luas_bangunan" id="luas_bangunan" value="<?php echo $row['luas_bangunan']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Luas Tanah</label>
                  <input type="text" class="form-control" name="luas_tanah" id="luas_tanah" value="<?php echo $row['luas_tanah']; ?>" /> 
                  <div class="validation"></div>
                </div><br>
            </div>
          </div>
        </div>
     
      <!-- Second Column -->
            <div class="col-lg-4">

              <!-- Background Gradient Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data Jaminan</h6>
                </div>
                <div class="card-body">
                  <div class="form-group">
                  <label>Harga Taksiran</label>
                  <input type="text" class="form-control" name="harga_taksiran" id="harga_taksiran" onkeypress="return hanyaAngka(event)" value="<?php echo $row['harga_taksiran']; ?>"/>
                  <div class="validation"></div>
                </div> 
                
                <div class="form-group">
                  <label>Status Tanah</label>
                  <input type="text" class="form-control" name="stat_tanah" id="stat_tanah" value="<?php echo $row['stat_tanah']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Bentuk Surat</label>
                  <input type="text" class="form-control" name="bentuk_surat" id="bentuk_surat" value="<?php echo $row['bentuk_surat']; ?>"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Nama Pemilik Jaminan</label>
                  <input type="text" class="form-control" name="pemilik_jaminan" id="pemilik_jaminan" value="<?php echo $row['pemilik_jaminan']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Merk Kendaraan</label>
                 <input type="text" class="form-control" name="merk_kendaraan" id="merk_kendaraan" value="<?php echo $row['merk_kendaraan']; ?>"/>
                <div class="validation"></div>
                </div>
                   <div class="form-group">
                  <label>Type</label>
                  <input type="text" class="form-control" name="type" id="type" value="<?php echo $row['type']; ?>" />
                  <div class="validation"></div>
                </div>
                 <div class="form-group">
                  <label>Tahun</label>
                  <input type="text" class="form-control" name="tahun" id="tahun" onkeypress="return hanyaAngka(event)" value="<?php echo $row['tahun']; ?>"  />
                  <div class="validation"></div><br><br>
                </div>
              </div>
            </div>
          </div>

        <!-- Third Column -->
            <div class="col-lg-4">

              <!-- Grayscale Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data Jaminan</h6>
                </div>
                <div class="card-body">
             
               
                <div class="form-group">
                  <label>Warna</label>
                  <input type="text" class="form-control" name="warna" id="warna" value="<?php echo $row['warna']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>No. Polisi</label>
                   <input type="text" class="form-control" name="no_polisi" id="no_polisi" value="<?php echo $row['no_polisi']; ?>" />
                   <div class="validation"></div>
                </div>
                 <div class="form-group">
                  <label>No. BPKB</label>
                   <input type="text" class="form-control" name="no_BPKB" id="no_BPKB" onkeypress="return hanyaAngka(event)" value="<?php echo $row['no_BPKB']; ?>" />
                   <div class="validation"></div>
                 <div class="form-group">
                  <label>No. Mesin</label>
                   <input type="text" class="form-control" name="no_mesin" id="no_mesin" onkeypress="return hanyaAngka(event)" value="<?php echo $row['no_mesin']; ?>" />
                   <div class="validation"></div>
                </div> 
                 <div class="form-group">
                  <label>Nama di BPKB</label>
                   <input type="text" class="form-control" name="nama_di_BPKB" id="nama_di_BPKB" value="<?php echo $row['nama_di_BPKB']; ?>"/>
                   <div class="validation"></div>
                </div>
                 <div class="form-group">
                  <label>Harga Kendaraan</label>
                   <input type="text" class="form-control" name="harga_kendaraan" id="harga_kendaraan" onkeypress="return hanyaAngka(event)" value="<?php echo $row['harga_kendaraan']; ?>" />
                   <div class="validation"></div><br>
                </div>
                
                 <div class="text-center"> 
                  <button type="submit" class="btn btn-info btn-sm" name="submit">Simpan</button>
                </div><br><br><br>
                <div id="errormessage"></div>  
                </div>
                </div>               
              </form>
              </div>
    

            </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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
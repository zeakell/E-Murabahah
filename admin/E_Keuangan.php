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
         $sql = "select * from data_keuangan where id_keu = '$id'";         
         $result = mysqli_query($conn, $sql); 
         if (mysqli_num_rows($result) > 0) {            
            $row = mysqli_fetch_assoc($result);         
       }     
     ?>    
        <div class="container-fluid"><br>
              <input type="submit"  class="btn btn-info btn-sm" name="submit" value="Kembali" onclick=self.history.back()><br><br>
          <div class="row">
             <!-- First Column -->
            <div class="col-lg-4">
              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data Keuangan</h6>
                </div>
                <div class="card-body">       

<form action="Pr_Keuangan.php" method="POST">
               
                <input type="hidden" name="id_keu" value="<?php echo $id; ?>">
              
                <div class="form-group">
                  <label>ID Keuangan</label>
                  <input type="text" name="id_keu" class="form-control" id="id_keu" value="<?php echo $row['id_keu']; ?>" readonly />
                  <div class="validation"></div>
                </div>

               <div class="form-group">
                  <label>NIP</label>
                  <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $row['NIP']; ?>" readonly/>
                  <div class="validation"></div>
                </div>
               <div class="form-group">
                  <label>Penghasilan Bersih</label>
                  <input type="text" name="peng_bersih" class="form-control" id="peng_bersih" onkeypress="return hanyaAngka(event)" value="<?php echo $row['peng_bersih']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Penghasilan Bersih Istri/suami</label>
                  <input type="text" name="peng_bersih_istri" class="form-control" id="peng_bersih_istri" onkeypress="return hanyaAngka(event)" value="<?php echo $row['peng_bersih_istri']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Penghasilan Tambahan</label>
                  <input type="text" name="peng_tambahan" class="form-control" id="peng_tambahan" onkeypress="return hanyaAngka(event)" value="<?php echo $row['peng_tambahan']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Pengeluaran</label>
                  <input type="text" name="pengeluaran" class="form-control" id="pengeluaran" onkeypress="return hanyaAngka(event)" value="<?php echo $row['pengeluaran']; ?>" />
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
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data Keuangan</h6>
                </div>
                <div class="card-body">
                  
                <h5>Pinjaman Lain</h5>
                   <div class="form-group">
                  <label>Jenis Pinjaman</label>
                  <input type="text" name="jns_pembelian" class="form-control" id="jns_pembelian" value="<?php echo $row['jns_pembelian']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Jumlah Pinjaman</label>
                  <input type="text" name="jml_pembelian" class="form-control" id="jml_pembelian" onkeypress="return hanyaAngka(event)"value="<?php echo $row['jml_pembelian']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Nama Kreditur</label>
                  <input type="text" name="nama_kreditur" class="form-control" id="nama_kreditur" value="<?php echo $row['nama_kreditur']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Tanggal Tempo</label>
                  <input type="date" class="form-control" name="tgl_tempo" id="tgl_tempo" value="<?php echo $row['tgl_tempo']; ?>"/>
                  <div class="validation"></div>
                </div><br>
                <div class="text-center">
                   <button type="submit" class="btn btn-info btn-sm" name="submit">Simpan</button>
                </div>
                
                <div id="errormessage"></div>                
             </form>
              </div>
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
<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
 <?php include "header.php"; ?>
 <?php 
         $id = $_GET['id_ref']; 

         $sql = "select * from referensi where id_ref = '$id'";    
            
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
      
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Referensi</h6>
            </div>
            <div class="card-body">
                
            

      <form action="Pr_Ref.php" method="POST" enctype="multipart/form-data">        
       	
                <input type="hidden" name="id_ref" value="<?php echo $id; ?>">
              
               <div class="form-group">
                  <label>ID Referensi</label>
                  <input type="text" class="form-control" name="id_ref" id="id_ref"  value="<?php echo $row['id_ref']; ?>" readonly />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>ID Anggota</label>
                  <input type="text" class="form-control" name="NIP" id="NIP"  value="<?php echo $row['NIP']; ?>" readonly />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Nama Penjamin (sesuai KTP)</label>
                  <input type="text" class="form-control" name="nama_penjamin" id="nama_penjamin"
                  value="<?php echo $row['nama_penjamin']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Nomor KTP Penjamin</label>
                  <input type="text" class="form-control" name="no_id" id="no_id" onkeypress="return hanyaAngka(event)"  value="<?php echo $row['NIK']; ?>" required="required"/>
                  <div class="validation"></div>
                </div>
              </div>
              </div>
            </div>


 <!-- Second Column -->
               <!-- Second Column -->
            <div class="col-lg-4">

              <!-- Background Gradient Utilities -->
            <div class="card shadow mb-4">       
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Referensi</h6>
            </div>
            <div class="card-body">
               <div class="form-group">
                 <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br><br>
                    <label>Ubah Foto KTP </label>
                    <input type="file" id="ktp1" name="ktp1" class="form-control" placeholder="Unggah KTP"  value="<?php echo $row['ktp1']?>"required="required" autofocus="autofocus">
                  </div>
                  <div class="form-group">
                  <label>Hubungan dengan Penjamin</label>
                  <input type="text" class="form-control" name="hubungan" id="hubungan" value="<?php echo $row['hubungan']; ?>" required="required"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?php echo $row['pekerjaan']; ?>" />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php echo $row['jabatan']; ?>" />
                  <div class="validation"></div>
                </div>
               </div>
            </div>
          </div>

                <div class="col-lg-4">

              <!-- Grayscale Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Referensi</h6>
                </div>
                 <div class="card-body">
                 
                <div class="form-group">
                  <label>Telepon Penjamin</label>
                  <input type="text" class="form-control" name="no_tlp" id="no_tlp" onkeypress="return hanyaAngka(event)" value="<?php echo $row['no_tlp']; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Alamat Penjamin</label>
                  <textarea class="form-control" name="alamat" rows="4"><?php echo $row['alamat']; ?></textarea>
                  <div class="validation"></div>
                </div><br>
                
             
                <div class="text-center">
                  <button type="submit" class="btn btn-info btn-sm" name="submit">Simpan</button>
                </div><br>
                 
                
            <div id="errormessage"></div>            
             </form>

              </div>

              </div>

            </div>
        <!-- /.container-fluid -->

      </div>
          

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
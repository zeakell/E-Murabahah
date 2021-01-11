<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php"; ?>

      <!-- Begin Page Content -->
        <div class="container-fluid"><br>
              <input type="submit"  class="btn btn-info btn-sm" name="submit" value="Kembali" onclick=self.history.back()><br><br>

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">Tambah Data Keuangan</h1>
          <p class="mb-4">Silahkan isi formulir dibawah ini..</p>

                  <!-- Content Row -->
          <div class="row">

            <!-- First Column -->
            <div class="col-lg-4">

              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Keuangan</h6>
                </div>
                <div class="card-body">      

    <?php 
         $hasil = mysqli_query($conn, "SELECT max(id_keu) as idMaks FROM data_keuangan");
         $data = mysqli_fetch_array($hasil);
         $idMax = $data['idMaks'];
         $noUrut = (int) substr($idMax, 3, 7);
         $noUrut++;
         $format = "KEU";
         $newID = $format . sprintf("%03s", $noUrut)
     ?>  

<form action="save_keu.php" method="post" role="form" class="contactForm">
              
                <input type="hidden" name="submit">
            
               <div class="form-group">
                  <label>ID Keuangan</label>
                  <input type="text" class="form-control" name="id_keu" id="id_keu" value="<?php echo $newID;?>" readonly />
                  <div class="validation"></div>
                </div>
               <div class="form-group">
                  <label>NIP</label>
                  <select name="NIP" class="form-control" id="NIP" />
                    <?php
                    $query = mysqli_query($conn,"SELECT * FROM data_nasabah order by NIP desc");
                    while ($rows= mysqli_fetch_array($query)) {
                    ?>
                  <option value="<?php echo $rows['NIP'];?>"><?php echo $rows['NIP'];?></option>
                <?php }?>

              </select>
                  <div class="validation"></div>
                </div>
               <div class="form-group">
                  <label>Penghasilan Bersih</label>
                  <input type="text" name="peng_bersih" class="form-control" id="peng_bersih"  onkeypress="return hanyaAngka(event)"placeholder="Penghasilan Bersih" required="required" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Penghasilan Bersih Istri/suami</label>
                  <input type="text" name="peng_bersih_istri" class="form-control" id="peng_bersih_istri"  onkeypress="return hanyaAngka(event)" placeholder="Penghasilan Bersih Istri/suami"  required="required" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Penghasilan Tambahan</label>
                  <input type="text" name="peng_tambahan" class="form-control" id="peng_tambahan"  onkeypress="return hanyaAngka(event)" placeholder="Penghasilan Tambahan"  required="required" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Pengeluaran</label>
                  <input type="text" name="pengeluaran" class="form-control" id="pengeluaran"  onkeypress="return hanyaAngka(event)" placeholder="Pengeluaran" required="required" />
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
                   <h6 class="m-0 font-weight-bold text-primary">Data Keuangan</h6>
                  </div>

                  <div class="card-body">
                    <h5>Pembelian Lain</h5>
                    <h6>Jika tidak ada silahkan isi dengan tanda (-)</h6>
                   <div class="form-group">
                  <label>Jenis Pembelian</label>
                  <input type="text" name="jns_pembelian" class="form-control" id="jns_pembelian" placeholder="Jenis Pembelian"  required="required" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Jumlah Pembelian</label>
                  <input type="text" name="jml_pembelian" class="form-control" id="jml_pembelian"  onkeypress="return hanyaAngka(event)"placeholder="Jumlah Pemebelian"  required="required" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Nama Kreditur</label>
                  <input type="text" name="nama_kreditur" class="form-control" id="nama_kreditur" placeholder="Nama Kreditur"  required="required"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Tanggal Tempo</label>
                  <input type="date" class="form-control" name="tgl_tempo" id="tgl_tempo" placeholder="Tanggal Tempo"  required="required"/>
                  <div class="validation"></div>
                </div><br>
  

                <div class="text-center">
                  <button type="submit"  class="btn btn-info btn-sm" name="submit">Simpan</button></div><br>
                <br>
                
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
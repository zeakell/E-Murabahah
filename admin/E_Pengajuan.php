<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php"; ?>
  <?php 
  $id = $_GET['id_pemb']; 
         include('koneksi.php'); 
         $sql = "select * from pembelian where id_pemb = '$id'";         
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
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data Pengajuan</h6>
                </div>
                <div class="card-body">       

<form action="EP_penngajuan.php" method="post" role="form" class="contactForm">
              
                <input type="hidden" name="id_pemb" value="<?php echo $id;?>">
               
               <div class="form-group">
                  <label>ID Pembiayaan</label>
                  <input type="text" name="id_pemb" class="form-control" id="id_pemb" value="<?php echo $row['id_pemb']; ?>" readonly  />
                  <div class="validation"></div>
                </div>

               <div class="form-group">
                  <label>NIP</label>
                  <input type="text" name="NIP" class="form-control" id="NIP" value="<?php echo $row['NIP']; ?>" readonly />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" name="namabarang" class="form-control" id="namabarang" value="<?php echo $row['namabarang']; ?>" readonly />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label>Harga Barang</label>
                  <input type="text" class="form-control" name="hrg_barang" id="hrg_barang" value="<?php echo $row['hrg_barang']; ?>" readonly />
                  <div class="validation"></div>
                </div>

                 <div class="form-group">
                 <label>% Margin</label>
                  <input type="text" class="form-control" name="persen_margin" id="persen_margin" value="<?php echo $row['persen_margin']; ?>" readonly />
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
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data Pengajuan</h6>
                </div>

                <div class="card-body">
               
                    <div class="form-group">
                    <label>Margin</label>
                    <input type="text" class="form-control" name="margin" id="margin" value="<?php echo $row['margin']; ?>" readonly />
                    <div class="validation"></div>
                    </div>

                    <div class="form-group">
                        <label>Total Pembelian Barang</label>
                        <input type="text" name="jml_pemb" class="form-control" id="namabarang" value="<?php echo $row['jml_pemb']; ?>" readonly />
                        <div class="validation"></div>
                    </div>

                    <div class="form-group">
                    <label>Durasi Pembiayaan</label>
                    <input type="text" class="form-control" name="durasi_pemb" id="durasi_pemb" value="<?php echo $row['durasi_pemb']; ?>" readonly />
                    <div class="validation"></div>
                    </div>

                    <div class="form-group">
                    <label>Angsuran</label>
                    <input type="text" class="form-control" name="angsuran" id="angsuran" value="<?php echo $row['angsuran']; ?>" readonly />
                    <div class="validation"></div>
                    </div>

                    <div class="form-group">
                    <label>Status Pengajuan</label>
                    <select id="realisasi" name="realisasi" required="required" class="form-control">
                        <option value="" default selected>STATUS</option>
                        <option id="realisasi" name="realisasi" value="DISETUJUI"> DISETUJUI</option>
                        <option id="realisasi" name="realisasi" value="DITOLAK"> DITOLAK</option>
                        </select>
                </div>
           

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
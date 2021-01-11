
<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
  <?php include "header.php"; ?>
  <?php 
  $id_pemb = $_GET['id_pemb']; 
         $sql = "select * from pembelian where id_pemb = '$id_pemb'";         
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
                  <h6 class="m-0 font-weight-bold text-primary">KONFIRMASI PEMBELIAN</h6>
                </div>
                <div class="card-body">       

<form action="insert_pemb.php" method="post" role="form" class="contactForm">
              
                <input type="hidden" name="id_pemb" value="<?php echo $id;?>">
               
               <div class="form-group">
                  <label>ID Pembelian</label>
                  <input type="text" name="id_pemb" class="form-control" id="id_pemb" value="<?php echo $row['id_pemb']; ?>" readonly  />
                  <div class="validation"></div>
                </div>
               <div class="form-group">
                  <label>NIP</label>
                  <input type="text" name="NIP" class="form-control" id="NIP" value="<?php echo $row['NIP']; ?>" readonly />
                  <div class="validation"></div>
                </div>
                
                <div class="form-group">
                  <label>Harga Barang</label>
                  <input type="text" class="form-control" name="hrg_barang" id="hrg_barang" value="<?php echo $row['hrg_barang']; ?>" readonly />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                <label>Durasi Pembelian</label>
                <input type="text" class="form-control" name="durasi_pemb" id="durasi_pemb" value="<?php echo $row['durasi_pemb']; ?>" readonly />
                  <div class="validation"></div>
                </div>
                 <br><br>
                       
            </div>
          </div>
        </div>
     
      <!-- Second Column -->
            <div class="col-lg-4">

              <!-- Background Gradient Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">KONFIRMASI PEMBELIAN</h6>
                </div>
                <div class="card-body">
                
                <div class="form-group">
                 <label>Angsuran</label>
                  <input type="text" class="form-control" name="angsuran" id="angsuran" value="<?php echo $row['angsuran']; ?>" readonly />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                <label>Jumlah Pembelian</label>
                <input type="text" class="form-control" name="jml_pemb" id="jml_pemb" value="<?php echo $row['jml_pemb']; ?>" readonly />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                <label>Tujuan Pembelian</label>
                  <input type="text" class="form-control" name="keperluan" id="keperluan" value="<?php echo $row['keperluan']; ?>" readonly />
                  <div class="validation"></div>
                </div>

            
                
                <div class="form-group">
                  <label>Tanggal pembelian</label>
                  <input type="date" class="form-control" name="tgl_pembelian" id="tgl_pembelian" placeholder="Tanggal lahir" />
                  <div class="validation"></div>
                </div>

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
      <!-- End of Main Content -->


<?php include "footer.php"; ?>
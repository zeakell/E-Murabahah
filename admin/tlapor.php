<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php
include "header.php";
include "koneksi.php"; ?>


        <div class="container-fluid">
 <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Pilih Periode Transaksi</div>
        <div class="card-body">
            <form method="post" action="tlaporan.php">
              <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-12">
                      <div class="form-label-group">
                        <input type="date" name="awal" id="awal" class="form-control" placeholder="Tanggal Awal" value="<?php echo date('Y-m-d');?>" required="required">
                        <label for="tgl_awal">Tanggal Awal</label>
                      </div>
                      </div>
                      </div>
                      </div>
               <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-12">
                      <div class="form-label-group">
                        <input type="date" name="akhir" id="akhir" class="form-control" placeholder="Tanggal Akhir" value="<?php echo date('Y-m-d'); ?>" required="required">
                        <label for="tgl_akhir">Tanggal Akhir</label>
                      </div>
                      </div>
                      </div>
                      </div>
                      <input type="submit" class="btn btn-info btn-block" value="CETAK LAPORAN"> 
            </form>
            </div>
            </div>
            </div>
    
         

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

<?php include 'footer.php' ?>

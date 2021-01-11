<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php"; ?>
 <!--==========================
      View Data pembelian 
    ============================-->

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 

<!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<section id="pendaftaran"  class="section-bg">

      <div class="container">


        <div class="container-fluid">
          <input type="submit"  class="btn btn-info btn-sm" name="submit" value="Kembali" onclick=self.history.back()><br>
          <br><br>

          <!-- Breadcrumbs-->
     <?php   
     $query=mysqli_query($conn,"select data_nasabah.nama_nasabah, data_nasabah.NIP, pembelian.id_pemb, pembelian.tgl_pembelian, pembelian.sisa_angsuran, angsuran.* from angsuran join (pembelian join data_nasabah on pembelian.NIP=data_nasabah.NIP) on angsuran.id_pemb=pembelian.id_pemb "); ?>
  
          <!-- DataTables Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO TRANSAKSI</th>
                      <th>NAMA NASABAH</th>
                      <th>ANGSURAN KE</th>
                      <th>JUMLAH BAYAR</th>
                      
                      <th>TANGGAL TRANSAKSI</th>
                      
                      
                      <th></th>
                    </tr>
                  </thead>
                  
                 <tbody>
            
            <?php
          $c=0;
          while ($row=mysqli_fetch_array($query)) 
          {
          ?>

    <tr>
    <td><?php echo $row['no_transaksi'];?></td>
    <td><?php echo $row['nama_nasabah'];?></td>
    <td><?php echo $row['angsuran_ke'];?></td>
    <td><?php echo $row['jml_bayar'];?></td>
  
    <td><?php echo $row['tgl_bayar'];?></td>
    
    <td> 
    <a  class="btn btn-primary btn-block"  href="bukti_bayar.php?no_transaksi=<?php echo $row['no_transaksi'];?>">Cetak Bukti Pembayaran</a>
    </td> 
    </tr>
<?php
    }
    
?>
        </tbody>
    </table> 


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

     <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

       <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
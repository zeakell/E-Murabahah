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


<?php  include('koneksi.php'); 
         
         $sql = "select * from pembelian where realisasi='DISETUJUI'";
         
         $result = mysqli_query($conn, $sql); ?> 

         <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <br><br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Silahkan Pilih Pengajuan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>           
               <tr align="center">                 
                <td>No</td> 
                <td>ID pembelian</td> 
                <td>NIP</td>              
                <td>Harga pembelian</td>
                <td>Persen Margin</td>
                <td>Margin</td>
                <td>Durasi pembelian</td>
                <td>Angsuran</td>
                <td>Total Harga pembelian</td>        
                <td>Status Pengajuan</td>
                <td>Aksi</td>
              

                </tr>   
                        
               </thead>         
              <tbody>             
                <?php      
                $no = 1;                 
                while($row = mysqli_fetch_assoc($result)) { ?>                         
                <tr>                             
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['id_pemb']; ?></td>
                  <td><?php echo $row['NIP']; ?></td>                             
                  <td><?php echo "Rp. ".number_format($row['hrg_barang']); ?></td>
                  <td><?php echo $row['persen_margin']; ?></td>
                  <td><?php echo $row['margin']; ?></td>
                  <td><?php echo $row['durasi_pemb']; ?></td>
                  <td><?php echo "Rp. ".number_format($row['angsuran']); ?></td>
                  <td><?php echo "Rp. ".number_format($row['jml_pemb']); ?></td>
                  <td><?php echo $row['realisasi']; ?></td>

                  <td align="center"><a href="mohonjaminan.php?id_pemb=<?php echo $row['id_pemb']; ?>"><button type="submit"  class="btn btn-info btn-sm"  name="submit">Pilih</button></a></td>                      
                </tr>

                 <?php $no++; } ?>        
              </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>

      <!-- End of Main Content -->
      <?php include "footer.php"; ?>

      <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

       <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
      

<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php"; ?>
 <!--==========================
      View Data Pembiayaan 
    ============================-->

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 

<!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<section id="pendaftaran"  class="section-bg">

      <div class="container">


<?php  
         $sql = "select * from pembelian where realisasi='DISETUJUI'";
         
         $result = mysqli_query($conn, $sql); ?> 

         <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <br><br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data  Pembelian</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>           
               <tr align="center">                 
                <td>No</td> 
                <td>ID Pembelian</td> 
                <td>NIP</td>              
                <td>Harga Barang</td>
                <td>Persen Margin</td>
                <td>Margin</td>
                <td>Tenor</td>
                <td>Angsuran</td>
                <td>Total Harga Pembelian</td>        
                <td>Tanggal Mulai</td>
                <td>Tanggal Selesai</td>
                <td>Status Pembelian</td>
                <td>Lebih Lanjut</td>
                <td>Assesment</td>

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
                  <td><?php echo $row['tgl_pembelian']; ?></td>
                  <td><?php echo $row['tgl_selesai']; ?></td>
                  <td><?php echo $row['status_pemb']; ?></td>

                  <td align="center"><a href="detail_angsuran.php?id_pemb=<?php echo $row['id_pemb']; ?>"><button type="submit"  class="btn btn-info btn-sm"  name="detail">Detail</button></a><br>
                  <?php /* <a href="edit_pemb.php?id=<?php echo $row['id_pemb']; ?>"><span class="fa fa-edit"></span></a>
                  <td><a href="delete_pemb.php?id=<?php echo $row['id_pemb']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus item ini ?')"><button type="submit" class="btn btn-danger btn-sm"  name="delete">Hapus</button></a>  */?>           
                  <td align="center"><a href="detail_pemb.php?id_pemb=<?php echo $row['id_pemb']; ?>"><button type="submit"  class="btn btn-info btn-sm"  name="submit">Mulai</button></a>
                  <!--<td><a class="btn btn-info btn-block" href="kartu_biaya.php?id_pemb=<?php echo $row['id_pemb'];?>"><button type="submit"  class="btn btn-info btn-sm"  name="detail">Cetak Kartu</button></a></td>                      
                  -->
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
      

<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php"; ?>
 <!--==========================
      View Data Kekayaan
    ============================-->

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 

<!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<section id="pendaftaran"  class="section-bg">

      <div class="container">


<?php include('connection.php'); 
         $sql = "select pembelian.realisasi, jaminan.* FROM jaminan JOIN pembelian on jaminan.id_pemb=pembelian.id_pemb where pembelian.realisasi='DISETUJUI' ";         
         $result = mysqli_query($conn, $sql); ?> 

         <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <br><br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Jaminan
                <a href="pilihmohonjaminan.php"><button type="submit"  class="btn btn-info btn-sm"  name="submit">Update</button></a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>           
               <tr align="center">                 
                <td>No</td>
                <td>ID Jaminan</td>
                <td>ID Pengajuan</td>  
            
                <td>Jenis Barang</td>
                <td>Bukti Jaminan</td>
                <td>Tanggal Diterima</td>
                <td>Tanggal DIkembalikan</td>
                <td>Status Jaminan</td>
                 
                <td>Aksi</td>             
                </tr>         
               </thead>         
              <tbody>             
                <?php      
                $no = 1;                 
                while($row = mysqli_fetch_assoc($result)) { ?>                         
                <tr>                             
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['id_jaminan']; ?></td>
                  <td><?php echo $row['id_pemb']; ?></td>   
                                           
                  <td><?php echo $row['jns_barang']; ?></td>
                  <td><img src="img/jaminan/<?php echo $row['bukti_jaminan']; ?>"  width ="100" height="100"  ></td> 

                  <td><?php echo $row['tgl_terima']; ?></td>
                  <td><?php echo $row['tgl_kembali']; ?></td>
                  <td><?php echo $row['status_jaminan']; ?></td>

                                
                  <td align="center"><a href="data_jaminan.php?id_jaminan=<?php echo $row['id_jaminan']; ?>"><button type="submit"  class="btn btn-info btn-sm"  name="detail">Detail</button></a> 
                  <td><a href="edit_buktijaminan.php?id_pemb=<?php echo $row['id_pemb']; ?>" class="btn btn-info btn-sm" >Edit</a></td>
                  <?php /*<a href="edit_jaminan.php?id=<?php echo $row['id_jaminan']; ?>"><span class="fa fa-edit"></span></a>            
                  <a href="delete_jaminan.php?id=<?php echo $row['id_jaminan']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus item ini ?')"><span class="fa fa-trash"></a> */?>           
                                       
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
      

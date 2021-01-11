<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php"?>
<!--==========================
      View Data Pegawai
    ============================-->

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 

<!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<section id="pendaftaran"  class="section-bg">

      <div class="container">
     
		<?php include('koneksi.php'); 
         $sql = "select * from pembelian";         
         $result = mysqli_query($conn, $sql); 
   ?>

         <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <br><br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan pembelian    
                  <br><br>
               <a href="tmbh_pengajuan.php"><button type="submit"  class="btn btn-info btn-sm"  name="submit">Tambah</button></a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>           
               <tr>                 
               	<td>NO</td> 
                <td>NIP</td>                
                <td>Nama Barang </td>                  
                <td>Harga Barang</td>
                <td>Margin</td>
                <td>Total Harga Pembelian</td>
                <td>Tenor</td>
                <td>angsuran</td>
                <td>Status</td>
                <!--
               	
               	<td>Tanggal Lahir</td>
               	<td>Jenis Kelamin</td>
               	
               	<td>Agama</td>
               	<td>Status</td>
               	<td>No.Telepon</td>
               	<td>Alamat</td>         
-->   
                  <td>Aksi</td>             
               	</tr>         
               </thead>         
              <tbody>             
               	<?php      
               	$no = 1;                 
               	while($row = mysqli_fetch_assoc($result)) { ?>                         
               	<tr>                             
                    <td><?php echo $row['id_pemb'];?></td>
                    <td><?php echo $row['NIP'];?></td>
                    <td><?php echo $row['namabarang'];?></td>
                    <td><?php echo $row['hrg_barang'];?></td>
                    <td><?php echo $row['margin'];?></td>
                    <td><?php echo $row['jml_pemb'];?></td>
                    <td><?php echo $row['durasi_pemb'];?></td>
                    <td><?php echo $row['angsuran'];?></td>
                    <td><?php echo $row['realisasi'];?></td>
                    <td> 
                        <a  href="E_Pengajuan.php?id_pemb=<?php echo $row['id_pemb']; ?>"><button type="submit"  class="btn btn-info btn-sm"  name="detail">Detail</button></a>
                        <!--
                            <td><a href="pilih_jaminan.php?id_pemb=<?php echo $row['id_pemb']; ?>"><button type="submit"  class="btn btn-info btn-sm"  name="detail">+Jaminan</button></a>
                        -->
                    </td>

               		                        
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
      

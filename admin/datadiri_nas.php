<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php"?>

<!--==========================
      View Data Pribadi 
    ============================-->

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 

<!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
     
		<?php include('koneksi.php'); 
         $sql = "select * from data_nasabah";         
         $result = mysqli_query($conn, $sql); ?> 

         <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <br><br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pribadi</h6>
              <br>
                <a href="tmbh_nasabah.php"><button type="submit"  class="btn btn-info btn-sm"  name="submit">Tambah</button></a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>           
               <tr align="center">                 
               	<td>No</td>
                <td>NIP</td>               
               	<td>Nama Nasabah</td>
               	<td>Tempat Lahir</td>
               	<td>Tanggal Lahir</td>
               	<td>Jenis Kelamin</td>
               	<td>No Handphone</td>     
               	<td>Aksi</td>             
               	</tr>         
               </thead>         
              <tbody>             
               	<?php      
               	$no = 1;                 
               	while($row = mysqli_fetch_assoc($result)) { ?>                         
               	<tr>                             
               		<td><?php echo $no; ?></td>
                  <td><?php echo $row['NIP']; ?></td>                             
               		<td><?php echo $row['nama_nasabah']; ?></td>
               		<td><?php echo $row['tempatlahir']; ?></td>
               		<td><?php echo $row['tgl_lahir']; ?></td>
               		<td><?php echo $row['jk']; ?></td>
               		<td><?php echo $row['no_hp']; ?></td>
                                   
               		<td align="center"><a href="dt_pribadi.php?id=<?php echo $row['NIP']; ?>"><button type="submit"  class="btn btn-info btn-sm"  name="detail">Detail</button></a> 
                  <a href="edit_pri.php?id=<?php echo $row['NIP']; ?>"><span class="fa fa-edit " data-toogle="tooltip"  title="Ubah" ></span></a>             
                  <a href="Del_nasabah1.php?id=<?php echo $row['NIP']; ?>"><span class="fa fa-trash " data-toogle="tooltip"  title="hapus" ></span></a>             
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

       <!-- End of Main Content -->
      <?php include "footer.php"; ?>

       <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

       <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
      

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
         $sql = "select * from pegawai";         
         $result = mysqli_query($conn, $sql); 
   ?>

         <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <br><br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pegawai    
                  <br><br>
                  <a href="tmbh_pegawai.php">
                        <button type="submit"  class="btn btn-info btn-sm"  name="submit">Tambah</button>
                  </a>
               </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>           
               <tr>                 
               	<td>NO</td> 
                <td>NIP</td>                
                <td>NAMA LENGKAP</td>                  
                <td>JABATAN</td>
                <!--
               	<td>Tempat Lahir</td>
               	<td>Tanggal Lahir</td>
               	<td>Jenis Kelamin</td>
               	
               	<td>Agama</td>
               	<td>Status</td>
               	<td>No.Telepon</td>
               	<td>Alamat</td>         
-->   
                   <td align="center">AKSI</td>             
               	</tr>         
               </thead>         
              <tbody>             
               	<?php      
               	$no = 1;                 
               	while($row = mysqli_fetch_assoc($result)) { ?>                         
               	<tr>                             
               		<td><?php echo $no; ?></td>
                    <td><?php echo $row['NIP']; ?></td>                             
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['jabatan']; ?></td>
<!--
               		<td><?php echo $row['tempat_lahir']; ?></td>
               		<td><?php echo $row['tgl_lahir']; ?></td>
               		<td><?php echo $row['jk']; ?></td>
               		
               		<td><?php echo $row['agama']; ?></td>
               		<td><?php echo $row['status']; ?></td>
               		<td><?php echo $row['no_tlp']; ?></td> 
               		<td><?php echo $row['alamat']; ?></td>                             
                   -->                               
               		<td align="center"><a href="E_Pegawai.php?id=<?php echo $row['NIP']; ?>"><span class="fa fa-edit"></span></a>            
               	  <?php /*<a href="delete_peg.php?id=<?php echo $row['id_peg']; ?>" ><span class="fa fa-trash"></span></a>*/?> 

               		                        
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
      

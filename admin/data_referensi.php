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
     
		<?php 
         $sql = "select * from referensi";         
         $result = mysqli_query($conn, $sql); ?> 

         <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <br><br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Referensi
                <a href="add_ref.php"><button type="submit"  class="btn btn-info btn-sm"  name="submit">Tambah</button></a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>           
               <tr align="center">                 
               	<td>ID Referensi</td>
                <td>ID Anggota</td>               
               	<td>Nama Penjamin</td>
                <td>No.KTP Penjamin</td>
                <td>Bukti KTP</td>
                <td>Hubungan</td>
               	<td>Pekerjaan</td>
               	<td>Jabatan</td>
                <td>Telepon</td>
                <td>Alamat</td>
               	   
               	<td align="center">Aksi</td>             
               	</tr>         
               </thead>         
              <tbody>             
               	<?php      
               	$no = 1;                 
               	while($row = mysqli_fetch_assoc($result)) { ?>                         
               	<tr>                             
               		<td><?php echo $row['id_ref']; ?></td>
                  <td><?php echo $row['NIP']; ?></td>                             
               		<td><?php echo $row['nama_penjamin']; ?></td>
                  <td><?php echo $row['NIK']; ?></td>
                  <td><img src="img/ktpref/<?php echo $row['ktp']; ?>" width ="100" height="100" ></td>
                  <td><?php echo $row['hubungan']; ?></td>
               		<td><?php echo $row['pekerjaan'] ?></td>
               		<td><?php echo $row['jabatan']; ?></td>
                  <td><?php echo $row['no_tlp']; ?>
                  <td><?php echo $row['alamat']; ?>
                  </td>
                  
                  </td>                            
                                  
               		<td align="center"><a href="E_Ref.php?id_ref=<?php echo $row['id_ref']; ?>"><span class="fa fa-edit"></span></a>           
               		<?php /*<a href="delete_ref.php?id=<?php echo $row['id_ref']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus item ini ?')"><span class="fa fa-trash"></span></a> */?>          
               		                      
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
      

<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php" ?>

 <div id="content-wrapper">

        <div class="container-fluid">
    
          <!-- Breadcrumbs-->
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>Tabel Akad<br><br>
                <a href="tmbh_akad.php">
                    <button type="submit"  class="btn btn-info btn-sm"  name="submit">Tambah</button>
                </a>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NOMOR SURAT</th>
                      <th>ID PENGAJUAN</th>
                      <th>NIP</th>
                      <th>TRANSFER PEMBELIAN</th>                  
                    </tr>
                  </thead>
                  
                 <tbody>
                        <?php
                        $query=mysqli_query($conn,"select * from akad");

                        $c=0;
                        while ($row=mysqli_fetch_array($query)) 
                        {
                        ?>
                    <tr>
                      <td><?php echo $row['no_surat'];?></td>
                      <td><?php echo $row['id_pemb'];?></td>
                      <td><?php echo $row['NIP'];?></td>
                      <td><?php
                            if(!empty($row['bukti_tf'])){
                              echo "<img src='buktitf/".$row['bukti_tf']."' width='100' height='100'>";
                            }
                            else
                            { 
                                ?>
                              <a  class="btn btn-primary btn-block" href="up_bukti.php?id_pemb=<?php echo $row['id_pemb'];?>">Input bukti</a>
                            <?php }?>
                      </td> 
                    
                    <!--<td><a  class="btn btn-primary btn-block"  href="akad_murabahah.php?NIP=<?php echo $row['NIP'];?>&&id_pemb=<?php echo $row['id_pemb'];?>&&no_surat=<?php echo $row['no_surat'];?>">CETAK AKAD</a></td>
                              -->
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>

<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php
include "header.php";
$id_pemb=$_GET['id_pemb'];
$query=mysqli_query($conn,"select * from jaminan where id_pemb='$id_pemb'");
 ?>


    <div class="container">
      <div class="card card-register mx-auto mt-5">
      <form method="post" enctype="multipart/form-data" action="inputjaminan.php">
        <h5><div class="card-header">ID PENGAJUAN <input type="text" name="id_pemb" id="id_pemb" readonly="" value="<?php echo $id_pemb ?>"></div></h5>
        <div class="card-body">
            <div class="form-row">
             <div class="col-md-6">
               <div class="form-group">
                 <?php
                $row=mysqli_fetch_array($query);
          {
          ?> 
                 <center><label><b>Bukti Jaminan </b></label></center>

                    <img src="<?php echo'img/jaminan/'.$row['bukti_jaminan']; ?>" width="300" height="200">
                    <br>
                    <input type="checkbox" name="bukti_jaminan" required="required" value="check"> Ceklis jika sesuai<br><br>
                  </div>
                  </div>
                
                  <input type="submit" name="submit" class="btn btn-info btn-block" value="JAMINAN DISIMPAN">
                  </div>
                
                    
                  </div>
      <?php }?>

            </div>
            </div> 
              </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    </body>
</html>

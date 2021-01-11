<?php
include "header.php";
$id_pemb=$_GET['id_pemb'];
 ?>

<htmk>
<body class="bg-dark">
    <div class="container">
      <div class="card card-register mx-auto mt-5">
      <form method="post" enctype="multipart/form-data" action="save_bukti.php">
        <div class="card-header">ID PENGAJUAN <input type="text" name="id_pemb" readonly="" id="id_pemb" value="<?php echo $id_pemb ?>"></div> 
        <div class="card-body">
            
               <div class="form-group">
                   <div class="form-label-group">
                    <input type="file" id="bukti_tf" name="bukti_tf" class="form-control" placeholder="Unggah Bukti Transfer" required="required" autofocus="autofocus">
                    <label for="bukti">Unggah Bukti Transfer </label>
                  </div>
                </div> 
        </div>
            <input type="submit" class="btn btn-primary btn-block" value="SIMPAN">
              </div>
          </form>
        </div>
      </div>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    </body>
</html>

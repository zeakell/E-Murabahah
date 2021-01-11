<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php"; ?>
 <?php 
         $id = $_GET['id']; 
         include('koneksi.php'); 
         $sql = "select * from data_nasabah where NIP= '$id'";         
         $result = mysqli_query($conn, $sql); 
         if (mysqli_num_rows($result) > 0) {            
            $row = mysqli_fetch_assoc($result);         
       }     
      ?>
      <!-- Begin Page Content -->
        <div class="container-fluid"><br>
              <input type="submit"  class="btn btn-info btn-sm" name="submit" value="BATAL" onclick=self.history.back()><br><br>
                  <!-- Content Row -->
          <div class="row">

            <!-- First Column -->
            <div class="col-lg-4">

              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Detail Data Pribadi</h6>
                </div>
                <div class="card-body">       

<form action="editpri.php" method="post" role="form" class="contactForm">   
               <input type="hidden" name="NIP" value="<?php echo $id;?>">
             
                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $row['NIP']; ?>"  />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label>NIK</label>
                  <input type="text" class="form-control" name="NIK" id="NIK" value="<?php echo $row['NIK']; ?>"  />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label>Nama Nasabah</label>
                  <input type="text" class="form-control" name="nama_nasabah" id="nama_nasabah" value="<?php echo $row['nama_nasabah']; ?>"  />
                  <div class="validation"></div>
                </div>

                 
                <div class="form-group">
                  <label>Password </label>
                  <input type="password" class="form-control" name="password" id="password" value="<?php echo $row['password']; ?>"  />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label>Jabatan</label>
                  <?php $options = array("Staff", "Dosen", "Office Boy");?>
                   <select id="jabatan" class="form-control" name="jabatan"  value="<?php echo $row['jabatan']; ?>"  >
                       <?php foreach ($options as $option): ?>
                           <option value="<?php echo $option; ?>"<?php if ($row['jabatan'] == $option): ?> selected="selected"<?php endif; ?>>
                               <?php echo $option; ?>
                           </option>
                       <?php endforeach; ?>
                   </select>
                  <div class="validation"></div>
                </div>
                 
            </div>
          </div>
        </div>
     
      <!-- Second Column -->
            <div class="col-lg-4">

              <!-- Background Gradient Utilities -->
              <div class="card shadow mb-4">
                 <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Detail Data Pribadi</h6>
                </div>
                <div class="card-body">
                
                <div class="form-group">
                <label>Tempat Lahir</label>
                   <select id="tempatlahir" class="form-control" name="tempatlahir"  <?php echo $_SESSION['tempatlahir'];?> required="required" >
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bogor">Bogor</option>
                    <option value="Depok">Depok</option>
                   </select>
                  <div class="validation"></div>
                 </div>

                 <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal lahir" />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label>Alamat sekarang</label>
                  <textarea class="form-control" name="alamat" rows="5" id="alamat" ><?php echo $row['alamat']; ?></textarea>
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label>No Handphone</label>
                  <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?php echo $row['no_hp']; ?>" />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
              </div>
              </div>
            </div>
          </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->     

<?php include "footer.php"; ?>
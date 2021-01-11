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
         $sql = "select * from pegawai where NIP = '$id'";    
            
         $result = mysqli_query($conn, $sql); 
         if (mysqli_num_rows($result) >0) {            
          	$row = mysqli_fetch_assoc($result);         
     	 }     
      ?>          
<div class="container-fluid " ><br>
<input type="submit"  class="btn btn-danger btn-sm" name="submit" value="Kembali" onclick=self.history.back()><br><br>
</div>
<div class="login-form  container-fluid" align=center>
        
            <!-- First Column -->
        <div class="col-lg-4">
      
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Pegawai</h6>
                </div>
                <div class="card-body">
              

            <form action="Pr_Epegawai.php" method="POST">        
            
                    <input type="hidden" name="NIP" value="<?php echo $id; ?>">
                
                    <div class="form-group " align=justify>
                        <label>NIP</label>
                        <input type="text" class="form-control" name="NIP" id="NIP"  value="<?php echo $row['NIP']; ?>" readonly />
                        <div class="validation"></div>
                    </div>

                    <div class="form-group " align=justify>
                        <label>PASSWORD</label>
                        <input type="password" class="form-control" name="password" id="password"  value="<?php echo $row['password']; ?>" readonly />
                        <div class="validation"></div>
                    </div>


                        <div class="form-group" align=justify>
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['nama']; ?>" />
                        <div class="validation"></div>
                        </div>
                        <!--
                        <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" />
                        <div class="validation"></div>
                        </div>
                        <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>" />
                        <div class="validation"></div>
                        </div>
                        <div class="form-group">
                        <label>Jenis Kelamin</label></br>
                            <input type="radio" name="jk" <?=$row['jk']=="L" ? "checked" : ""?> value="L">L
                            <input type="radio" name="jk" <?=$row['jk']=="P" ? "checked" : ""?> value="P">P
                        <div class="validation"></div>
                        </div>
                        
                        <div class="form-group" align=justify>
                        <label>Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php echo $row['jabatan']; ?>" />
                        <div class="validation"></div>
                        </div>
                    
                --> 
               
                        <div class="form-group " align=justify>
                        <label>Jabatan Lama</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php echo $row['jabatan']; ?>" readonly/>
                        <div class="validation"></div>
                        <label>Jabatan Baru</label>
                            <select id="jabatan" class="form-control" name="jabatan" required="required">
                                <option value="admin">Admin</option>     
                                <option value="manajer">Manajer</option>
                                <option value="teller">Teller</option>
                                <option value="HRD">HRD</option>
                                <option value="surveyor">Surveyor</option>
                                <option value="Staff">STAFF</option>
                            </select>
                        </div>
                        
                        <div class="text-center"> 
                         <button type="submit" class="btn btn-info btn-sm btn-block" name="submit">Simpan</button>
                        </div>
                        <div id="errormessage"></div>  
                    </div>
                </div>
            </div>

            <!-- Second Column -->
            <!--
                    <div class="col-lg-4">

                    <!-- Background Gradient Utilities 
                        <div class="card shadow mb-4">       
                            <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Pegawai</h6>
                        </div>
                        <div class="card-body">
                        
                            <div class="form-group">
                            <label>Agama</label>
                            <?php $options = array("Islam", "Kristen", "Hindu", "Budha", "Katolik");?>
                            <select id="agama" class="form-control" name="agama"  value="<?php echo $row['agama']; ?>" />
                                <?php foreach ($options as $option): ?>
                                    <option value="<?php echo $option; ?>"<?php if ($row['agama'] == $option): ?> selected="selected"<?php endif; ?>>
                                        <?php echo $option; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="validation"></div>
                            </div>

                            <div class="form-group">
                            <label>Status</label>
                            <?php $options = array("Menikah", "Belum Menikah", "Duda/Janda");?>
                            <select id="status" class="form-control" name="status"  value="<?php echo $row['status']; ?>" />
                                <?php foreach ($options as $option): ?>
                                    <option value="<?php echo $option; ?>"<?php if ($row['status'] == $option): ?> selected="selected"<?php endif; ?>>
                                        <?php echo $option; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="validation"></div>
                            </div>

                            
                            <div class="form-group">
                            <label>No.Telepon</label>
                            <input type="text" class="form-control" name="no_tlp" id="no_tlp" onkeypress="return hanyaAngka(event)" value="<?php echo $row['no_tlp']; ?>" />
                            <div class="validation"></div>
                            </div>

                            <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" rows="5"><?php echo $row['alamat']; ?></textarea>
                            <div class="validation"></div>
                            </div><br>

                            <div class="text-center"> 
                            <button type="submit" class="btn btn-info btn-sm" name="submit">Simpan</button>
                            </div><br>
                        
                                -->
                

                </form>
                <!-- /.container-fluid -->
        </div>   
<?php include "footer.php"; ?>

 <script>
 function Rupiah(objek) {
    separator = ".";
    a = objek.value;
    b = a.replace(/[^\d]/g,"");
    c = "";
    panjang = b.length; 
    j = 0; 
    for (i = panjang; i > 0; i--) {
      j = j + 1;
      if (((j % 3) == 1) && (j != 1)) {
        c = b.substr(i-1,1) + separator + c;
      } else {
        c = b.substr(i-1,1) + c;
      }
    }
    objek.value = c;

  }       

  function convertToAngka()
  { var nominal= document.getElementById("nominal").value;
    var angka = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
    document.getElementById("angka").innerHTML= angka;
  }       

  function convertToAngka()
  { var nominal1= document.getElementById("nominal1").value;
    var angka1 = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
    document.getElementById("angka1").innerHTML= angka;
  }

    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
</script>
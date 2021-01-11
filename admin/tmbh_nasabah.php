<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: index.php");
    }
?>
<?php include "header.php"; ?>

      <!-- Begin Page Content -->
     <div class="container-fluid"><br>
              <input type="submit"  class="btn btn-info btn-sm" name="submit" value="Kembali" onclick=self.history.back()><br><br>

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">Tambah Anggota Baru</h1>
          <p class="mb-4">Silahkan isi formulir dibawah ini..</p>

                  <!-- Content Row -->
          <div class="row">

            <!-- First Column -->
            <div class="col-lg-4">

              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pribadi</h6>
                </div>
                <div class="card-body">   


<form action="save_nasabah.php" method="post" role="form" class="contactForm">

              
                <input type="hidden" name="submit">
              
               <div class="form-group">
                  <label>NIP</label>
                <!--  <input type="text" name="NIP" class="form-control" id="NIP" value="<?php echo $newID;?>" readonly />
                  -->
                  <input type="text" name="NIP" class="form-control" id="NIP" data-rule="required" placeholder="NIP" required="required"  />
                  <div class="validation"></div>
                </div>
               <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_nasabah" class="form-control" id="nama_nasabah" data-rule="required" placeholder="Nama Nasabah" required="required"  />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label>Passowrd</label>
                  <input type="password" name="password" class="form-control" id="password" data-rule="required" placeholder="Kata sandi" required="required"  />
                  <div class="validation"></div>
                </div>
                
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
                  <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" required="required"/>
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label>Nomor Identitas</label>
                  <input type="text" class="form-control" name="NIK" id="NIK" onkeypress="return hanyaAngka(event)"  placeholder="Nomor Identitas" required="required"/>
                  <div class="validation"></div>
                </div>
                  
            </div>
          </div>
        </div>
     

        <!-- Third Column -->
            <div class="col-lg-4">

              <!-- Grayscale Utilities -->
              <div class="card shadow mb-4">
                     <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pribadi</h6>
                </div>
                <div class="card-body">


                <label>Jenis Kelamin</label><br>
                  <input type="radio" name="jk" id="jk" value="L">Laki-laki
                  <input type="radio" name="jk" id="jk" value="P">Perempuan
                <br>
                <div class="form-group">
                <label>NO handphone</label>
                    <input type="number" class="form-control" placeholder="No Handphone" name="no_hp" id="no_hp" required="required">
                </div>


                <div class="form-group">
                        <label>Jabatan</label>
                        <select id="jabatan" class="form-control" name="jabatan"  placeholder="jabatan" required="required" >
                            <option value="Staff">Staff</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Satpam">Satpam</option>
                        </select>
                        <div class="validation"></div>
                </div>

                <div class="form-group">
                        <label>Alamat sekarang</label>
                        <textarea class="form-control" name="alamat" rows="5" id="alamat" placeholder="Alamat sekarang" ></textarea>
                        <div class="validation"></div>
                </div>

                
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
                
                <div id="errormessage"></div>                 
             </form>
              </div>
              </div>

            </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



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
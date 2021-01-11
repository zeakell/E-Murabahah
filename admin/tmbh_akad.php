<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
 <?php include "header.php"; ?>
 
        
        <div class="container-fluid " ><br>
        <input type="submit"  class="btn btn-danger btn-sm" name="submit" value="Kembali" onclick=self.history.back()><br><br>
        </div>
        
<div class="login-form  container-fluid" align=center>
        
            <!-- First Column -->
        <div class="col-lg-4">
      
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">FORM AKAD</h6>
                </div>
                <div class="card-body">
              

            <form action="Pr_Akad.php" method="POST" method="post" enctype="multipart/form-data" role="form" class="contactForm">        
            
                    
                
                    <div class="form-group " align=justify>
                        <label>No Surat</label>
                        
                        <input type="text" name="no_surat" id="no_surat" class="form-control" placeholder="Nomor Transaksi" value="<?php 
                          $query = "SELECT max(no_surat) as maxKode FROM akad";$hasil = mysqli_query($conn,$query);$data = mysqli_fetch_array($hasil);$no_surat = $data['maxKode'];$noUrut = (int) substr($no_surat, 8, 3);
                            $noUrut++;$char = date('Ymd');$no_surat = $char . sprintf("%03s", $noUrut);echo $no_surat;?>" required="required" readonly>

                        <div class="validation"></div>
                    </div>

                        <div class="form-group" align=justify>
                            <label>ID Pengajuan</label>
                            <select name="id_pemb" class="form-control" id="pembelian" required="required" >
                                <?php
                                    $query = mysqli_query($conn,"SELECT * FROM pembelian order by id_pemb desc");
                                    while ($rows= mysqli_fetch_array($query)) 
                                    {
                                ?>
                                <option value="<?php echo $rows['id_pemb'];?>">
                                <?php echo $rows['id_pemb'];?></option>
                                <?php echo $rows['id_pemb'];?>
                                <?php }?>
                            </select>

                            <div class="validation"></div>
                        </div>
                    
                        <div class="form-group" align=justify>
                            <label>NIP</label>
                            <select name="NIP" class="form-control" id="NIP" required="required" >
                                <?php
                                    $query = mysqli_query($conn,"SELECT * FROM pembelian order by id_pemb desc");
                                    while ($rows= mysqli_fetch_array($query)) 
                                    {
                                ?>
                                <option value="<?php echo $rows['NIP'];?>">
                                <?php echo $rows['NIP'];?></option>
                                <?php echo $rows['NIP'];?>
                                <?php }?>
                            </select>

                            <div class="validation"></div>
                        </div>

                        <div class="form-group " align=justify>
                        <label>Status Akad </label>
                            <select id="status_akad" class="form-control" name="status_akad" required="required">
                                <option value="Belum Realisasi">Belum Terealisasi</option>     
                                <option value="Terealisasi">Terealisasi</option>
                            </select>
                        </div>

                        <div class="form-group" align=justify>
                            <label>Unggah Bukti Transfer </label>
                            <input type="file" id="bukti_tf1" name="bukti_tf1" class="form-control" placeholder="Unggah Bukti" required="required" autofocus="autofocus">
                                        
                        </div>



                        <div class="text-center"> 
                         <button type="submit" class="btn btn-info btn-sm btn-block" name="submit">Simpan</button>
                        </div>
                        <div id="errormessage"></div> 

                    </div>
                </div>
            </div>

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
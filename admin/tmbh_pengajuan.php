<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php"; ?>

      <!-- Begin Page Content -->
             <div class="container-fluid"><br>
          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">Tambah Pengajuan Baru</h1>
          <p class="mb-4">Silahkan isi formulir dibawah ini..</p>

                  <!-- Content Row -->
          <div class="row">

            <!-- First Column -->
            <div class="col-lg-4">

              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Pembiayaan</h6>
                </div>
                <div class="card-body">     

  <?php 
         $hasil = mysqli_query($conn, "SELECT max(id_pemb) as idMaks FROM pembelian");
         $data = mysqli_fetch_array($hasil);
         $idMax = $data['idMaks'];
         $noUrut = (int) substr($idMax, 6, 8);
         $noUrut++;
         $format = "PMBL";
         $newID = $format . sprintf("%03s", $noUrut)
    ?>  



<form action="save_pengajuan.php" name="myform" method="post" role="form" class="contactForm">
           
                <input type="hidden" name="submit">
        
               <div class="form-group">
                  <label>ID Pembelian</label>
                  <input type="text" name="id_pemb" class="form-control" id="id_pemb" value="<?php echo $newID;?>" readonly/>
                  <div class="validation"></div>
                </div>
               <div class="form-group">
                  <label>ID Anggota</label>
                  <select name="NIP" class="form-control" id="data_nasabah" required="required" />
                      <?php
                        $query = mysqli_query($conn,"SELECT * FROM data_nasabah order by NIP desc");
                        while ($rows= mysqli_fetch_array($query)) {
                      ?>
                    <option value="<?php echo $rows['NIP'];?>"><?php echo $rows['NIP'];?></option>
                    <?php }?>
                  </select>
                  <div class="validation"></div>
                </div>
                
                <div class="form-group">
                      <label>Nama barang</label>
                        <select id="namabarang" class="form-control" name="namabarang" required="required" >
                          <option value="Mobil">Mobil</option>
                          <option value="Sembako">Sembako</option>
                          <option value="MOtor">Motor</option>
                        </select>
                        <div class="validation"></div>
              </div>

                <div class="form-group">
                  <label>Harga Barang</label>
                  <input type="text" class="form-control" name="hrg_barang" id="hrg_barang" placeholder="Nilai Barang" oninput="Hitung(this.value)" onchange="Amount()" autofocus="autofocus" required="required" />
                  <div class="validation"></div>
                </div>

                 <div class="form-group">
                  <label>% Margin</label>
                  <input type="text" class="form-control" name="persen_margin" id="persen_margin" placeholder="Persen Margin" required="required" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Margin</label>
                  <input type="text" class="form-control" name="margin" id="margin"  placeholder="Margin" required="required" readonly />
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Pembiayaan</h6>
                </div>
                <div class="card-body">
               
                
                <div class="form-group">
                 <label>Durasi Pembiayaan</label>
                  <select class="form-control" name="durasi_pemb" id="durasi_pemb" onchange ="Amount()" placeholder="Durasi Pembiayaan" default selected required="required" />

                  <option id="durasi_pemb" name="durasi_pemb" value="12">12 Bulan</option>

                  <option id="durasi_pemb" name="durasi_pemb" value="24">24 Bulan</option>

                  </select> 
                  <div class="validation"></div>
                </div>
                  <div class="form-group">
                  <label>Jumlah Angsuran</label>
                  <input type="text" class="form-control" name="angsuran" id="angsuran" placeholder="Jumlah Angsuran" required="required" readonly />
                  <div class="validation"></div>
                </div>
                
                <div class="form-group">
                  <label>Total Harga Pengajuan Pembelian</label>
                  <input type="text" class="form-control" name="jml_pemb" id="jml_pemb"  placeholder="Total Harga Pengajuan Pembelian" required="required" readonly />
                  <div class="validation"></div>
                </div>
                
                <div class="form-group">
                  <label>Tujuan Pengajuan Pembelian</label>
                  <input type="text" class="form-control" name="keperluan" id="keperluan"  placeholder="Tujuan Pengajuan Pembiayaan" required="required"  />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label>Tanggal mulai</label>
                  <input type="date" class="form-control" name="tgl_pembelian" id="tgl_pembelian" placeholder="Tanggal pembelian" />
                  <div class="validation"></div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-sm btn-block" name="submit">Simpan</button>
                    <input type="submit"  class="btn btn-danger btn-sm btn-block" name="submit" value="Kembali" onclick=self.history.back()><br>
                </div>
        
                <div id="errormessage"></div>    
           </form>
       
      </div>
    </div>
 

<script>
          function Hitung(val) {
            if (val<=10000000) {
              var nilMar = val * 2.5/100;
              var nilPemb = parseInt(val) + parseInt(nilMar); 
              var persen = "2.5%";  
            }
            else if (val>10000000){
              var nilMar = val * 2/100;
              var nilPemb = parseInt(val) + parseInt(nilMar); 
              var persen = "2%";  
            }
            /*display the result*/
            var divobj = document.getElementById('margin');
            divobj.value = nilMar;

            var divobjp = document.getElementById('persen_margin');
            divobjp.value = persen;

            
          }

        function Amount() {
          var x = document.myform.hrg_barang.value;
          var y = document.myform.durasi_pemb.value;
          var z = document.myform.margin.value;
            var tot_price = (parseInt(x/y)+ parseInt(z));
           
            //tot_price = nilMar
            /*display the result*/
            var divobja = document.getElementById('angsuran');
            divobja.value = tot_price;//nilai angsuran

          var a = document.myform.angsuran.value;
          var b = document.myform.durasi_pemb.value;
          var  tot_pemb = parseInt(a) * parseInt(b);

            var divobjt = document.getElementById('jml_pemb');
            divobjt.value = tot_pemb;
        }
</script>

<?php include "footer.php"; ?>
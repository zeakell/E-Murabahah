<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php"; ?>

      <!-- Begin Page Content -->
        <div class="container-fluid"><br>
              <input type="submit"  class="btn btn-info btn-sm" name="submit" value="Kembali" onclick=self.history.back()><br><br>

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">Tambah Angsuran</h1><br>
          


              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Angsuran</h6>
                </div>
                <div class="card-body">  

    <h3> <center> <form action="tbayar.php" method="get">
      <label>ID pembelian :</label>
      <input type="text" name="cari">
      <input type="submit" class="btn btn-info btn-lg" value="Cari" >
    </form></center></h3>


    <?php 
    if(isset($_GET['cari'])){
      $cari = $_GET['cari'];
      $data = mysqli_query($conn, "SELECT pembelian.id_pemb, pembelian.status_pemb, pembelian.angsuran, pembelian.NIP, data_nasabah.nama_nasabah  from pembelian JOIN data_nasabah on pembelian.NIP=data_nasabah.NIP where pembelian.id_pemb='$cari'");

$d = mysqli_fetch_array($data);
$c= $d['status_pemb']; ?> 
 <?php if ((!isset($d))||($c=="SELESAI")){
  echo "<center><b>pembelian YANG ANDA CARI TIDAK ADA ATAU pembelian TELAH SELESAI, SILAHKAN HUBUNGI ADMIN UNTUK CEK STATUS pembelian</b></center>";
 }
 else { ?>

 <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Input Pembayaran</div>
        <div class="card-body">
            <form method="post" action="tinputtransaksi.php">
                <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-4">
                      <div class="form-label-group">
                        <input type="text" name="no_transaksi" id="no_transaksi" class="form-control" placeholder="Nomor Transaksi" value="<?php 
                          $query = "SELECT max(no_transaksi) as maxKode FROM angsuran";$hasil = mysqli_query($conn,$query);$data = mysqli_fetch_array($hasil);$no_transaksi = $data['maxKode'];$noUrut = (int) substr($no_transaksi, 8, 3);
                            $noUrut++;$char = date('dmY');$no_transaksi = $char . sprintf("%03s", $noUrut);echo $no_transaksi;?>" required="required" readonly>
                        <label for="no_transaksi">Nomor Transaksi</label>
                      </div>
                      </div>

                        <div class="col-md-4">
                        <div class="form-label-group">
                   <input type="text" name="id_pemb" id="id_pemb" class="form-control" placeholder="ID pembelian" value="<?php echo $d['id_pemb']?>" required="required" readonly>
                        <label for="id_pemb">ID pembelian</label>
                  </div>
                  </div>
                       <div class="col-md-4">
                       <div class="form-label-group">
                    <input type="text" name="NIP" id="NIP" class="form-control" value="<?php echo $d['NIP']?>" placeholder="ID Anggota" required="required" readonly>
                        <label for="NIP">NIP</label>
                  </div>
                  </div>
                  
                    </div>
                </div>
                 <div class="form-group">
                    <div class="form-row">
                   
                       <div class="col-md-6">
                       <div class="form-label-group">
                      <input type="text" name="nama_nasabah" id="nama_nasabah" class="form-control" value="<?php echo $d['nama_nasabah']?>" placeholder="nama_nasabah" required="required" readonly>
                        <label for="nama_nasabah">Nama Nasabah</label>
                  </div>
                  </div>
                        <div class="col-md-6">
                       <div class="form-label-group"> 
                    <input type="text" name="nama_pembayar" id="nama_pembayar" class="form-control" placeholder="Nama Pembayar" required="required">
                        <label for="nama_pembayar">Nama Pembayar</label> 
                  </div>
                  </div>
                  
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                        <div class="form-label-group">
                   <input type="text" name="angsuran_ke" id="angsuran_ke" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Angsuran ke" required="required"> <?/*php 
                      $angsuran = "SELECT max(angsuran_ke) as maxKode FROM angsuran";$hasil1 = mysqli_query($conn,$angsuran);$data1 = mysqli_fetch_array($hasil1);
                      $angsuran = $data1['maxKode']; 
                      $angsuran++;
                      echo $angsuran;*/?> 
                        <label for="angsuran_ke">Angsuran ke</label>
                  </div>
                  </div>  
                       <div class="col-md-6">
                       <div class="form-label-group"> 
                    <input type="date" name="tgl_bayar" id="tgl_bayar"  class="form-control" placeholder="Tanggal Bayar" value="<?php $tgl= date("d-F-Y"); echo $tgl;?>" required="required">
                        <label for="tgl_bayar">Tanggal Pembayaran</label> 
                  </div>
                  </div>
                  </div>
                </div>           
                    <div class="form-group">
                    <div class="form-row">
                       <div class="col-md-6">
                       <div class="form-label-group">
<input type="text" name="jml_bayar" id="jml_bayar" onkeypress="return hanyaAngka(event)" class="form-control"  value="<?php echo$d['angsuran']?>" readonly/>
                        <label for="jml_bayar">Jumlah Bayar</label>
                  </div>
                  </div>
                

                <div class="col-md-6">
                       <div class="form-label-group"> 
                    <input type="text" name="bilang_angsuran" id="bilang_angsuran" class="form-control" placeholder="Terbilang Angsuran" required="required">
                        <label for="bilang_angsuran">Terbilang Angsuran</label> 
                  </div>
                  </div>
                  
                    </div>
                </div>

            <input type="submit" class="btn btn-info btn-block"  value="INPUT TRANSAKSI"> 
              </div>
          </form>


<?php }} ?>
                
                
                    
        </div>
      </div>
    </div>
    </div>
 
</table>

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
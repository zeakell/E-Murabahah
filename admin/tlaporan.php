<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php
include "header.php";
include "koneksi.php";
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];

$query=mysqli_query($conn,"select data_nasabah.nama_nasabah, data_nasabah.NIP, pembelian.id_pemb, pembelian.tgl_pembelian, pembelian.sisa_angsuran, angsuran.* from angsuran join (pembelian join data_nasabah on pembelian.NIP=data_nasabah.NIP) on angsuran.id_pemb=pembelian.id_pemb where (tgl_bayar BETWEEN '$awal' and '$akhir' ) ");

?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Tabel Data Transaksi
              
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO TRANSAKSI</th>
                      <th>NAMA NASABAH</th>
                      <th>ANGSURAN KE</th>
                      <th>JUMLAH BAYAR</th>              
                      <th>TANGGAL TRANSAKSI</th>
                    </tr>
                  </thead>
                  
                 <tbody>
            
            <?php
          $c=0;
          while ($row=mysqli_fetch_array($query)) 
          {
          ?>

    <tr>
    <td><?php echo $row['no_transaksi'];?></td>
    <td><?php echo $row['nama_nasabah'];?></td>
    <td><?php echo $row['angsuran_ke'];?></td>
    <td><?php echo "Rp. ".number_format($row['jml_bayar']);?></td>
    <td><?php echo $row['tgl_bayar'];?></td>
    
     
    </tr> 
    <?php
    }
    $beban = mysqli_query($conn,"select SUM(jml_bayar) as jumlah FROM angsuran where tgl_bayar BETWEEN '$awal' and '$akhir'");
    $beban1=mysqli_fetch_array($beban);
  $beban2=$beban1['jumlah'];
?>

        </tbody>

    </table> 
<div> TOTAL PENERIMAAN ANGSURAN PEMBAYARAN ADALAH <b> <?php echo "Rp. ".number_format($beban2); ?> </b>
                     

        </tbody>
    </table> 


              </div>
              
            </div>
          <div class="col-md-3">
                     <a class="btn btn-info btn-block" href="cetaklapor.php?awal=<?php echo $awal ;?>&&akhir=<?php echo $akhir; ?>">Cetak Laporan</a>
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

   <?php include 'footer.php' ?>

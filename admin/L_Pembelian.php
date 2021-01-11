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

/*$query=mysqli_query($conn,"SELECT data_nasabah.nama_nasabah, pembelian.jml_pemb, pembelian.sisa_angsuran, angsuran.* from angsuran inner join (pembelian inner join data_nasabah on pembelian.NIP=data_nasabah.NIP) on pembelian.id_pemb=angsuran.id_pemb where (tgl_bayar BETWEEN '$awal' and '$akhir' ) ");*/

$query = mysqli_query($conn, "SELECT data_nasabah.NIP, data_nasabah.nama_nasabah, pembelian.id_pemb, pembelian.hrg_barang, pembelian.margin, pembelian.jml_pemb, pembelian.durasi_pemb, pembelian.status_pemb,  pembelian.keperluan, pembelian.tgl_pembelian from data_nasabah join pembelian on data_nasabah.NIP=pembelian.NIP where tgl_pembelian   order by id_pemb asc");
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
                      
                      <th>ID Pembelian</th>
                      <th>Nama Pemohon</th>
                      <th>Harga Barang</th>
                      <th>Margin</th>
                      <th>Jumlah pembelian</th>
                      <th>Tenor</th>
                      <th>Status pembelian</th>
                      <th>Keterangan</th>
                          
                      
                   
                    </tr>
                  </thead>
                  
                 <tbody>
            
            <?php
          $c=0;
          while ($rows=mysqli_fetch_array($query)) 
          {
          ?>

    <tr>
        
        <td><?php echo $rows['id_pemb']; ?></td>
        <td><?php echo $rows['nama_nasabah']; ?></td>
        <td><?php echo "Rp. ".number_format($rows['hrg_barang']); ?></td>
        <td><?php echo "Rp. ".number_format($rows['margin']); ?></td>
        <td><?php echo "Rp. ".number_format($rows['jml_pemb']); ?></td>
        <td><?php echo $rows['durasi_pemb']; ?></td>
        <td><?php echo $rows['status_pemb']; ?></td>
        <td><?php echo $rows['keperluan']; ?></td>
    
     
    </tr> 
  <?php
    };
        $beban = mysqli_query($conn,"select SUM(hrg_barang) as jumlah FROM pembelian where tgl_pembelian");
        $beban1=mysqli_fetch_array($beban);
        $beban2=$beban1['jumlah'];

        $margin = mysqli_query($conn, "select SUM(margin) as jumlah1 from pembelian where tgl_pembelian");
        $margin1=mysqli_fetch_array($margin);
        $margin2=$margin1['jumlah1'];

?>

        </tbody>

    </table> 
            <div> TOTAL REALISASI PEMBELIAN MURABAHAH ADALAH <b> 
            <?php echo "Rp. ".number_format($beban2); ?> </b>
                     

        </tbody>
    </table> 


              </div>
              
            </div>
          <div class="col-md-3">
                     <a class="btn btn-info btn-block" href="C_LPemb.php?awal=<?php echo $awal ;?>&&akhir=<?php echo $akhir; ?>">CETAK</a>
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

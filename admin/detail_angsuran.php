<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php include "header.php"; 
include('koneksi.php');
$id_pemb = $_GET['id_pemb'];
$query=mysqli_query($conn,"select data_nasabah.nama_nasabah, data_nasabah.NIP, pembelian.id_pemb, pembelian.tgl_pembelian, pembelian.sisa_angsuran, angsuran.* from angsuran join (pembelian join data_nasabah on pembelian.NIP=data_nasabah.NIP) on angsuran.id_pemb=pembelian.id_pemb where pembelian.id_pemb = '$id_pemb'");

$row1=mysqli_fetch_array($query);
?>

 <!--==========================
      View Data Keuangan
    ============================-->

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 

<!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<section id="pendaftaran"  class="section-bg">

      <div class="container">


<?php 
        $id_pemb = $_GET['id_pemb'];
         $sql = "select * from angsuran where id_pemb='$id_pemb'";         
         $result = mysqli_query($conn, $sql); ?> 

         <!-- Begin Page Content -->
        <div class="container-fluid"><br>
              <input type="submit"  class="btn btn-info btn-sm" name="submit" value="Kembali" onclick=self.history.back()><br>

          <!-- Page Heading -->
          <br><br>
          <!-- DataTales Example -->
          <center> <h1>DETAIL TRANSAKSI PEMBAYARAN ANGSURAN NASABAH </h1></center>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
            <h4><b>ID NASABAH : <?php echo $row1['NIP'];?></b> </h4>
            <h4><b>Nama Nasabah : <?php echo $row1['nama_nasabah'];?></b> </h4>
            <h4><b>ID pembelian : <?php echo $row1['id_pemb'];?></b></h4>
            <h4><b>JATUH TEMPO  : <?php echo $row1['tgl_pembelian'];?></b></h4>


            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>           
               <tr>                 
                <th>No.Transaksi</th>
                <th>Angsuran Ke</th>
                <th>Jumlah Bayar</th>
                <th>Nama Pembayar</th>
                <th>Tanggal Bayar</th> 
                 
                           
                </tr>         
               </thead>         
              <tbody>             
                <?php      
                $no = 1;                 
                while($row = mysqli_fetch_assoc($result)) { ?>                         
                <tr>                             
                  <td><?php echo $row['no_transaksi'];?></td>
                  <td><?php echo $row['angsuran_ke'];?></td>
                  <td><?php echo $row['jml_bayar'];?></td>
                  <td><?php echo $row['nama_pembayar'];?></td>
                  <td><?php echo $row['tgl_bayar'];?></td>
                                    
                                  
                </tr>                    
                 <?php $no++; } ?>        
              </tbody>
                </table>
                <h4><b> SISA ANGSURAN = RP.<?php echo $row1['sisa_angsuran'];?> ,-</b></h4>


              </div>
              <div class="col-md-3">
              <a href="cetak_data_angsuran.php?id_pemb=<?php echo $id_pemb; ?>" class="btn btn-info btn-block"> CETAK </a> 
              </div>
              


              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>


      <!-- End of Main Content -->
      <?php include "footer.php"; ?>
      
      <!-- Page level plugins -->
      
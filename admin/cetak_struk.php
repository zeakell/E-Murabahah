<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>

<?php 
include 'koneksi.php';
    date_default_timezone_set('Asia/Jakarta');
    
$id_pemb = $_POST['id_pemb'];

$no_transaksi = $_GET['no_transaksi'];

$query = mysqli_query($conn,  "select angsuran.no_transaksi, angsuran.angsuran_ke, angsuran.jml_bayar, angsuran.tgl_bayar, data_nasabah.nama_nasabah, pembelian.sisa_angsuran FROM (angsuran JOIN pembelian on pembelian.id_pemb = angsuran.id_pemb) JOIN data_nasabah on pembelian.NIP = data_nasabah.NIP where pembelian.id_pemb='$id_pemb'" ); 
$rows = mysqli_fetch_array($query);
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/icon" href="../img/KOSIKA.png">
	<title>CETAK STRUK | KOSIKA TAZKIA</title>
</head>

<body id="page-top">
	<form method="post" name="form1" action="proses.php">
		
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        
      </form>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          
          <!-- DataTables Example -->
          <div>
      <h1 align="center">
      <img src="../img/KOSIKA.png" width="150" height="150" /><br>  
            BUKTI PEMBAYARAN TRANSAKASI ANGSURAN <BR> KOSIKA TAZKIA
      </h1>

      <hr>
      <br>

          <?php
          $d=date("d-F-Y"); ?>
           
              <p>Customer Service : <?php echo $_SESSION['user'];?></p>
              <p>Tanggal Pembayaran :<?php echo $d; ?></p>
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                	<thead>
                		<tr>
									<th>No.</th>
									<th>No.Transaksi</th>
					                <th>Nama Nasabah</th>
					                <th>Angsuran Ke</th>
					                <th>Jumlah Bayar</th>
					                <th>Sisa Angsuran</th>
					                <th>Tanggal Bayar</th>
					</tr>
                	</thead>

						<?php
                            $query = mysqli_query($conn,  "SELECT data_nasabah.nama_nasabah, data_nasabah.NIP, angsuran.* from angsuran join (pembelian join data_nasabah on pembelian.NIP=data_nasabah.NIP) on pembelian.id_pemb=angsuran.id_pemb where no_transaksi=$no_transaksi");
                            $no =1;
                            while ($rows = mysqli_fetch_array($query)) {

						?>
                    <tr>
                        <td><?php echo $no++;?>.</td>
                        <td><?php echo $rows['no_transaksi'];?></td>
                        <td><?php echo $rows['nama_nasabah'];?></td>
                        <td><?php echo $rows['angsuran_ke'];?></td>
                        <td><?php echo "Rp. ".number_format($rows['jml_bayar']);?></td>
                        <td><?php echo $rows['bilang_angsuran'];?></td>
        
                        <td><?php echo $rows['tgl_bayar'];?></td>

                    </tr>

                    <?php
                        };
                        $beban = mysqli_query($conn,"select (jml_bayar) as jumlah FROM angsuran where no_transaksi='$no_transaksi' ");
                        $beban1=mysqli_fetch_array($beban);
                        $beban2=$beban1['jumlah'];

                    ?>
                    </table>
        <div class="col-md-3"><br><br>
                    
                  </div><p align="right"> TOTAL PENERIMAAN PEMBAYARAN ANGSURAN ADALAH  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<b> <?php echo "Rp. ".number_format($beban2); ?> ,- </b>
                  <p align="right"> Diterima oleh, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Disetor oleh,</p>
                  <p align="right"> Admin  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Nasabah</p>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <p align="right">_________________________  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;_________________________</p>
              </div>
			<hr>
      
          </form>
	</body>

				
        <script>
            window.print();
        </script>
</html>
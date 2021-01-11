<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php 
include"koneksi.php";
    date_default_timezone_set('Asia/Jakarta');
$awal = $_GET['awal'];
$akhir = $_GET['akhir'];
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/icon" href="../img/KOSIKA.png">
	<title>CETAK LAPORAN TRANSAKSI PEMBELIAN AKAD MURABAHAH | KOSIKA TAZKIA</title>
</head>
	<form method="post" name="form1" action="cetak.php">
		
		<div>

            <h1 align="center">
                <img src="../img/KOSIKA.png" width="150" height="150" /><br>  
                LAPORAN DATA PEMBELIAN AKAD MURABAHAH <BR> KOSIKA TAZKIA
            </h1>
            <hr>
            <br>
			<div>
<?php
          $d=date("d-F-Y"); ?>
           

              <p>Customer Service : <?php echo $_SESSION['user'];?></p>
              <p>Tanggal :<?php echo $d; ?></p>
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
									<th>No.</th>
									<th>ID pembelian</th>
									<th>Nama Pemohon</th>
									<th>Nilai pembelian</th>
									<th>Margin</th>
									<th>Jumlah pembelian</th>
									<th>Tenor</th>
									<th>Status pembelian</th>
									<th>Keterangan</th>
									

						<?php
						$query = mysqli_query($conn, "SELECT data_nasabah.NIP, data_nasabah.nama_nasabah, pembelian.id_pemb, pembelian.hrg_barang, pembelian.margin, pembelian.jml_pemb, pembelian.durasi_pemb, pembelian.status_pemb,  pembelian.keperluan, pembelian.tgl_pembelian from data_nasabah join pembelian on data_nasabah.NIP=pembelian.NIP where tgl_pembelian   order by id_pemb asc"); /*angsuran.id_angsuran, angsuran.tgl_bayar, angsuran.nama_pembayar, angsuran.angsuran_ke, angsuran.jml_bayar, angsuran.sisa_angsuran, pembelian.id_pemb, pembelian.jml_pinjaman, pembelian.status_akad from pembelian inner join angsuran on pembelian.id_pemb=angsuran.id_pemb order by id_angsuran asc");*/
						$no =1;
						while ($rows = mysqli_fetch_array($query)) {

						?>
			<tr>
				<td><?php echo $no++;?>.</td>
				<td><?php echo $rows['id_pemb']; ?></td>
				<td><?php echo $rows['nama_nasabah']; ?></td>
				<td><?php echo "Rp. ".number_format($rows['hrg_barang']); ?></td>
				<td><?php echo "Rp. ".number_format($rows['margin']); ?></td>
				<td><?php echo "Rp. ".number_format($rows['jml_pemb']); ?></td>
				<td><?php echo $rows['durasi_pemb']; ?></td>
				<td><?php echo $rows['status_pemb']; ?></td>
				<td><?php echo $rows['keperluan']; ?></td>

			<?php
    };
       $beban = mysqli_query($conn,"select SUM(hrg_barang) as jumlah FROM pembelian where tgl_pembelian  ");
    $beban1=mysqli_fetch_array($beban);
  $beban2=$beban1['jumlah'];

  $margin = mysqli_query($conn, "select SUM(margin) as jumlah1 from pembelian where tgl_pembelian ");
  $margin1=mysqli_fetch_array($margin);
  $margin2=$margin1['jumlah1'];

?>
					</body>

				</table>
<div class="col-md-3"><br><br>
                    
                  </div><p align="right"> TOTAL REALISASI pembelian MURABAHAH ADALAH  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<b> <?php echo "Rp. ".number_format($beban2); ?> ,- </b><br>
                  <p align="right"> TOTAL MARGIN pembelian MURABAHAH ADALAH  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<b> <?php echo "Rp. ".number_format($margin2); ?> ,- </b>
                  <p align="right"> Diketahui oleh, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Disetor oleh,</p>
                  <p align="right"> Manajer  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Customer Service</p>
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
             <script>
	window.print();
</script> 

	</form>

	<br><br>
</div>
</div>
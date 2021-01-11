<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<?php
include 'koneksi.php';

$no_transaksi = $_POST['no_transaksi'];
$id_pemb = $_POST['id_pemb'];
$nama_pembayar = $_POST['nama_pembayar'];
$angsuran_ke = $_POST['angsuran_ke'];
$tgl_bayar = $_POST['tgl_bayar'];
$jml_bayar = $_POST['jml_bayar'];
$bilang_angsuran =$_POST['bilang_angsuran'];
$id_peg = $_SESSION['user'];

$sql = mysqli_query($conn,"SELECT sisa_angsuran from pembelian where id_pemb='$id_pemb'");
if($sql){
$ambil = mysqli_fetch_array($sql);
$nilai= $ambil['sisa_angsuran'];
$x = $nilai;
$y = $jml_bayar;
$sisa= ($x-$y);
$d = date("Y-m-d");
	$sql = "SELECT max(id_jurnal) as maxKode FROM jurnal";
    $hasil = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($hasil);
    $id_jurnal = $data['maxKode'];
    $noUrut = (int) substr($id_jurnal, 8, 3);
    $noUrut++;$char = date('Ymd');
    $id_jurnal = $char . sprintf("%03s", $noUrut);

	if($sisa<=0){
		$sisa = 0;
		$hasil = mysqli_query($conn,"UPDATE pembelian set sisa_angsuran=$sisa, status_pemb='SELESAI', tgl_selesai='$d' where id_pemb='$id_pemb'");
		$hasil2 = mysqli_query($conn,"update data_nasabah set pembelian='TIDAK AKTIF' where NIP='$NIP'");

	  if(($hasil)&&($hasil2)){
		$query = mysqli_query($conn,"INSERT INTO angsuran (no_transaksi,  angsuran_ke, id_pemb, jml_bayar, nama_pembayar, tgl_bayar,  bilang_angsuran) VALUES('$no_transaksi', '$angsuran_ke',  '$id_pemb', '$jml_bayar', '$nama_pembayar', '$tgl_bayar', '$jml_bayar', '$bilang_angsuran')");
		if($query){
					header('Location:tabel_angsuran.php');
				}
				else {
					echo "Form Tidak Boleh Kosong7 <br>";
					echo "<a href='tbayar.php'>Kembali ke Form</a>";
					}
				

	}
						else{
								echo "Form Tidak Boleh Kosong6 <br>";
								echo "<a href='tbayar.php'>Kembali ke Form</a>";
							}
}



else
{
	$hasil = mysqli_query($conn,"UPDATE pembelian SET sisa_angsuran = $sisa where id_pemb='$id_pemb'");
	if($hasil){	
	$query = mysqli_query($conn,"INSERT INTO angsuran (no_transaksi, id_pemb, nama_pembayar, angsuran_ke, tgl_bayar, jml_bayar, bilang_angsuran) VALUES('$no_transaksi', '$id_pemb', '$nama_pembayar', '$angsuran_ke', '$tgl_bayar', '$jml_bayar', '$bilang_angsuran')");
	if($query){
		
					header('Location:tabel_angsuran.php');
					}
					else{
						echo "Form Tidak Boleh Kosong8 <br>";
					echo "<a href='tbayar.php'>Kembali ke Form</a>";
					}
					
			}
	
		}
	

		}


?>
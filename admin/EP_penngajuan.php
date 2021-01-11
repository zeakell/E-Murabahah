<?php
	include ('koneksi.php');

	if (isset($_POST['submit'])) { 
	$id=$_POST['id_pemb'];
	$id_anggota = $_POST['NIP'];
	$hrg_barang = $_POST['hrg_barang'];
	$persen_margin = $_POST['persen_margin'];
	$margin = $_POST['margin'];
	$durasi_pemb = $_POST['durasi_pemb'];
	$angsuran = $_POST['angsuran'];
	$sisa_angsuran = $_POST['sisa_angsuran'];
	$realisasi = $_POST['realisasi'];
//	$tgl_realisasi = $_POST['tgl_realisasi'];
	$status_pemb= $_POST['status_pemb'];
	
	//cek apakah angsuran sudah lunas atau belum

	$sql = "UPDATE pembelian SET hrg_barang='$hrg_barang', persen_margin='$persen_margin', margin='$margin', durasi_pemb='$durasi_pemb', angsuran='$angsuran', sisa_angsuran='$sisa_angsuran',  realisasi='$realisasi', status_pemb='$status_pemb' WHERE id_pemb='$id'";

	if (mysqli_query($conn, $sql) ) {
		echo "Record edited  succesfully";
		header("location: pengajuan.php"); 
	} else {         
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);     
     } 
      }           
     mysqli_close($conn); 
?> 
 
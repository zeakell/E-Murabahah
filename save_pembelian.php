<?php
	include ('koneksi.php');

	if (isset($_POST['submit'])) { 

	$id_pemb = $_POST['id_pemb'];
	$NIP = $_POST['NIP'];
	$namabarang = $_POST['namabarang'];
	$hrg_barang = $_POST['hrg_barang'];
	$persen_margin = $_POST['persen_margin'];
	$margin = $_POST['margin'];
	$durasi_pemb = $_POST['durasi_pemb'];
	$angsuran = $_POST['angsuran'];
	$jml_pemb = $_POST['jml_pemb'];
	$keperluan = $_POST['keperluan'];
	$tgl_pembelian = $_POST['tgl_pembelian'];	

	$sql = "insert into pembelian (id_pemb, NIP, namabarang, hrg_barang, persen_margin, margin, jml_pemb, durasi_pemb, angsuran, sisa_angsuran, realisasi, tgl_realisasi, status_pemb, keperluan, tgl_pembelian) values ( '$id_pemb', '$NIP', '$namabarang', '$hrg_barang', '$persen_margin', '$margin', '$jml_pemb', '$durasi_pemb', '$angsuran',  '$sisa_angsuran', 'Ditangguhkan', '2020-08-07', 'Belum Mulai', '$keperluan', '$tgl_pembelian')";

	if (mysqli_query($conn, $sql) ) {
		echo "<script>alert('Data Anda Sudah dikirim');window.location='data_jaminan.php'</script>";
	} else {         
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);     
     } 
      }           
     mysqli_close($conn); ?> 
 
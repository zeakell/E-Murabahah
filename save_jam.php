<?php
	include ('koneksi.php');

	if (isset($_POST['submit'])) { 
	$id_jaminan = $_POST['id_jaminan'];
	$NIP=$_POST['NIP'];
	$jns_jaminan= $_POST['jns_jaminan'];
	$alamat = $_POST['alamat'];
	$th_dibangun = $_POST['th_dibangun'];
	$luas_bangunan = $_POST['luas_bangunan'];
	$luas_tanah = $_POST['luas_tanah'];
	$harga_taksiran = $_POST['harga_taksiran'];
	
	$stat_tanah = $_POST['stat_tanah'];
	$bentuk_surat = $_POST['bentuk_surat'];
	$pemilik_jaminan = $_POST['pemilik_jaminan'];
	$merk_kendaraan = $_POST['merk_kendaraan'];
	$type = $_POST['type'];
	$tahun = $_POST['tahun'];
	$warna = $_POST['warna'];
	$no_polisi = $_POST['no_polisi'];
	$no_BPKB = $_POST['no_BPKB'];
	$no_mesin = $_POST['no_mesin'];
	$nama_di_BPKB= $_POST['nama_di_BPKB'];
	$harga_kendaraan = $_POST['harga_kendaraan'];
	

	$sql = "insert into jaminan (id_jaminan, NIP, jns_jaminan, alamat, th_dibangun, luas_bangunan, luas_tanah, harga_taksiran,  stat_tanah, bentuk_surat, pemilik_jaminan, merk_kendaraan, type, tahun, warna, no_polisi,  no_BPKB, no_mesin, nama_di_BPKB, harga_kendaraan ) values ('$id_jaminan', '$NIP', '$jns_jaminan', '$alamat', '$th_dibangun', '$luas_bangunan',  '$luas_tanah', '$harga_taksiran', '$stat_tanah', '$bentuk_surat', '$pemilik_jaminan', '$merk_kendaraan', '$type', '$tahun', '$warna', '$no_polisi', '$no_BPKB', '$no_mesin', '$nama_di_BPKB', '$harga_kendaraan')";

	if (mysqli_query($conn, $sql) ) {
		 echo "<script>alert('Data Anda Sudah dikirim');window.location='data_referensi.php'</script>";

	
		} else {         
	      echo "Error: " . $sql . "<br>" . mysqli_error($conn);     
	     } 
          }           
mysqli_close($conn); ?> 
	 
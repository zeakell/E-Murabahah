<?php
	include ('koneksi.php');

	if (isset($_POST['submit'])) { 

		$id_keu = $_POST['id_keu'];
		$NIP = $_POST['NIP'];
		$peng_bersih= $_POST['peng_bersih'];
		$peng_bersih_istri = $_POST['peng_bersih_istri'];
		$peng_tambahan = $_POST['peng_tambahan'];
		$pengeluaran = $_POST['pengeluaran'];
		$jns_pembelian = $_POST['jns_pembelian'];
		$jml_pembelian= $_POST['jml_pembelian'];
		$nama_kreditur = $_POST['nama_kreditur'];
		$tgl_tempo = $_POST['tgl_tempo'];


		$sql = "insert into data_keuangan (id_keu, NIP, peng_bersih, peng_bersih_istri, peng_tambahan, pengeluaran, jns_pembelian, jml_pembelian, nama_kreditur, tgl_tempo) values ('$id_keu', '$NIP', '$peng_bersih', '$peng_bersih_istri', '$peng_tambahan', '$pengeluaran', '$jns_pembelian', '$jml_pembelian', '$nama_kreditur', '$tgl_tempo')";

		if (mysqli_query($conn, $sql) ) {
			echo "<script>alert('Data Anda telah tersimpan');window.location='data_keuangan.php'</script>";
		} else {
			echo "Error: ". $sql . "<br>" . mysqli_error($conn);
		}
	mysqli_close($conn);
	}
	
?>
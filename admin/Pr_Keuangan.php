<?php include('koneksi.php');

	if (isset($_POST['id_keu'])) { 
		$id=$_POST['id_keu'];
		
		$peng_bersih= $_POST['peng_bersih'];
		$peng_bersih_istri = $_POST['peng_bersih_istri'];
		$peng_tambahan = $_POST['peng_tambahan'];
		$pengeluaran = $_POST['pengeluaran'];
		$jns_pembelian = $_POST['jns_pembelian'];
		$jml_pembelian= $_POST['jml_pembelian'];
		$nama_kreditur = $_POST['nama_kreditur'];
		$tgl_tempo = $_POST['tgl_tempo'];
	

	$sql = "UPDATE data_keuangan SET peng_bersih='$peng_bersih', peng_bersih_istri='$peng_bersih_istri', peng_tambahan='$peng_tambahan', pengeluaran='$pengeluaran', jns_pembelian='$jns_pembelian', jml_pembelian='$jml_pembelian', nama_kreditur='$nama_kreditur', tgl_tempo='$tgl_tempo' WHERE id_keu='$id'" ;

	if (mysqli_query($conn, $sql) ) {
		echo "Record edited successfully";
		header("location: data_keuangan.php"); 
	} else {         
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);     
     } 
      }           
     mysqli_close($conn); ?> 
 
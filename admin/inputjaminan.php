<?php
include 'koneksi.php';

$id_pemb= $_POST['id_pemb'];     
$tgl_terima = date("Y-m-d");
$query = "update jaminan set tgl_terima ='$tgl_terima', status_jaminan ='DISIMPAN' where id_pemb='$id_pemb'";

if (mysqli_query($conn, $query) ){

 header("location: tabel_jaminan2.php");
 }
else
{
	echo "Form Tidak Boleh Kosong <br>";
		echo "<a href='mohonjaminan.php'>Kembali ke Form</a>";
}


?>


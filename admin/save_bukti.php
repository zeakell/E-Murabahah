<?php
include "koneksi.php";

$id_pemb = $_POST['id_pemb'];

$bukti_tf = $_FILES['bukti_tf']['name'];
$source = $_FILES['bukti_tf']['tmp_name'];
$fotobukti_tf = date('dmYHis').$bukti_tf;
$pathbukti_tf = 'img/buktitf/'.$fotobukti_tf;
		
	$pindah = move_uploaded_file($source, $pathbukti_tf);
		

if($pindah)
{
	$query=mysqli_query($conn,"update akad set bukti_tf='$fotobukti_tf' where id_pemb='$id_pemb'");
	
	if($query){

			echo "Berhasil input data<br>";
			header('Location:  tabel_akad.php');
		}
	}
else
{
	echo "Gagal update data";
	echo "<a href='tabel_akad.php'>Kembali ke Form</a>";
}

?>
<?php
include 'koneksi.php';

	
	if (isset($_POST['submit'])) { 
		
	$id_pemb=$_POST['id_pemb'];
	$NIP = $_POST['NIP'];
	$hrg_barang = $_POST['hrg_barang'];
	$durasi_pemb = $_POST['durasi_pemb'];
	$angsuran = $_POST['angsuran'];
	$keperluan = $_POST['keperluan'];
	$jml_pemb = $_POST['jml_pemb'];

	$status_akad=$_POST['realisasi'];

	$tgl_pembelian =$_POST['tgl_pembelian'];

	$sql = "UPDATE pembelian SET tgl_pembelian='$tgl_pembelian', status_pemb='BERJALAN', keperluan='$keperluan', sisa_angsuran='$jml_pemb' where id_pemb='$id_pemb'";

	if (mysqli_query($conn, $sql)) {  
                    $sql1=mysqli_query($conn,"INSERT INTO akad VALUES('','$id_pemb','$NIP','$status_akad','')");
                    if($sql1){
                    
                        echo "Berhasil input data<br>";
                        header('Location:data_pemb.php');
                
                        }
                        else{
							echo "Berhasil input data<br>";
							header('Location:data_pemb.php');
                        }
            }
}

?>
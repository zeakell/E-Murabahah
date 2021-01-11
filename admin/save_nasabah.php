<?php
	include ('koneksi.php');

	/*$cari_kd=mysql_query("select max(NIP) as kode from anggota")
	$tm_cari=mysql_fetch_array($cari_kd); 
	$kode=substr($tm_cari['kode'], 1,4);
	$tambah=$kode+1;
		if($tambah<10){
			$NIP="NAS0".$tambah;
		} else {
			$NIP="NAS".$tambah
		}
*/

	if (isset($_POST['submit'])) { 
        $NIP = $_POST['NIP'];
        $nama_nasabah = $_POST['nama_nasabah'];
        $NIK = $_POST['NIK'];
        $password = $_POST['password'];
        $tempatlahir = $_POST['tempatlahir'];
        $tgl_lahir = $_POST['tgl_lahir'];


        $jk = $_POST['jk'];
        $no_hp = $_POST['no_hp'];
        $jabatan = $_POST['jabatan'];
        $alamat = $_POST['alamat'];

        

        $sql = "insert into data_nasabah (NIP, nama_nasabah, NIK, password, tempatlahir, tgl_lahir, jk,  no_hp, jabatan, alamat) values ('$NIP', '$nama_nasabah', '$NIK', '$password', '$tempatlahir', '$tgl_lahir', '$jk',  '$no_hp', '$jabatan', '$alamat')";

        if (mysqli_query($conn, $sql) ) {
            echo "New record created succesfully";
        header("location: dashboard_admin.php"); 
        } else {         
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);     
        }

    }           
     mysqli_close($conn); 
?> 
 
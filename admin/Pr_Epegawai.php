<?php  include('koneksi.php'); 

	if (isset($_POST['NIP']) ) {
		$NIP=$_POST['NIP'];
        $password= $_POST['password'];
        $nama= $_POST['nama'];
        $jabatan = $_POST['jabatan'];

	

     $sql = "UPDATE pegawai SET password='$password', nama='$nama', jabatan='$jabatan' WHERE NIP='$NIP'"; 
     
     if (mysqli_query($conn, $sql)) {         
     	echo "Record edited successfully"; 
     	header("location: pegawai.php");   
     } else {         
     	echo "Error: " . $sql . "<br>" . mysqli_error($conn);     
     } 
      }           
     mysqli_close($conn); ?> 
 
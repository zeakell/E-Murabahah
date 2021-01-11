<?php  include('koneksi.php'); 

	if (isset($_POST['submit'])) { 
		$NIP=$_POST['NIP'];
        $password= $_POST['password'];
        $nama= $_POST['nama'];
        $jabatan = $_POST['jabatan'];

     $sql = "insert into pegawai (NIP, password, nama, jabatan ) values ('$NIP', '$password', '$nama',  '$jabatan')";

        
        if (mysqli_query($conn, $sql)) {         
            echo "Record edited successfully"; 
            header("location: pegawai.php");   
        } else {         
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);     
        } 
    }           
     mysqli_close($conn); ?> 
 
<?php
session_start(); 
include('koneksi.php');

    //cek dahulu, jika tombol simpan di klik
    if(isset($_POST['submit']) ) {
      
        $NIP = $_POST['NIP'];
        $password= $_POST['password'];
        $NIK = $_POST['NIK'];


     //melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
        $sql = "UPDATE data_nasabah SET password='$password' WHERE NIP= '$NIP'"; 

        if (mysqli_query($conn, $sql)) {         
            echo "<script>alert('Password berhasil di ubah');
            window.location='mainmenu.php'</script>";
        } 
        else {         
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);     
        }        
            mysqli_close($conn); 
    }
    else
    {
        echo "<script>alert('Password gagal di ubah');window.location='mainmenu.php'</script>";
    } 
?> 
 
 
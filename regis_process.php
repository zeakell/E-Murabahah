<?php
    include ('koneksi.php');

    if (isset($_POST['submit'])) { 
        $NIP = $_POST['NIP'];
        $nama_nasabah= $_POST['nama_nasabah'];
        
    
        $password = $_POST['password'];

        
        $sql = "insert into data_nasabah (NIP,  nama_nasabah, password) values ('$NIP', '$nama_nasabah', '$password')";

        if (mysqli_query($conn, $sql) ) {
            header("location: login.php"); 
        } 
        else {         
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);     
        } 
    }           
    mysqli_close($conn); 
?> 
 
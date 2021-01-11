<?php
 include('koneksi.php');
   if(isset($_POST['submit']) ) {

    $NIP = $_POST['NIP'];  

        $sql = "DELETE from data_nasabah  WHERE NIP='$NIP'";

        if (mysqli_query($conn, $sql)) {           

            echo "<script>alert('Record has been deleted successfully');window.location=' datadiri_nas.php'</script>";
        } 
        else {        
        echo "Error: ".$sql."<br>".mysqli_error($conn);     
        }
        mysqli_close($conn); 
    } 
    else
    {
        echo "<script>alert('Data tidak tersimpan');window.location='dashboard_admin.php'</script>";
    } 
?> 


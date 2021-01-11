<?php include('koneksi.php');

    //cek dahulu, jika tombol simpan di klik
    if(isset($_POST['submit']) ) {
      
        $NIP=$_POST['NIP'];
        $nama_nasabah = $_POST['nama_nasabah'];     
        $tempatlahir = $_POST['tempatlahir'];     
        $tgl_lahir = $_POST['tgl_lahir'];     
        $NIK = $_POST['NIK']; 
        $jk = $_POST['jk'];
        $no_hp = $_POST['no_tlp']; 
        $jabatan = $_POST['jabatan'];    
        $alamat = $_POST['alamat'];
        $penghasilan = $_POST['[penghasilan]'];

      

     //melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
 $sql = "UPDATE data_nasabah SET nama_nasabah='$nama_nasabah', tempatlahir='$tempatlahir', tgl_lahir='$tgl_lahir', NIK='$NIK', jk='$jk', no_hp='$no_hp', jabatan='$jabatan', alamat='$alamat', penghasilan='$penghasilan' WHERE NIP= '$NIP'"; 

  if (mysqli_query($conn, $sql)) {         
     echo "<script>alert('Data Anda Sudah dikirim');window.location='mainmenu.php'</script>";
     } else {         
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);     
     }        
     mysqli_close($conn); 
   } 
    ?> 
 
 
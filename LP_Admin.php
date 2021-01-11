<?php
session_start();
include('koneksi.php');

    $NIP = $_POST['NIP'];
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];
        $login = mysqli_query($conn,"SELECT * from pegawai where NIP='$NIP' AND password='$password' AND jabatan='$jabatan' ");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($login);

if($cek>0){

        $data = mysqli_fetch_assoc($login);

        if ($data['jabatan']=="admin") {
                $_SESSION['NIP'] = $NIP;
                $_SESSION['jabatan'] = $admin;
                $_SESSION['user'] = $data['nama'];
               
                echo "<script>alert('Anda berhasil masuk');
                window.location='admin/dashboard_admin.php'</script>";


        } else if($data['jabatan']=="manajer"){
                $_SESSION['username'] = $username;
                $_SESSION['jabatan'] = $manajer;
                
                header("location: manajer/index_manajer.php");

        }else if($data['jabatan']=="teller"){
                $_SESSION['username'] = $username;
                $_SESSION['jabatan'] = $teller;
                
                header("location: teller/index_teller.php");

        }else if($data['jabatan']=="surveyor"){
                $_SESSION['username'] = $username;
                $_SESSION['jabatan'] = $surveyor;
                
                header("location: surveyor/index_survey.php");

        } 
}
else {
        echo "<script>alert('NIP atau password yang anda masukkan salah, silahkan coba kembali');
        window.location='Ladmins.php'</script>";
}
?>




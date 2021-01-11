<?php
session_start();
    include("koneksi.php");

    $NIP = $_POST['NIP'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM data_nasabah WHERE NIP = '$NIP' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)>0) {
        session_start();
        $data=mysqli_fetch_array($result);
        $_SESSION['user'] = $data['nama_nasabah'];
        $_SESSION['pass'] = $data['password'];
        $_SESSION['NIP'] =  $data['NIP'];

        echo "<script>alert('Anda berhasil masuk');
        window.location='mainmenu.php'</script>";
    } 
    else {
        echo "<script>alert('NIP atau password yang anda masukkan salah, silahkan coba kembali');
        window.location='login.php'</script>";
    }
?>

<?php include ("koneksi.php") ?>


<?php // sesi agar harus masuk lewat login
session_start();
      $nama_nasabah = $_SESSION['user'];
      $password = $_SESSION['pass'];
      $NIP = $_SESSION['NIP'] ;
             //manggil user 
             $sql = "select * from data_nasabah where NIP = '$NIP' AND password = '$password'";
             $result = mysqli_query($conn, $sql); 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GANTI PASSWORD | KOSIKA TAZKIA</title>
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/icon" href="img/KOSIKA.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="csss/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <style type="text/css">
    
    </style>
</head>

<body class="bg-gradient-primary">
<div class="login-form">

    <form action="edit_pw.php" method="post" role="form" class="contactForm">
        <h4 class="text-center">
        <img src="img/KOSIKA.png" width="100" height="100" /><br>GANTI PASSWORD</h4><br>
        
         
        
        <div class="form-group">
        <label>NIP</label>
            <input type="text" class="form-control" placeholder="NIP" name="NIP" id="NIP"  value="<?php echo $_SESSION['NIP'];?>" readonly  required="required">
        </div>

        <div class="form-group">
        <label>Nama Nasabah</label>
            <input type="text" class="form-control" placeholder="nama_nasabah" name="nama_nasabah" id="nama_nasabah"  value="<?php echo $_SESSION['user'];?>" readonly required="required">
        </div> 

        <div class="form-group">
        <label>Password Lama</label>
            <input type="password" class="form-control" placeholder="kata sandi lama" name="pwlama" id="pwlama"  value="<?php echo $_SESSION['pass'];?> " readonly>
            <input type="checkbox" onclick="pwLamaaku()">  Tampilkan Password
        </div>

        <div class="form-group">
            <label>Password Baru</label>
            <input type="password" class="form-control" placeholder="kata sandi baru" name="password" id="pwbaru" required="required"/>
            <input type="checkbox" onclick="pwBaruaku()">  Tampilkan Password
        </div>
        
        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">KONFRIMASI</button>
        </div>
                 
    <p class="text-center"><button type="cancel"  class="btn btn-danger btn-block"><a class= "text-white" href="mainmenu.php" >BATAL</a></button></p>
</form>

</div>
<script>
        function pwLamaaku() {
            var x = document.getElementById("pwlama");
            if (x.type === "password") {
                x.type = "text";
            } 
            else {
                x.type = "password";
            }
        }

        function pwBaruaku() {
            var x = document.getElementById("pwbaru");
            if (x.type === "password") {
                x.type = "text";
            } 
            else {
                x.type = "password";
            }
        }
</script>
</body>
</html> 

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="csss/sb-admin-2.min.css" rel="stylesheet">  

<?php 
ob_start();
session_start();
  if(isset($_SESSION['users_username'])) 
    header("location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | KOSIKA TAZKIA</title>
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/icon" href="img/KOSIKA.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="csss/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <style type="text/css">
    
    </style>
</head>
</head>

<body class="bg-gradient-primary">
<div class="login-form">

    <form action="login_process.php" method="post">
    <h4 class="text-center">
        <img src="img/KOSIKA.png" width="100" height="100" /><br>
        </h4 ><br>
        <h3 class="text-center"> MASUK</h3>
        <br>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="NIP" name="NIP" id="NIP" required="required">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" id="pwku" required="required">
            <input type="checkbox" onclick="pwsaya()">  Tampilkan Password
        </div>
        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Masuk</button>
        </div>
              
    
    <p class="text-center"><button type="cancel"  class="btn btn-danger btn-block"><a class= "text-white" href="index.php" >KELUAR</a></button></p>
    <p class="text-center"><a href="register.php">Belum mempunyai akun? Daftar sekarang</a></p>
</form>
</div>

    <script>
            function pwsaya() {
                var x = document.getElementById("pwku");
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
<?php 
    include ("koneksi.php");
    date_default_timezone_set('Asia/Jakarta');
?>


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
    
    <title>DATA DIRI | KOSIKA TAZKIA</title>
   
    <link rel="shortcut icon" type="image/icon" href="img/KOSIKA.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="csss/login.css">
</head>

<body class="bg-gradient-primary">
<div class="login-form">

    <form action="editpri.php" method="post" role="form" class="contactForm">
        <h4 class="text-center">
        <img src="img/KOSIKA.png" width="100" height="100" /><br>
        </h4 ><br>
        <h3 class="text-center"> DATA DIRI </h3>
         
        
        <div class="form-group">
            <label>NIP</label>    
            <input type="number" class="form-control"  name="NIP" id="NIP" value="<?php echo $_SESSION['NIP'];?>" readonly />
        </div>

        <div class="form-group">
            <label>Nama Nasabah</label>
            <input type="text" class="form-control" placeholder="nama_nasabah" name="nama_nasabah" id="user"  value="<?php echo $_SESSION['user'];?>" required="required">
        </div>
        
        <div class="form-group">
            <label>NIK</label>
            <input type="number" class="form-control" name="NIK" id="NIK" value="<?php echo $_SESSION['NIK'];?>" id="pwsaya" required="required">
        </div> 

        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password" id="pwku"  value="<?php echo $_SESSION['pass'];?>"  required="required"/>
            <input type="checkbox" onclick="pwsaya()">  Tampilkan Password
        </div>
        
        <div class="form-group">
                <label>Tempat Lahir</label>
                   <select id="tempatlahir" class="form-control" name="tempatlahir" value="<?php echo $_SESSION['tempatlahir'];?>" required="required" >
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bogor">Bogor</option>
                    <option value="Depok">Depok</option>
                   </select>
                  <div class="validation"></div>
        </div>

        <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir"value="<?php echo $_SESSION['tgl_lahir'];?>"   />
                  <div class="validation"></div>
        </div>

        <div class="form-group">
                  <label>Jenis Kelamin</label></br>
                    <input type="radio" name="jk" id="jk" value="L"> Laki-laki
                    <input type="radio" name="jk" id="jk" value="P"> Perempuan
                  <div class="validation"></div>
        </div>

        <div class="form-group">
        <label>NO handphone</label>
            <input type="number" class="form-control"  name="no_hp" id="no_hp"  value="<?php echo $_SESSION['no_hp'];?>" required="required">
        </div>


        <div class="form-group">
                <label>Jabatan</label>
                   <select id="jabatan" class="form-control" name="jabatan"  placeholder="jabatan" required="required" >
                    <option value="Staff">Staff</option>
                    <option value="Dosen">Dosen</option>
                    <option value="Satpam">Satpam</option>
                   </select>
                  <div class="validation"></div>
        </div>

        <div class="form-group">
                  <label>Alamat sekarang</label>
                  <textarea class="form-control" name="alamat" rows="5" id="alamat" placeholder="Alamat sekarang" ></textarea>
                  <div class="validation"></div>
        </div>

        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
        </div>
        
        <input type="submit"  class="btn btn-danger btn-block" name="submit" value="Kembali" onclick=self.history.back()><br>
            
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</body>
</html> 

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="csss/sb-admin-2.min.css" rel="stylesheet">  

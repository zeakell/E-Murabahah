<?php
    include("koneksi.php");
    date_default_timezone_set('Asia/Jakarta');
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DASHBOARD ADMIN | KOSIKA TAZKIA</title>

  <link rel="icon" type="image/png" href="../img/KOSIKA.png" />   
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../asset/css/admin.css"> 
  <link rel="stylesheet" type="text/css" href="../asset/fonts/Font-Awesome-master/css/all.min.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark  sidebar  sidebar-dark accordion " id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand bg-dark  d-flex align-items-center justify-content-center" href="dashboard_admin.php">
        <div class="sidebar-brand-icon ">        
          <i class="fab fa-kickstarter"></i>
        
        </div>
        <div class="sidebar-brand-text mx-3">Admin<sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard_admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>KOSIKA TAZKIA</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Users
      </div>

      <!-- Nav Item - Menu Pegawai -->
       <li class="nav-item">
        <a class="nav-link collapsed bg-dark " href="#" data-toggle="collapse" data-target="#collapsePeg" aria-expanded="true" aria-controls="collapsePeg">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pegawai</span>
        </a>
        
        <div id="collapsePeg" class="collapse " aria-labelledby="navbarDropdown" data-parent="#accordionSidebar ">
          <div class="bg-dark py-2 collapse-inner rounded">
            <h6 class="collapse-header ">Pegawai :</h6>
            <a class="collapse-item  text-white" href="pegawai.php"><i class="fas fa-book mr-2"></i>Data Pegawai</a>
          </div>
        </div>

      </li>

      <!-- Nav Item - Menu Anggota -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseA" aria-expanded="true" aria-controls="collapseA">
          <i class="fas fa-fw fa-folder"></i>
          <span>Anggota</span>
        </a>
        <div id="collapseA" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-dark py-2 collapse-inner rounded">
            <h6 class="collapse-header">Anggota :</h6>
            <a class="collapse-item text-white" href="datadiri_nas.php"><i class="fas fa-book mr-2"></i>Data Pribadi</a>
            <a class="collapse-item text-white" href="data_keuangan.php"><i class="fas fa-book mr-2"></i>Data Keuangan</a>
            <a class="collapse-item text-white" href="data_referensi.php"><i class="fas fa-book mr-2"></i>Data Referensi</a>

          </div>
        </div>
      </li>

   
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Produk
      </div>

      <!-- Nav Item - Menu Simpanan -->


      <!-- Nav Item - Menu PENGAJUAN -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePeng" aria-expanded="true" aria-controls="collapsePeng">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pengajuan</span>
        </a>
        <div id="collapsePeng" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-dark py-2 collapse-inner rounded">
            <h6 class="collapse-header" href="pengajuan.php">Data Pengajuan :</h6>
            <a class="collapse-item text-white" href="pengajuan.php">Pengajuan</a>
            <a class="collapse-item text-white" href="tabel_jaminan.php">Jaminan</a>
            
          </div>
        </div>
        </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePemb" aria-expanded="true" aria-controls="collapsePemb">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pembelian</span>
        </a>
        <div id="collapsePemb" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-dark py-2 collapse-inner rounded">
            <h6 class="collapse-header" href="data_pemb.php">Data Pembelian :</h6>
            <a class="collapse-item text-white" href="data_pemb.php">Pembelian</a>
            <a class="collapse-item text-white" href= "tabel_akad.php">Akad</a>
            <a class="collapse-item text-white" href="tabel_angsuran.php">Angsuran</a>
          </div>
        </div>
        </li>

        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkad" aria-expanded="true" aria-controls="collapseAkad">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pembayaran</span>
        </a>
        <div id="collapseAkad" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-dark py-2 collapse-inner rounded">
            <h6 class="collapse-header" href="akad.php">Pembayaran :</h6>
             <a class="collapse-item text-white" href="tbayar.php">Pembayaran</a>
             <a class="collapse-item text-white" href="tabel_transaksi.php">Data Transaksi</a>
             <a class="collapse-item text-white" href="tlapor.php">Cetak Laporan Transaksi</a>

            
          </div>
        </div>
      </li>
   
     <hr class="sidebar-divider">

       
    
      <div class="sidebar-heading">
        Laporan
      </div>

     <!-- Nav Item - Pages Collapse Menu Heading-->
     
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-dark py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan:</h6>
            <a class="collapse-item text-white" href="L_Pembelian.php">Pembelian</a>
            <a class="collapse-item text-white" href="lap_angs.php">Angsuran</a>
            <a class="collapse-item text-white" href="tlapor.php">Periode</a>
            
            
          </div>
        </div>
      </li>


       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePes" aria-expanded="true" aria-controls="collapsePes">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pesan</span>
        </a>
        <div id="collapsePes" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-dark py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pesan:</h6>
             <a class="collapse-item text-white"  href="pesan.php">Pesan</a>
            
          </div>
        </div>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        
        <nav class="navbar navbar-expand-lg navbar-light bg-warning topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
            </li>

            <!-- Nav Item - User Information -->
            <a class="btn btn-default text-white" aria-label="Settings">
                <i class="fas fa-user  mr-3"  data-toogle="tooltip"  title="Akun "></i><?php echo $_SESSION['user']; ?>
              </a>
              <a class="btn btn-default text-white" href="Dpengaturan.html" aria-label="Settings">
                <i class="fa fa-fw fa-calendar mr-3" data-toogle="tooltip"  title="DATE / TIME " aria-hidden="true"></i><?php echo date(" F j, Y, g:i a"); ?>
              </a>
              <a class="btn btn-default text-white" href="logout_process.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')" aria-label="Settings">
                <i class="fas fa-sign-out-alt  mr-3 " data-toogle="tooltip"  title="Keluar "><?php echo (" Keluar"); ?></i>
              </a>


          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout_process.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


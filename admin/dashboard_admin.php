<?php 
    session_start(); 
    if (!isset($_SESSION['user'])) {
        header("location: Ladmin.php");
    }
?>


<?php include "header.php"; ?>

<header class="section-header">
</header>

<section id="intro" class="clearfix">

    <div class="container d-flex h-100">

      <div class="row justify-content-center align-self-center">
      

    <!-- End of Topbar
        <div class="col-md-6 intro-img order-md-last order-first">
          <img src="img/intro-img.svg" alt="" class="img-fluid">
        </div>
      </div>
 -->
    </div>
  </section><!-- #intro -->
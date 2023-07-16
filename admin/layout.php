<?php require "layout/head.php"?>
        
        <!-- Menu -->
        
        <?php require "layout/aside.php" ?>
        
        <!-- /Menu  -->
        
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php require "layout/navbar.php" ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
                <!-- Sử dụng biến global $VIEW_NAME để thay đổi nội dung theo từng chức năng -->
                 <?php 
                    //require "layout/content.php" 
                    require_once $VIEW_NAME;
                 ?>
            
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
<?php require "layout/foot.php" ?>
  
          

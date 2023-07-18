
<?php require "layout/head.php"?>
        
        <!-- Menu -->
        
            <!-- Content -->
                <!-- Sử dụng biến global $VIEW_NAME để thay đổi nội dung theo từng chức năng -->
                 <?php 
                    //require "layout/content.php" 
                    require_once $VIEW_NAME;
                 ?>
            
            <!-- / Content -->
<?php require "layout/foot.php" ?>
  
          
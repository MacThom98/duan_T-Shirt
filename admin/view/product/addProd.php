
<div class="container-xxl flex-grow-1 container-p-y">
<?php
        // Thực hiện thêm dòng thông báo khi giá trị MESSAGE được gán thành công ở ControllerProduct, hiển thị ra màn hình.
        if(strlen($MESSAGE)){
          echo $MESSAGE;
        };
      
      ?>
<h2 class="mt-4">Thêm sản phẩm</h2>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="product_name">Tên sản phẩm:</label>
    <input type="text" class="form-control" name="product_name" id="product_name" required>
  </div>

  <div class="form-group">
    <label for="description">Mô tả:</label>
    <textarea class="form-control" name="description" id="description" rows="4" cols="50"></textarea>
  </div>

  <div class="form-group">
    <label for="price">Giá:</label>
    <input type="number" class="form-control" name="price" id="price" required>
  </div>

  <div class="form-group">
    <label for="category">Danh mục:</label>
    <select class="form-control" name="category_id" id="category_id">
      <?php
      foreach($listCategory as $opt){
        echo "<option value='{$opt['id']}'>{$opt['name']}</option>" ;
      }
      ?>    
      
      <!-- <option value="Máy tính">Máy tính</option>
      <option value="Thiết bị gia dụng">Thiết bị gia dụng</option> -->
    </select>
  </div>

  <div class="form-group">
    <label for="image">Hình ảnh:</label>
    <input type="file" class="form-control-file" name="image" id="image">
  </div>

  <button name="btn_add" class="btn btn-primary">Thêm sản phẩm</button> 
  
  <!-- giá trị name="btn_add" dùng để kiểm tra xem người dùng đã thực hiện thêm chưa. Sử dụng exist_param() để kiểm tra ở ControllerProduct -->
</form>
<a href="<?=$ADMIN_URL.'/view/product'?>" class="btn btn-primary">Danh sách sản phẩm</a>
  </div>

  <?php 
  
  
  
  ?>

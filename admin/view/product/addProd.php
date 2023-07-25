
<div class="container-xxl flex-grow-1 container-p-y">
<?php
        // Thực hiện thêm dòng thông báo khi giá trị MESSAGE được gán thành công ở ControllerProduct, hiển thị ra màn hình.
        if(strlen($MESSAGE)){
          echo $MESSAGE;
        };
      
      ?>
<h2 class="mt-4">Thêm sản phẩm</h2>

<form action="<?php $ADMIN_URL.'/view/product?action=btn_add'?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="product_name">Tên sản phẩm:</label>
    <input type="text" class="form-control" name="product_name" id="product_name" required>
  </div>
  
  <div class="form-group">
    <label for="price">Giá:</label>
    <input type="number" class="form-control" name="price" id="price" required>
  </div>

  <div class="form-group">
    <label for="description">Mô tả:</label>
    <textarea class="form-control" name="description" id="description" rows="4" cols="50"></textarea>
  </div>


  <div class="form-group">
    <label for="discount">Giảm giá:</label>
    <select class="form-control" name="discount" id="discount">
      <?php
      foreach($listDiscount as $discount){
        echo "<option value='{$discount['discountId']}'>{$discount['discountName']}</option>" ;
      }
      ?>    
    </select>
  </div>
  <div class="form-group">
  <label for="branch">Chi nhánh</label>
  <select class="form-control" name="branch" id="branch">
      <?php
      foreach($listBranch as $branch){
        echo "<option value='{$branch['branchId']}'>{$branch['branchName']}</option>" ;
      }
      ?>    
    </select>
  </div>
  <div class="form-group">
    <label for="img">Hình ảnh:</label>
    <input type="file" class="form-control-file" name="img" id="img">
  </div>
  <div class="form-group">
    <label for="category">Danh mục:</label>
    <select class="form-control" name="category" id="category">
      <?php
      foreach($listCategory as $cat){
        echo "<option value='{$cat['categoryId']}'>{$cat['categoryName']}</option>" ;
      }
      ?>    

    </select>
  </div>
  <div class="form-group">
    <label for="stock">Số lượng</label>
    <input type="number" class="form-control" name="stock" id="stock" required>
  </div>


  <button type="submit" name="btn_add" class="btn btn-primary">Thêm sản phẩm</button> 
  
  <!-- giá trị name="btn_add" dùng để kiểm tra xem người dùng đã thực hiện thêm chưa. Sử dụng exist_param() để kiểm tra ở ControllerProduct -->
</form>
<a href="<?=$ADMIN_URL.'/view/product'?>" class="btn btn-primary">Danh sách sản phẩm</a>
  </div>

  <?php 
  
  
  
  ?>

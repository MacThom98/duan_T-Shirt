
<div class="container-xxl flex-grow-1 container-p-y">
<?php
        // Thực hiện thêm dòng thông báo khi giá trị MESSAGE được gán thành công ở ControllerProduct, hiển thị ra màn hình.
        if(strlen($MESSAGE)){
          echo $MESSAGE;
        };
      
      ?>
<h2 class="mt-4">Sửa sản phẩm</h2>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="product_name">Tên sản phẩm:</label>
    <input type="text" class="form-control" name="product_name" id="product_name" value="<?=$product['productName']?>" required>
  </div>
  
  <div class="form-group">
    <label for="price">Giá:</label>
    <input type="number" class="form-control" name="price" id="price" value="<?=$product['price']?>" required>
  </div>

  <div class="form-group">
    <label for="description">Mô tả:</label>
    <textarea class="form-control" name="description" id="description" rows="4" cols="50"><?=$product['description']?></textarea>
  </div>


  <div class="form-group">
    <label for="discount">Giảm giá:</label>
    <select class="form-control" name="discount" id="discount">
    <option value='<?php echo $product['discountId']?>'><?php echo $product['discountName'] ?></option>  
    
      <?php
      $discountList = $DiscountModel->getListDiscountNotIn($product['discountId']);
      foreach($discountList as $discount){
        echo "<option value='{$discount['discountId']}'>{$discount['discountName']}</option>" ;
      }
      ?>    
    </select>
  </div>
  <div class="form-group">
  <label for="branch">Chi nhánh</label>
  <select class="form-control" name="branch" id="branch" disabled>
      <option value='<?php echo $product['branchId']?>'><?php echo $product['branchName'] ?></option>   
    </select>
  </div>
  <div class="form-group">
    <label for="imageToUpload">Hình ảnh:</label>
    <input type="file" class="form-control-file" name="img" id="img">
  </div>
  <div class="form-group">
    <label for="existingImg"></label>
    <img src="<?=$IMAGE_DIR.$product['image']?>" class="form-control-file" name="existingImg" id="existingImg">
  </div>
  <div class="form-group">
    <label for="category">Danh mục:</label>
    <select class="form-control" name="category" id="category">
      <option value='<?php echo $product['categoryId']?>'><?php echo $product['categoryName'] ?></option>   
      <?php
      $categoryList = $CategoryModel->getListCategoryNotIn($product['categoryId']);
      echo $categoryList;
      foreach($categoryList as $cat){
        echo "<option value='{$cat['categoryId']}'>{$cat['categoryName']}</option>" ;
      }
      ?>   
    </select>
  </div>
  <div class="form-group">
    <label for="stock">Số lượng</label>
    <input type="number" class="form-control" name="stock" id="stock" value="<?=$product['stock'] ?>" required>
  </div>


  <button name="btn_update" class="btn btn-primary">Sửa sản phẩm</button> 
  
  <!-- giá trị name="btn_add" dùng để kiểm tra xem người dùng đã thực hiện thêm chưa. Sử dụng exist_param() để kiểm tra ở ControllerProduct -->
</form>
<a href="<?=$ADMIN_URL.'/view/product'?>" class="btn btn-primary">Danh sách sản phẩm</a>
  </div>

  <?php 
  
  
  
  ?>

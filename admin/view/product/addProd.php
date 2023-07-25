<div class="container-xxl flex-grow-1 container-p-y">
<<<<<<< HEAD
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
  
  
  
=======
  <!-- Thêm thông báo khi giá trị MESSAGE được gán thành công từ ControllerProduct và hiển thị ra màn hình. -->
  <?php
  if (strlen($MESSAGE)) {
    echo '<div class="alert alert-success text-center">' . $MESSAGE . '</div>';
  };
>>>>>>> 14037ecd78a19cccfb55085e8054242194777202
  ?>
  
  <div class="row"> <!-- Dòng chứa hai cột -->
    <div class="col-md-6 mb-4 mb-md-0"> <!-- Cột thứ nhất chiếm 100% chiều rộng trên màn hình nhỏ hơn (md) và 50% chiều rộng trên màn hình lớn hơn (lớn hơn md) -->
      <h2 class="mt-4 d-flex justify-content-center align-items-center">Thêm sản phẩm</h2>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="product_name" class="form-label">Tên sản phẩm:</label>
          <input type="text" class="form-control" name="product_name" id="product_name" required>
        </div>
        <div class="mb-3">
          <label for="discount" class="form-label">Giảm giá:</label>
          <select class="form-control" name="discount" id="discount">
            <?php
            foreach($listDiscount as $discount) {
              echo "<option value='{$discount['discountId']}'>{$discount['discountName']}</option>";
            }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="branch" class="form-label">Chi nhánh</label>
          <select class="form-control" name="branch" id="branch">
            <?php
            foreach($listBranch as $branch) {
              echo "<option value='{$branch['branchId']}'>{$branch['branchName']}</option>";
            }
            ?>
          </select>
        </div>

      
        <div class="mb-3">
          <label for="description" class="form-label">Mô tả:</label>
          <textarea class="form-control" name="description" id="description" rows="4" cols="50"></textarea>
        </div>
  

        

        

        <button name="btn_add" class="btn btn-primary">Thêm sản phẩm</button>
        <!-- Giá trị name="btn_add" dùng để kiểm tra xem người dùng đã thực hiện thêm chưa. Sử dụng exist_param() để kiểm tra ở ControllerProduct -->

    </div>

    <div class="col-md-6 mb-4 mb-md-0"> <!-- Cột thứ hai chiếm 50% chiều rộng trên màn hình lớn hơn (lớn hơn md) -->
      <a href="<?=$ADMIN_URL.'/view/product'?>" class="btn btn-primary mt-3 mb-3">Danh sách sản phẩm</a>
      <div class="mb-3">
          <label for="price" class="form-label">Giá:</label>
          <input type="number" class="form-control" name="price" id="price" required>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Danh mục:</label>
          <select class="form-control" name="category" id="category">
            <?php
            foreach($listCategory as $cat) {
              echo "<option value='{$cat['categoryId']}'>{$cat['categoryName']}</option>";
            }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="stock" class="form-label">Số lượng</label>
          <input type="number" class="form-control" name="stock" id="stock" required>
        </div>
        <div class="mb-3">
          <label for="img" class="form-label">Hình ảnh:</label>
          <input type="file" class="form-control-file" name="img" id="img"> 
          <!-- <img id="imgPreview" src="#" alt="Hình ảnh xem trước" style="max-width: 200px; display: none;"> -->
        </div>
    </div>
    </form>
  </div> <!-- Kết thúc dòng chứa hai cột -->

</div>

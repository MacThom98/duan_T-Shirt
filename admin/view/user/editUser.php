<div class="container-xxl flex-grow-1 container-p-y">
<?php
        // Thực hiện thêm dòng thông báo khi giá trị MESSAGE được gán thành công ở ControllerProduct, hiển thị ra màn hình.
        if(strlen($MESSAGE)){
          echo $MESSAGE;
        };
      
      ?>
<h2 class="mt-4">Sửa thông tin khách hàng</h2>

<form action="<?php $ADMIN_URL.'/view/user?action=btn_update'?>" method="POST">
  <div class="form-group">
    <label for="name">Tên khách hàng:</label>
    <input type="text" class="form-control" name="name" id="name" value="<?=$user['userFullname']?>" required>
  </div>
  
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="<?=$user['userEmail']?>" required>
  </div>

  <div class="form-group">
    <label for="address">Địa chỉ</label>
    <input type="text" class="form-control" name="address" id="address"  value="<?=$user['address']?>" required>
 </div>
  <div class="form-group">
    <label for="phone">Số điện thoại</label>
    <input type="text" class="form-control" name="phone" id="phone" value="<?=$user['phoneNumber']?>" required>
 </div>


  <div class="form-group">
    <label for="role">Quyền hạn</label>
    <select class="form-control" name="role" id="role">
      <option value='<?php echo $user['roleId']?>'><?php echo $user['roleType'] ?></option>   
      <?php
      $listRole = $RoleModel->getListRoleNotIn($user['roleId']);
    //   echo $;
      foreach($listRole as $role){
        echo "<option value='{$role['roleId']}'>{$role['roleType']}</option>" ;
      }
      ?>   
    </select>
  </div>
  
  <div class="form-group">
    <label for="pass">Mật khẩu</label>
    <input type="pass" class="form-control" name="pass" id="pass" value="<?=$user['password']?>" required>
  </div>


  <button type="submit" name="btn_update" class="btn btn-primary">Cập nhật thông tin</button> 
  
  <!-- giá trị name="btn_add" dùng để kiểm tra xem người dùng đã thực hiện thêm chưa. Sử dụng exist_param() để kiểm tra ở ControllerProduct -->
</form>
<a href="<?=$ADMIN_URL.'/view/user'?>" class="btn btn-primary">Hủy</a>
  </div>
  




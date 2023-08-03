<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Thêm thông báo khi giá trị MESSAGE được gán thành công từ ControllerProduct và hiển thị ra màn hình. -->
  <?php
  if (strlen($MESSAGE)) {
    echo '<div class="alert alert-success text-center">' . $MESSAGE . '</div>';
  };
  ?>
  
  <div class="row"> <!-- Dòng chứa hai cột -->
    <div class="col-md-4 mb-4 mb-md-0"> <!-- Cột thứ nhất chiếm 100% chiều rộng trên màn hình nhỏ hơn (md) và 50% chiều rộng trên màn hình lớn hơn (lớn hơn md) -->
      <h2 class="mt-4 d-flex justify-content-center align-items-center">Tạo đơn hàng</h2>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="guest" class="form-label">Tên khách hàng</label>
          <input type="text" class="form-control" name="guest" id="guest" required>
        </div>

        <div class="mb-3">
          <label for="guestPhone" class="form-label">Số điện thoại</label>
          <input type="text" class="form-control" name="guestPhone" id="guestPhone" required>
        </div>

        <div class="mb-3">
          <label for="guestAddress" class="form-label">Địa chỉ nhận hàng</label>
          <input type="text" class="form-control" name="guestAddress" id="guestAddress" required>
        </div>

      
        <div class="mb-3">
          <label for="note" class="form-label">Ghi chú</label>
          <textarea class="form-control" name="note" id="note" rows="4" cols="50"></textarea>
        </div>
 
    </div>

    <div class="col-md-8 mb-4 mb-md-0"> <!-- Cột thứ hai chiếm 50% chiều rộng trên màn hình lớn hơn (lớn hơn md) -->
      <table class="table tables-basic">
        <tr>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th></th>
        </tr>
        <tr>
    <td>
        <select name="product" id="product">
            <?php foreach($products as $prod){ ?>
                <option value="<?=$prod['productId']?>"><?php echo $prod['productName'] ?></option>
            <?php } ?>
        </select>
    </td>
    <td class="priceToProd"></td>
    <td></td>
    <td><span id="totalPrice">0</span></td>
</tr>


      </table>
      
    </div>
        <a href="index.php" class="btn btn-danger mt-3 mb-3 col-md-2">Hủy</a>
        <button name="btn_add" class="btn btn-primary mt-3 mb-3 col-md-2 ">Xác nhận</button>
    </form> 
  </div> <!-- Kết thúc dòng chứa hai cột -->

</div>

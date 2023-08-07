<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Hiển thị danh sách sản phẩm -->

    <h1>Chi tiết đơn hàng</h1>

    <form action="" method="post">
        <a href="index.php" class="btn btn-primary">Danh sách đơn hàng</a>

            <table class="table">
                <tr>

                    <th>Mã sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <!-- <th>Khuyến mãi</th> -->
                    <th>Tổng tiền</th>
                    <!-- <th>Hành động</th> -->
                </tr>

                <?php foreach ($details as $detail) : ?>
                    <tr>
                        <td><?php echo $detail['productId']; ?></td>
                        <td><?php echo $detail['price']; ?></td>
                        <td><?php echo $detail['quantity']; ?></td>
                    
                        <td>
                            <?php 
                                echo $detail['totalMoney'];
                                $thanhtien += $detail['totalMoney'];
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan=4>Tổng cộng</td>
                        <td><?php echo $thanhtien ?></td>
                    </tr>
            </table>
            <button id="check-all" type="button" class="btn btn-success">Chọn tất cả</button>
            <button id="clear-all" type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
            <button type="submit" id="btn_delete_selected" name="btn_delete_selected" class="btn btn-danger">Xóa các mục chọn</button>
    </form>
  
</div>
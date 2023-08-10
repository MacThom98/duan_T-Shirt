
<div class="container flex-grow-1 container-p-y">
    <!-- Hiển thị danh sách sản phẩm -->

    <h1 class="text-center p-4">Lịch sử mua hàng của bạn</h1>

    <form action="" method="GET">


        <?php
        // if (strlen($MESSAGE)) {
        // echo $MESSAGE;
        // }
        //     $first_page = 0;
        //     $last_page = $_SESSION['page_count'] - 1 ;
        //     $previous_page = $_SESSION['page_no'] - 1 < $first_page ? $first_page : $_SESSION['page_no'] - 1; 
        //     $next_page=$_SESSION['page_no'] + 1> $last_page  ? $last_page : $_SESSION['page_no'] + 1;
        
        ?>

            <table class="table">
                <tr>
                    <th>Chọn</th>
                    <th>Mã đơn hàng</th>
                    <th>Hình thức thanh toán</th>
                    <th>Trạng thái đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Chi tiết</th>
                    <th>Hành động</th>
                </tr>

                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><input type="checkbox" name="orderIds[]" value="<?php echo $order['orderId']; ?>"></td>
                        <td><?php echo $order['orderId']; ?></td>

                        <td><?php echo $order['paymentId']; ?></td>
                        <td><?php 
                            if($order['statusId'] == 3){
                                echo '<button class="btn btn-success " disabled> '. $order["statusId"]. '</button>';
                            };
                            if($order['statusId'] == 6){
                                echo '<button class="btn btn-danger disabled">'. $order["statusId"]. '</button>';
                            };
                        ?></td>
                        <td><?php echo $order['orderDate']; ?></td>                        
                        <td>
                            <a href="index.php?action=view_detail&id=<?php echo $order['orderId'];?>" class="btn btn-primary mx-2 my-2">Xem</a>
                        </td>
                        <td>
                                                     
                                <a href="index.php?action=delete&id=<?php echo $order['orderId']; ?>" class="btn btn-danger mx-2 my-2">Xóa</a>
                       
                                <a href="index.php?action=print&id=<?php echo $order['orderId'];?>" class="btn btn-primary mx-2 my-2">In</a>
        
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <button id="check-all" type="button" class="btn btn-success">Chọn tất cả</button>
            <button id="clear-all" type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
            <button type="submit" id="btn_delete_selected" name="btn_delete_selected" class="btn btn-danger">Xóa các mục chọn</button>
    </form>
  
</div>



<div class="container flex-grow-1 container-p-y">
    <!-- Hiển thị danh sách sản phẩm -->

    <h1>Danh sách đơn hàng</h1>

    <form action="" method="GET">
        <a href="index.php?action=add" class="btn btn-primary">Tạo đơn hàng</a>


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

            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><input type="checkbox" name="orderIds[]" value="<?php echo $order['orderId']; ?>"></td>
                    <td>
                        <?php echo $order['orderId']; ?>
                    </td>

                    <td>
                        <?php echo $order['paymentName']; ?>
                    </td>
                    <td>
                        <?php
                        switch ($order['statusId']) {
                            case '1':
                                echo '<a class="btn btn-info disabled" href="?confirm&id=' . $order["orderId"] . '&statusId=' . $order["statusId"] . '">Chờ xử lý</a>';
                                echo '<a class="btn btn-info" href="?confirm&id=' . $order["orderId"] . '&statusId=5">Hủy đơn</a>';
                                break;
                            case '2':
                                echo '<button class="btn btn-primary">Đang giao</button>';
                                echo '<a class="btn btn-info" href="?confirm&id=' . $order["orderId"] . '&statusId=3">Đã nhận hàng</a>';
                                break;
                            // case '3':
                            //     echo '<button class="btn btn-primary">Hoàn thành</button>';
                            //     break;
                            default:
                                # code...
                                break;
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $order['orderDate']; ?>
                    </td>
                    <td>
                        <a href="index.php?action=view_detail&id=<?php echo $order['orderId']; ?>"
                            class="btn btn-primary mx-2 my-2">Xem</a>
                    </td>
                    <td>
                        <?php if ($order['statusId'] == 1) { ?>
                            <a href="index.php?action=edit&id=<?php echo $order['orderId']; ?>"
                                class="btn btn-success mx-2 my-2">Sửa</a>
                            <a href="index.php?action=delete&id=<?php echo $order['orderId']; ?>"
                                class="btn btn-danger mx-2 my-2">Xóa</a>
                        <?php } else { ?>
                            <a href="index.php?action=print&id=<?php echo $order['orderId']; ?>"
                                class="btn btn-primary mx-2 my-2">In</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button id="check-all" type="button" class="btn btn-success">Chọn tất cả</button>
        <button id="clear-all" type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
        <button type="submit" id="btn_delete_selected" name="btn_delete_selected" class="btn btn-danger">Xóa các mục
            chọn</button>
    </form>

</div>

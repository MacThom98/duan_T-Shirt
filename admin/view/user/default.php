<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Hiển thị danh sách sản phẩm -->

    <h1>Danh sách khách hàng</h1>

    <form action="" method="post">
        <a href="index.php?action=add" class="btn btn-primary">Thêm khách hàng</a>

        <?php

        
        if (strlen($MESSAGE)) {
        echo $MESSAGE;
        }
            $first_page = 0;
            $last_page = $_SESSION['page_count'] - 1 ;
            $previous_page = $_SESSION['page_no'] - 1 < $first_page ? $first_page : $_SESSION['page_no'] - 1; 
            $next_page=$_SESSION['page_no'] + 1> $last_page  ? $last_page : $_SESSION['page_no'] + 1;
        
        ?>

            <table class="table">
                <tr>
                    <th>Chọn</th>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Quyền hạn</th>
                    <th>Hành động</th>
                </tr>

                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><input type="checkbox" name="userIds[]" value="<?php echo $user['userId']; ?>"></td>
                        <td><?php echo $user['userId']; ?></td>
                        <td><?php echo $user['userFullname']; ?></td>
                        <td><?php echo $user['userEmail']; ?></td>
                        <td><?php echo $user['phoneNumber']; ?></td>
                        <td><?php echo $user['address']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                        <td><?php echo $user['roleType']; ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?php echo $user['userId']; ?>" class="btn btn-success mx-2 my-2">Sửa</a>
                            <a href="index.php?action=delete&id=<?php echo $user['userId']; ?>" class="btn btn-danger mx-2 my-2">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <button id="check-all" type="button" class="btn btn-success">Chọn tất cả</button>
            <button id="clear-all" type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
            <button type="submit" id="btn_delete_selected" name="btn_delete_selected" class="btn btn-danger">Xóa các mục chọn</button>
    </form>
    <nav class="my-4 d-flex justify-content-center">
        <ul class="pagination justify-content-center">
            <li class="page-item firs-page">
                <a class="page-link" href="?keyword_Search=<?= $keyword ?>&panigation&page_no=<?php echo $first_page; ?>"><i class="fa-solid fa-backward-fast"></i></a>
            </li>
            <li class="page-item prev">
                <a class="page-link" href="?keyword_Search=<?= $keyword ?>&panigation&page_no=<?php echo $previous_page; ?>"><i class="tf-icon bx bx-chevrons-left"></i></a>
            </li>
           
            <?php 
            for($page_number = $first_page; $page_number < $last_page + 1; $page_number++){            
                echo '<li class="page-item">
                    <a class="page-link" href="?keyword_Search=' .$keyword. '&panigation&page_no=' .$page_number. '">' .$page_number + 1 . '</a>
                </li>';}
            ?>
            
            
            <li class="page-item next">
                <a class="page-link" href="?keyword_Search=<?= $keyword ?>&panigation&page_no=<?php echo $next_page; ?>"><i class="tf-icon bx bx-chevrons-right"></i></a>
            </li>
            <li class="page-item last-page">
                <a class="page-link" href="?keyword_Search=<?= $keyword ?>&panigation&page_no=<?php echo $last_page; ?>"><i class="fa-solid fa-forward-fast"></i></a>
            </li>
        </ul>
    </nav>
</div>
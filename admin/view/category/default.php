<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Hiển thị danh sách sản phẩm -->
    <!-- Thêm thông báo khi giá trị MESSAGE được gán thành công từ ControllerCategory và hiển thị ra màn hình. -->

    <h1>Quản lý Loại hàng</h1>


    <!-- Thêm Sản phẩm -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
        Thêm loại mới
    </button>
    <?php if (strlen($MESSAGE)) {
        echo '<div class="alert alert-success text-center">' .
            $MESSAGE .
            '</div>';
    } ?>
    <!-- Modal Thêm-->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLabel">Thêm mới loại hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Tên loại:</label>
                            <input type="text" class="form-control" name="category_name" id="category_name" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-success" name="add_btn">Thêm</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Hết Modal Thêm -->

    <form action="" method="post" class="">
        <table class="table">
            <tr>
                <th>Chọn</th>
                <th>Tên Loại</th>
                <th>Số sản phẩm</th>
                <th>Hành động</th>
            </tr>

            <?php foreach ($categories as $category) : ?>
                <tr>
                    <td>
                        <input type="checkbox" name="categoryIds[]" value="<?php echo $category['categoryId']; ?>" 
                            <?php if ($category['productCount'] > 0) echo 'disabled'; ?>
                        >
                    </td>
                    <td>
                        <?php echo $category['categoryName']; ?>
                    </td>

                    <td>
                        <?php echo $category['productCount']; ?>
                    </td>

                    <td>
                        <a href="index.php?action=edit&id=<?php echo $category['categoryId']; ?>" class="btn btn-success mx-2 my-2">Sửa</a>
                        <a href="index.php?action=delete&id=<?php echo $category['categoryId']; ?>" class="btn btn-danger mx-2 my-2
                    <?php if ($category['productCount'] > 0) {
                        echo 'disabled';
                    } ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
        <button id="check-all" type="button" class="btn btn-success col-2">Chọn tất cả</button>
        <button id="clear-all" type="button" class="btn btn-primary col-2">Bỏ chọn tất cả</button>
        <button type="submit" id="btn-delete" name="dels_btn" class="btn btn-danger col-2"> Xóa Mục chọn </button>
    </form>

</div>
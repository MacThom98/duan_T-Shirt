<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Hiển thị danh sách sản phẩm -->
    
    <h1>Danh sách sản phẩm</h1>

<form action="" method="post">
    <a href="index.php?action=add" class="btn btn-primary">Thêm sản phẩm mới</a>

<?php // Thực hiện thêm dòng thông báo khi giá trị MESSAGE được gán thành công ở ControllerProduct, hiển thị ra màn hình.
if (strlen($MESSAGE)) {
    echo $MESSAGE;
} ?>
<table class="table">
    <tr >
        <th>Chọn</th>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Loại</th>
        <th>Chi Nhánh</th>
        <th>Khuyến mãi</th>
        <th>Giá</th>
        <th>Mô tả</th>
        <th>Số lượng còn</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><input type="checkbox" name="productIds[]" value="<?php echo $product['productId']; ?>"></td>
            <td><?php echo $product['productId']; ?></td>
            <td><?php echo $product['productName']; ?></td>
            <td><img src="<?php echo $IMAGE_DIR .
                $product['image']; ?>" class="" width=100px;></img></td>
            <td><?php echo $product['categoryName']; ?></td>
            <td><?php echo $product['branchName']; ?></td>
            <td><?php echo $product['discountValue']; ?>%</td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['description']; ?></td>
            <td><?php echo $product['stock']; ?></td>
            <td>
                <a href="index.php?action=edit&id=<?php echo $product[
                    'productId'
                ]; ?>" class="btn btn-success mx-2 my-2">Sửa</a>
                <a href="index.php?action=delete&id=<?php echo $product[
                    'productId'
                ]; ?>" class="btn btn-danger mx-2 my-2">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
    <button id="check-all" type="button" class="btn btn-success">Chọn tất cả</button>
    <button id="clear-all" type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
    <button id="btn_delete_selected" name="btn_delete_selected" class="btn btn-danger">Xóa các mục chọn</button>
</form>
</div>

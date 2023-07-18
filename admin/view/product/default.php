<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Hiển thị danh sách sản phẩm -->
    <h1>Danh sách sản phẩm</h1>

<a href="index.php?action=add" class="btn btn-primary">Thêm sản phẩm mới</a>


<table class="table">
    <tr >
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Loại</th>
        <th>Giá</th>
        <th>Mô tả</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['title']; ?></td>
            <td><?php echo $product['name']?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['description']; ?></td>
            <td>
                <a href="index.php?action=edit&id=<?php echo $product['id'];?>" class="btn btn-success mx-2">Sửa</a>
                <a href="index.php?action=delete&id=<?php echo $product['id']; ?>" class="btn btn-danger mx-2">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>

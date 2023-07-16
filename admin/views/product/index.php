<!-- Hiển thị danh sách sản phẩm -->
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Tên sản phẩm</th>
      <th>Giá</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $product) : ?>
      <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['name'] ?></td>
        <td><?= $product['price'] ?></td>
        <td>
          <a href="admin_products.php?action=view&id=<?= $product['id'] ?>">Xem</a>
          <a href="admin_products.php?action=edit&id=<?= $product['id'] ?>">Sửa</a>
          <a href="admin_products.php?action=delete&id=<?= $product['id'] ?>">Xóa</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- Các nút chức năng -->
<div>
  <a href="admin_products.php?action=add">Thêm sản phẩm</a>
  <a href="admin_products.php?action=search">Tìm kiếm sản phẩm</a>
  <a href="admin_products.php?action=statistics">Thống kê sản phẩm</a>
</div>

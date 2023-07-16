<?php

// require_once 'core/Database.php';
require_once '../dao/pdo.php';
require_once '../dao/product.php';

$products = new Product();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'add':
        // Xử lý thêm sản phẩm
        break;
    case 'edit':
        // Xử lý sửa sản phẩm
        break;
    case 'delete':
        // Xử lý xóa sản phẩm
        break;
    case 'view':
        // Xử lý xem chi tiết sản phẩm
        break;
    case 'search':
        // Xử lý tìm kiếm sản phẩm
        break;
    case 'statistics':
        // Xử lý thống kê sản phẩm
        break;
    default:
        // Mặc định hiển thị danh sách sản phẩm
        $products = $productDAO->findAll();
        // Hiển thị view danh sách sản phẩm
        break;
}

<?php

// require_once 'core/Database.php';
require_once '../../model/product.php';
require_once '../../../global.php';

// $productsDAO = new Product();
if(isset($_GET["action"])==true){
    $action = $_GET["action"];
    switch ($action) {
        case 'add':
            echo "đã thêm";
            // require '../layout.php';
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
            // $products = $productsDAO->getAllProducts();
            // $VIEW_NAME = $ADMIN_URL.'/view/product/index2.php';
            // require '../layout.php';
            break;
    }
}else{
    $VIEW_NAME = 'view/product/default.php';
    include "../../layout.php";
};



<?php

// require_once 'core/Database.php';
// require_once '../../model/product.php';
require_once '../../../global.php';

// $productsDAO = new Product();
if (isset($_GET["action"]) == true) {
    $action = $_GET["action"];    
    switch ($action) {        
        case 'search':
            // Xử lý tìm kiếm
            break;
        default:
            // Mặc định hiển thị danh sách sản phẩm
            // $products = $productsDAO->getAllProducts();
            // $VIEW_NAME = $ADMIN_URL.'/view/product/index2.php';
            require '../layout.php';
            break;
    }
} else {
    $VIEW_NAME = 'view/about/default.php';
    include "../../layout.php";
}
;

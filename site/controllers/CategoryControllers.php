<?php

// require_once 'core/Database.php';
require_once '../../model/product.php';
require_once '../../../global.php';

$productsDAO = new Product();
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
    if (isset($_GET['id']) && $_GET['id'] != "") {
        $id = $_GET['id'];
        // echo $values;
    } else {
        $MESSAGE = "Không có sản phẩm nào";
        $id = "1";
    }
    if (isset($_POST['searchValue']) && $_POST['searchValue'] != "") {
        $value = $_POST['searchValue'];
    } else {
        $MESSAGE = "Không có sản phẩm nào";
        $value = "";
    }

    if ($value != "") {
        $searchs = $productsDAO->searchProducts($value);
        $productbyCates = $productsDAO->getTotalProductbyCate();
        $VIEW_NAME = 'view/shop/default.php';
        include "../../layout.php";
    }else {
    $searchs = $productsDAO->getProductbyCate($value, $id);
    $productbyCates = $productsDAO->getTotalProductbyCate();
    $VIEW_NAME = 'view/category/default.php';
    include "../../layout.php";
}}
;

<?php

// require_once 'core/Database.php';
require_once '../../model/product.php';
require_once '../../../global.php';
$MESSAGE = '';
$productsDAO = new Product();
if (isset($_GET["action"]) == true) {
    $action = $_GET["action"];
    switch ($action) {
        case 'search':
            // if (isset($_POST['searchValue']) && $_POST['searchValue'] != "") {
            //     $value = $_POST['searchValue'];
            // } else {
            //     $MESSAGE = "Không có sản phẩm nào";
            //     $value = "";
            // }

            // if (isset($_GET['id']) && $_GET['id'] != "") {
            //     $id = $_GET['id'];
            //     // echo $values;
            // } else {
            //     $MESSAGE = "Không có sản phẩm nào";
            //     $id = "1";
            // }
            // $searchs = $productsDAO->getProductbyCate($value, $id);
            // $productbyCates = $productsDAO->getTotalProductbyCate();
            // $VIEW_NAME = 'view/search/index.php';
            include "../../layout.php";
            break;
        case 'detailprod':
            // if (isset($_GET['id']) && $_GET['id'] != "") {
            //     $prodid = $_GET['id'];
            // } else {
            //     $MESSAGE = "Không có sản phẩm nào";
            //     $prodid = "1";
            // }
            // $detail = $productsDAO-> getProductById($prodid);
            // $products = $productsDAO->getAllProducts();
            // $VIEW_NAME = 'view/detailproduct/index.php';
            include "../../layout.php";
            break;
        default:
            // Mặc định hiển thị danh sách sản phẩm
            // $products = $productsDAO->getAllProducts();
            // $VIEW_NAME = $ADMIN_URL.'/view/product/index2.php';
            $VIEW_NAME = 'view/search/index.php';
            include '../layout.php';
            break;
    }
} else {
    if (isset($_POST['searchValue']) && $_POST['searchValue'] != "") {
        $value = $_POST['searchValue'];
    } else {
        $MESSAGE = "Không có sản phẩm nào";
        $value = "";
    }

    $products = $productsDAO->getAllProducts();
    $searchs = $productsDAO->searchProducts($value);
    $productbyCates = $productsDAO->getTotalProductbyCate();
    $VIEW_NAME = 'view/shop/default.php';
    include "../../layout.php";
}
;

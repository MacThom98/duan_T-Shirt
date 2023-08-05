<?php

// require_once 'core/Database.php';
require_once '../../model/product.php';
require_once '../../../global.php';

// $productsDAO = new Product();
if (isset($_GET['action']) == true) {
    $action = $_GET['action'];
    switch ($action) {
        case 'search':
            // Xử lý tìm kiếm
            break;
        case 'checkout':
            $VIEW_NAME = 'view/thank/default.php';
            if (
                isset($_SESSION['info']) &&
                isset($_SESSION['cart']) &&
                count($_SESSION['cart'])> 0
            ) {
                $VIEW_NAME = 'view/thank/default.php';
                $userId = $_SESSION['info']['userId'];
                $name = $_SESSION['info']['userFullname'];
                $email = $_SESSION['info']['userEmail'];
                $phone = $_SESSION['info']['phoneNumber'];
                $address = $_SESSION['info']['address'];
                // $orderId = $OrderModel->addOrder(
                //     $userId,
                //     $name,
                //     $email,
                //     $phone,
                //     $address
                // );
            } 
            else {
                echo "Something wrong";
                // $VIEW_NAME = 'view/login/default.php';
            }
            require '../../layout.php';
            break;
        default:
            // Mặc định hiển thị danh sách sản phẩm
            // $products = $productsDAO->getAllProducts();
            // $VIEW_NAME = $ADMIN_URL.'/view/product/index2.php';
            require '../../layout.php';
            break;
    }
} else {
    $VIEW_NAME = 'view/checkout/default.php';
    include '../../layout.php';
}

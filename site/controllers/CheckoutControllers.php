<?php

// require_once 'core/Database.php';
require_once '../../model/product.php';
require_once '../../model/order.php';
require_once '../../model/user.php';
require_once '../../../global.php';

$OrderModel = new Order();
$UserModel = new User();
$users = $UserModel->getAllUsers();

if(isset($_POST['thanhtoan'])){
    if (isset($_SESSION['user']) && isset($_SESSION['cart']) && count($_SESSION['cart'])> 0) {           
                    $id = $_SESSION['user']['userId'];
                    $name = $_POST['bill_fullname'];
                    $address = $_POST['bill_address'];
                    $email = $_POST['bill_email'];
                    $phone = $_POST['bill_phone'];
                    $newOrderId = $OrderModel->addOrder($id,$name,$email,$phone,$address);
                    
                    // var_dump($_SESSION['cart']);
                    foreach($_SESSION['cart'] as $orderDetail){
                        echo '</br>';
                        $OrderModel->addOrderDetail($newOrderId,(int)$orderDetail['0'],(float)$orderDetail['2'],(int)$orderDetail['4'],(float)$orderDetail['2']*(int)$orderDetail['4'], $orderDetail['5']);
                    }
                    // $OrderModel->addOrderDetail($newOrderId,);
                    $VIEW_NAME = 'view/thank/default.php';
                    $getHD = $OrderModel->getOrderById($newOrderId);
                    $orderDetails = $OrderModel->getOrderDetail($newOrderId);
                    unset($_SESSION['cart']);
                } 
                else {
                    echo "Something wrong";
                    // $VIEW_NAME = 'view/login/default.php';
                }
                require '../../layout.php';
}

// $productsDAO = new Product();
if (isset($_GET['action']) == true) {
    $action = $_GET['action'];
    switch ($action) {
        case 'search':
            // Xử lý tìm kiếm
            break;
        case 'proceed':
            if(isset($_SESSION['user']) && isset($_SESSION['cart']) && $_SESSION['cart'] != null){
                $VIEW_NAME = 'view/checkout/default.php';
                $payments = $OrderModel->getAllPayments();
                require '../../layout.php';
            }else{
                $VIEW_NAME = 'view/user/login.php';
                require '../../layout.php';    
            }
            break;
        case 'checkout':
            $VIEW_NAME = 'view/thank/default.php';
            break;
    }
    require '../../layout.php';
} else {
    $VIEW_NAME = 'view/checkout/default.php';
    include '../../layout.php';
}


if(isset($_POST['dangnhap'])){
    $email = $_POST['username'];
    $pass = $_POST['password'];
    foreach($users as $user){
        if($email != $user['userEmail'] || $pass != $user['password']){
            $MESSAGE = 'Tài khoản hoặc mật khẩu không đúng';
            $VIEW_NAME= 'view/user/login.php';
            break;
        }else if($email == $user['userEmail'] || $pass == $user['password']){
            $_SESSION['user'] = $user;
            $VIEW_NAME = 'view/checkout/default.php';
            $MESSAGE = 'Đăng nhập thành công';
            // require '../../layout.php';
            break;
        }
    }
    require '../../layout.php';
}

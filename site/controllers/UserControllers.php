<?php

// require_once '../../model/product.php';
require_once '../../model/user.php';
require_once '../../model/order.php';
require_once '../../../global.php';

$OrderModel = new Order();
$UserModel = new User();
$AllUsers = $UserModel->getAllUsers();

if (isset($_SESSION['user'])) {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'order':
                $orders = $OrderModel->getOrderByUserId(
                    $_SESSION['user']['userId']
                );
                if (isset($_GET['confirm'])) {
                    $orderId = $_GET['id'];
                    $statusId = $_GET['statusId'];
                    $OrderModel->updateOrderStatus($orderId, $statusId);
                    $orders = $OrderModel->getOrderByUserId(
                        $_SESSION['user']['userId']
                    );
                }
                $VIEW_NAME = 'view/user/order.php';
                break;
            case 'history':
                $orders = $OrderModel->getOrderHistoryByUserId($_SESSION['user']['userId']);
                $VIEW_NAME = 'view/user/history.php';
                break;
            case 'account':
                $VIEW_NAME = 'view/user/account.php';   
                break;
            case 'login':
                $VIEW_NAME = 'view/user/login.php';
                break;
            case 'signup':
                $VIEW_NAME = 'view/user/signup.php';
                break;
            case 'logout':
                unset($_SESSION['user']);
                header('location: ../../');
                break;
            default:
                $VIEW_NAME = 'view/user/order.php';
                break;
        }
    } else {
        echo "nó vô đây nè;";
    }
} else {
    $VIEW_NAME = 'view/user/login.php';
}


if (isset($_POST['dangnhap'])) {
    $userInput = $_POST['username'];
    $passInput = $_POST['password'];
    $error = false;
    foreach($AllUsers as $user){
        if($user['userEmail'] == $userInput && $user['password'] == $passInput){
            $_SESSION['user'] = $user;
            $VIEW_NAME = 'view/home/default.php';
            break;
        } else{
            $error = true;
        };
    }
    if($error){
        $MESSAGE ='Tài khoản hoặc mật khẩu không đúng!';
    }
}
require '../../layout.php';

?>
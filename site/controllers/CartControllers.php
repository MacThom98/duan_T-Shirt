<?php

// require_once 'core/Database.php';
require_once '../../model/product.php';
require_once '../../model/order.php';
require_once '../../../global.php';
// var_dump(array($_POST['quantity']));
// unset($_SESSION['cart']);     

$productsDAO = new Product();
$OrderModel = new Order();

if (isset($_GET["action"]) == true) {
    $action = $_GET["action"];
    switch ($action) {
        case 'addCart':
            // Xử lý dữ liệu gửi lên
            if (isset($_POST['name'])) {
                $id = $_POST['id'];
                $namepro = $_POST['name'];
                $price = $_POST['price'];
                $image = $_POST['img'];
                $qty = 1;
                // Kiểm tra và cập nhật số lượng sản phẩm trong giỏ hàng
                $fg = 0;
                $i = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        if ($item[1] == $namepro) {
                            $qtyNew = $qty + $item[4];
                            $_SESSION['cart'][$i][4] = $qtyNew;
                            $fg = 1;
                            break;
                        }
                        $i++;
                    }
                }

                // Thêm sản phẩm mới vào giỏ hàng
                if ($fg == 0) {
                    $item = array($id, $namepro, $price, $image, $qty);
                    $_SESSION['cart'][] = $item;
                    var_dump($_SESSION['cart']);
                }

                // Tạo mảng kết quả trả về cho Ajax
                $result = array(
                    'status' => 1,
                    'message' => 'Thêm sản phẩm vào giỏ hàng thành công',
                    'cartCount' => count($_SESSION['cart']),
                );
            } else {
                // Tạo mảng kết quả trả về cho Ajax
                $result = array(
                    'status' => 0,
                    'message' => 'Dữ liệu không hợp lệ',
                );
            }

            // Trả về kết quả dưới dạng JSON cho Ajax
            echo json_encode($result);
            var_dump($result);
            echo (count($_SESSION['cart']));
            var_dump(($_SESSION['cart']));
            // unset($_SESSION['cart']);
            $VIEW_NAME = 'view/cart/default.php';
<<<<<<< HEAD
<<<<<<< HEAD
            require '../../layout.php'; 
 
            // $VIEW_NAME = 'view/shop/default.php';
            // include '../layout.php';
=======
>>>>>>> 925662d685f42b438e4e73b2d92e1a743e707945
=======


>>>>>>> 2f8a1c6dd95e6d00d59f5399821df4966bf03742
            break;
   
        case 'proceed':
            if(isset($_SESSION['user']) && isset($_SESSION['cart']) && $_SESSION['cart'] != null){
                $_SESSION['info'] = $_SESSION['user'];
                $VIEW_NAME = 'view/checkout/default.php';
                var_dump($_SESSION['info']);
                require '../../layout.php';
            }else{
                $VIEW_NAME = 'view/login/default.php';
            }
            
            break;
        
        case 'delCart':
            if (isset($_GET['i']) && isset($_SESSION['cart'])) {
                array_splice($_SESSION['cart'], $_GET['i'], 1);
            }else{
                if(isset($_SESSION['cart'])) unset($_SESSION['cart']);
            }
            $VIEW_NAME = 'view/cart/default.php';
            require '../../layout.php';
            break;
        case 'update':
            if(isset($_POST['quantity'])){
            foreach ($_POST['quantity'] as $id => $quantity){
                if (isset($_POST['quantity']) && $_POST['quantity'] == 0) {
                    unset($_SESSION['cart']);     
                }else {
                    echo $_SESSION['cart'][4];
                    $_SESSION['cart'][4] = $_POST['quantity'];
                }
            }}
            $VIEW_NAME = 'view/cart/default.php';
            break;
            case 'checkout':
                
                if (
                    isset($_SESSION['info']) &&
                    isset($_SESSION['cart']) &&
                    count($_SESSION['cart'])> 0
                ) {
                   
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
                     $VIEW_NAME = 'view/thank/default.php';
                } 
                else {
                    echo "Something wrong";
                    // $VIEW_NAME = 'view/login/default.php';
                }
                require '../../layout.php';
                break;
        default:
             $VIEW_NAME = 'view/cart/default.php';
            require '../../layout.php';
            break;
    }
    require "../../layout.php";
} else {
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
<<<<<<< HEAD
<<<<<<< HEAD
        include "layout.php";
    } 
    else {
=======
    } else {
>>>>>>> 925662d685f42b438e4e73b2d92e1a743e707945
=======

    } else {

>>>>>>> 2f8a1c6dd95e6d00d59f5399821df4966bf03742
        $VIEW_NAME = 'view/cart/default.php';
    }

}
require "../../layout.php";

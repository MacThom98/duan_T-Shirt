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
        case 'addCart':
            // Xử lý dữ liệu gửi lên
            if (isset($_POST['name'])) {
                $id = $_POST['id'];
                $namepro = $_POST['name'];
                $price = $_POST['price'];
                $image = $_POST['img'];
                $size = $_POST['shop-sizes'];
                $qty = $_POST['quantity'];
                echo $id;
                // Kiểm tra và cập nhật số lượng sản phẩm trong giỏ hàng
                $fg = 0;
                $i = 0;
                $_SESSION['cart'];
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
                    $item = array($id, $namepro, $price, $image, $qty, $size);
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
            // echo json_encode($result);
            // var_dump($result);
            // echo (count($_SESSION['cart']));
            // var_dump(($_SESSION['cart']));
            $VIEW_NAME = 'view/cart/default.php';
            require '../../layout.php';

            // $VIEW_NAME = 'view/shop/default.php';
            // include '../layout.php';
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
        $prodid = $_GET['id'];
    } else {
        $MESSAGE = "Không có sản phẩm nào";
        $prodid = "1";
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
    } else {
        $detail = $productsDAO->getProductById($prodid);
        $products = $productsDAO->getAllProducts();
        $sizes = $productsDAO-> getAllSize();
        $VIEW_NAME = 'view/detailproduct/default.php';
        include "../../layout.php";
    }
}
;
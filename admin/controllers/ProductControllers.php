<?php

// require_once 'core/Database.php';
require_once '../../model/product.php';
require_once '../../model/category.php';
require_once '../../../global.php';

$ProductModel = new Product();
$CategoryModel = new Category();

extract($_REQUEST); //Bắt buộc phải extract các dữ liệu trong form được POST lên để thực hiện CRUD

// $productsDAO = new Product();
if(isset($_GET["action"])==true){
    $action = $_GET["action"];
    switch ($action) {
        case 'add':
            $VIEW_NAME = 'view/product/addProd.php';    
            $listCategory = $CategoryModel->getAllCategories();        
            // require '../../layout.php';
            if(exist_param("btn_add")){
                try {
                    $ProductModel->addProduct($product_name, $price, $description, $discount, $img, $category_id);
                    unset($product_name, $price, $description, $discount, $img, $category_id);
                    $MESSAGE = "Thêm mới thành công!";
                } catch (Exception $exc) {
                    $MESSAGE = "Thêm mới thất bại!";
                }
            }
            
            // $VIEW_NAME= $ADMIN_URL.'/view/product/';
            // require '../../layout.php';
            break;
        case 'edit':
            // Xử lý sửa sản phẩm
            echo "đã sửa";
            break;
        case 'delete':
            
            echo "đã xóa";
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
            $VIEW_NAME = 'view/product/default.php';
            $products = $ProductModel->getAllProducts();
            $category = $CategoryModel->getAllCategories();
            include "../../layout.php";
            break;
    }
    require '../../layout.php';
}else{
    $VIEW_NAME = 'view/product/default.php';
    $products = $ProductModel->getAllProducts();
    include "../../layout.php";
};



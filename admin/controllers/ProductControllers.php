<?php

// require_once 'core/Database.php';
require_once '../../model/product.php';
require_once '../../model/category.php';
require_once '../../model/discount.php';
require_once '../../model/branch.php';
require_once '../../../global.php';

$ProductModel = new Product();
$CategoryModel = new Category();
$DiscountModel = new Discount();
$BranchModel = new Branch();
extract($_REQUEST); //Bắt buộc phải extract các dữ liệu trong form được POST lên để thực hiện CRUD

// $productsDAO = new Product();
if(isset($_GET["action"])==true){
    $action = $_GET["action"];
    switch ($action) {
        case 'add':
            $VIEW_NAME = 'view/product/addProd.php';    
            $listCategory = $CategoryModel->getAllCategories();        
            $listDiscount = $DiscountModel->getAllDiscounts();        
            $listBranch = $BranchModel->getAllBranches();        
            // require '../../layout.php';
            if(exist_param("btn_add")){
                $productName = convert_name($product_name);
                // $file_name = uploadImage("imageToUpload");
                $img_name = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                $img_dir = $IMAGE_DIR . $img_name;
                if($img_dir && move_uploaded_file($img_tmp,$img_dir)){
                    move_uploaded_file($img_tmp,$img_dir);
                    $MESSAGE = "Chuyển file thành công";
                }else{
                    echo $MESSAGE = "Không tồn tại thư mục đích";
                }
                $img = $img_name ? $img_name : "";
                $categoryId = $_POST['category'];
                try {
                    $ProductModel->addProduct($productName, $price, $description, $discount, $branch, $img, $categoryId,$stock);
                    unset($productName, $price, $description, $discount, $branch, $img, $categoryId,$stock);
                    $MESSAGE = "Thêm mới thành công!";
                } catch (Exception $exc) {
                    $MESSAGE = "Thêm mới thất bại!";
                }
            }
            
            // $VIEW_NAME= $ADMIN_URL.'/view/product/';
            // require '../../layout.php';
            break;
        case 'edit':
            $VIEW_NAME = 'view/product/editProd.php';
            $products = $ProductModel->getAllProducts();
            echo "đã sửa";
            break;
        case 'delete':
            $ProductModel->deleteProduct($id);
            $VIEW_NAME = 'view/product/default.php';
            $products = $ProductModel->getAllProducts();
            $MESSAGE = "Xóa thành công";
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



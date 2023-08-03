<?php
// require_once 'core/Database.php';
require_once '../../model/product.php';
require_once '../../model/category.php';
require_once '../../model/discount.php';
require_once '../../model/branch.php';
require_once '../../../global.php';
if(isset($_GET['keyword_Search'])){
    $keyword=$_GET['keyword_Search'];
}else {
    $keyword=null;
}
$ProductModel = new Product();
$CategoryModel = new Category();
$DiscountModel = new Discount();
$BranchModel = new Branch();
extract($_REQUEST); //Bắt buộc phải extract các dữ liệu trong form được POST lên để thực hiện CRUD

$VIEW_NAME = 'view/category/default.php';
$categories = $CategoryModel->getAllCategories($keyword);

if(isset($_POST['add_btn'])){
        $categoryName = convert_name($category_name);
        try {
            $CategoryModel->addCategory($categoryName);
            unset($categoryName);
            $MESSAGE = 'Thêm mới thành công!';
        } catch (Exception $exc) {
            $MESSAGE = 'Thêm mới thất bại!';
        }
        $categories = $CategoryModel->getAllCategories($keyword);
    }

if(isset($_POST['dels_btn']) && isset($_POST['categoryIds'])) {
        // $VIEW_NAME = 'view/category/delCat.php';
        $selectedCategoryIds = $_POST['categoryIds'];
        // print_r($selectedCategoryIds);
        if (!empty($selectedCategoryIds)) {
            try {
        //         // Gọi phương thức deleteProducts() của lớp Product để xóa sản phẩm
                $success = $CategoryModel->deleteCategoriesSelected($selectedCategoryIds);
    
                if ($success) {
                    $categories = $CategoryModel->getAllCategories($keyword);
                    // Đặt VIEW_NAME và MESSAGE để hiển thị kết quả sau khi xóa
                    $VIEW_NAME = 'view/category/default.php';
        //             // Xóa thành công
                    $MESSAGE = "Xóa thành công";
                } else {
                    $categories = $CategoryModel->getAllCategories($keyword);
                    // Đặt VIEW_NAME và MESSAGE để hiển thị kết quả sau khi xóa
                    $VIEW_NAME = 'view/category/default.php';
                    // Xóa thất bại
                    $MESSAGE = "Xóa thất bại";
                }
            } catch (PDOException $e) {
                // Xử lý lỗi nếu xảy ra
                $MESSAGE =  'Xảy ra lỗi khi xóa sản phẩm ';
            }
        } else {
            // Chưa chọn sản phẩm để xóa
            $MESSAGE = 'Vui lòng chọn ít nhất một sản phẩm để xóa.';
        }
    }

if (isset($_GET['action']) == true) {
    $action = $_GET['action'];
    switch ($action) {
        case 'edit':
            $categoryId = $_GET['id'];
            $cat = $CategoryModel->getCategoryById($categoryId);
            $VIEW_NAME = 'view/category/editCat.php';
            if (exist_param('btn_update')) {
                $categoryName = convert_name($category_name);
                try {
                    $CategoryModel->updateCategory($categoryId, $categoryName);
                    $MESSAGE = 'Sửa thành công!';
                } catch (Exception $exc) {
                    $MESSAGE = 'Sửa thất bại!';
                }
                $categories = $CategoryModel->getAllCategories($keyword);
                $VIEW_NAME = 'view/category/default.php';
            }
            break;
        case 'delete':
            $categoryId = $_GET['id'];
            // Đoạn mã để xóa sản phẩm dựa vào danh sách ID sản phẩm đã chọn
            

        //Xóa loại theo ID truyền vào
            try{
                $CategoryModel->deleteCategory($categoryId);
                // Cập nhật lại danh sách sản phẩm sau khi xóa thành công
                $categories = $CategoryModel->getAllCategories($keyword);
                // Đặt VIEW_NAME và MESSAGE để hiển thị kết quả sau khi xóa
                $VIEW_NAME = 'view/category/default.php';
                $MESSAGE = "Xóa thành công";
            }catch(PDOException $e){
                // Cập nhật lại danh sách sản phẩm sau khi xóa thành công
                $categories = $CategoryModel->getAllCategories($keyword);
                $VIEW_NAME = 'view/category/default.php';
                $MESSAGE = "Không thể xóa vì các ràng buộc";
            }
            break;
        case 'view':
            // Xử lý xem chi tiết sản phẩm
            break;
        case 'statistics':
            // Xử lý thống kê sản phẩm
            break;
    }
}

require '../../layout.php';
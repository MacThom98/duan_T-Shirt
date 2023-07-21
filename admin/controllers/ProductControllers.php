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
if (isset($_GET['action']) == true) {
    $action = $_GET['action'];
    switch ($action) {
        case 'add':
            $VIEW_NAME = 'view/product/addProd.php';
            $listCategory = $CategoryModel->getAllCategories();
            $listDiscount = $DiscountModel->getAllDiscounts();
            $listBranch = $BranchModel->getAllBranches();
            if (exist_param('btn_add')) {
                $productName = convert_name($product_name);
                $img_name = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                $img_dir = $_SERVER['DOCUMENT_ROOT'] . $IMAGE_DIR . $img_name;
                if ($img_dir) {
                    move_uploaded_file($img_tmp, $img_dir);
                    $MESSAGE = 'Chuyển file thành công';
                } else {
                    echo $MESSAGE = 'Không tồn tại thư mục đích';
                }
                $img = $img_name ? $img_name : '';
                $categoryId = $_POST['category'];
                try {
                    $ProductModel->addProduct(
                        $productName,
                        $price,
                        $description,
                        $discount,
                        $branch,
                        $img,
                        $categoryId,
                        $stock
                    );
                    unset(
                        $productName,
                        $price,
                        $description,
                        $discount,
                        $branch,
                        $img,
                        $categoryId,
                        $stock
                    );
                    $MESSAGE = 'Thêm mới thành công!';
                } catch (Exception $exc) {
                    $MESSAGE = 'Thêm mới thất bại!';
                }
            }
            break;
        case 'edit':
            $VIEW_NAME = 'view/product/editProd.php';
            $productId = $_GET['id'];
            $product = $ProductModel->getProductById($productId);
            if (exist_param('btn_update')) {
                $productName = convert_name($product_name);
                $img_existing = $product['image'];
                $img_name = $_FILES['img']['name'];
                $img_tmp = $_FILES['img']['tmp_name'];
                $img_dir = $_SERVER['DOCUMENT_ROOT'] . $IMAGE_DIR . $img_name;
                if ($img_dir) {
                    move_uploaded_file($img_tmp, $img_dir);
                    $MESSAGE = 'Chuyển file thành công';
                } else {
                    echo $MESSAGE = 'Không tồn tại thư mục đích';
                }
                $img = $img_name ? $img_name : $img_existing;
                $price = $_POST['price'];
                $description = $_POST['description'];
                $discount = $_POST['discount'];
                $categoryId = $_POST['category'];
                $stock = $_POST['stock'];
                try {
                    $ProductModel->updateProduct(
                        $productId,
                        $productName,
                        $price,
                        $description,
                        $discount,
                        $img,
                        $categoryId,
                        $stock
                    );
                    // unset($productName, $price, $description, $discount, $branch, $img, $categoryId,$stock);
                    $MESSAGE = 'Sửa thành công!';
                } catch (Exception $exc) {
                    $MESSAGE = 'Sửa thất bại!';
                }
            }
            break;
        case 'delete':
            // Đoạn mã để xóa sản phẩm dựa vào danh sách ID sản phẩm đã chọn
            if (exist_param('btn_delete_selected')) {
                $selectedProductIds = $productIds;
                if (!empty($selectedProductIds)) {
                    try {
                        // Gọi phương thức deleteProducts() của lớp Product để xóa sản phẩm
                        $success = $ProductModel->deleteProducts($selectedProductIds);

                        if ($success) {
                            // Xóa thành công
                            $MESSAGE = "<h5 class='text-dark text-center bg-success pt-2 pb-2 my-2'>Xóa sản phẩm thành công</h5>";
                        } else {
                            // Xóa thất bại
                            $MESSAGE = "<h5 class='text-dark text-center bg-danger pt-2 pb-2 my-2'>Xóa sản phẩm thất bại</h5>";
                        }
                    } catch (PDOException $e) {
                        // Xử lý lỗi nếu xảy ra
                        $MESSAGE =
                            'Xảy ra lỗi khi xóa sản phẩm: ' . $e->getMessage();
                    }
                } else {
                    // Chưa chọn sản phẩm để xóa
                    $MESSAGE = 'Vui lòng chọn ít nhất một sản phẩm để xóa.';
                }
            }

        //Xóa sản phẩm theo ID truyền vào
            try{
            $ProductModel->deleteProduct($id);
        
            // Cập nhật lại danh sách sản phẩm sau khi xóa thành công
            $products = $ProductModel->getAllProducts();
            
            // Đặt VIEW_NAME và MESSAGE để hiển thị kết quả sau khi xóa
            $VIEW_NAME = 'view/product/default.php';
            $MESSAGE = "<h5 class='text-dark text-center bg-success pt-2 pb-2 my-2'>Xóa sản phẩm thành công</h5>";
            }catch(PDOException $e){
                    // Cập nhật lại danh sách sản phẩm sau khi xóa thành công
                $products = $ProductModel->getAllProducts();
                $VIEW_NAME = 'view/product/default.php';
                $MESSAGE = "<h5 class='text-dark text-center bg-danger pt-2 pb-2 my-2'>Không thể xóa sản phẩm này vì các ràng buộc</h5>";
                
                
            }
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
            include '../../layout.php';
            break;
    }
    require '../../layout.php';
} else {
    $VIEW_NAME = 'view/product/default.php';
    $products = $ProductModel->getAllProducts();
    include '../../layout.php';
}

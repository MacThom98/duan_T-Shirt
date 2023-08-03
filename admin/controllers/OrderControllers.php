<?php // require_once 'core/Database.php';
require_once '../../model/product.php';
require_once '../../model/category.php';
require_once '../../model/discount.php';
require_once '../../model/branch.php';
require_once '../../model/order.php';
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
$OrderModel = new Order();


extract($_REQUEST); //Bắt buộc phải extract các dữ liệu trong form được POST lên để thực hiện CRUD

if(isset($_GET['panigation'])){
    // $VIEW_NAME = 'view/product/default.php';
    $orders = $OrderModel->getAllOrders($keyword);
    // include '../../layout.php';
}else{
    $_SESSION['page_no'] = 0;
    $orders = $OrderModel->getAllOrders($keyword);
}

if(isset($_GET['confirm'])){
    $orderId = $_GET['id'];
    $statusId = $_GET['statusId'];
    $OrderModel->updateOrderStatus($orderId,$statusId);
    $orders = $OrderModel->getAllOrders($keyword);
}

if (isset($_GET['action']) == true) {
    $action = $_GET['action'];
    switch ($action) {
        case 'add':
            $VIEW_NAME = 'view/order/addOrder.php';
            $products = $ProductModel->getAllProducts($keyword);
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
                $OrderModel->deleteOrder($id);
                // Cập nhật lại danh sách sản phẩm sau khi xóa thành công
                $orders = $OrderModel->getAllOrders($keyword);
                
                
                // Đặt VIEW_NAME và MESSAGE để hiển thị kết quả sau khi xóa
                $VIEW_NAME = 'view/order/default.php';
                $MESSAGE = "<h5 class='text-dark text-center bg-success pt-2 pb-2 my-2'>Xóa thành công</h5>";
            }catch(PDOException $e){
                    // Cập nhật lại danh sách sản phẩm sau khi xóa thành công
                $orders = $OrderModel->getAllOrders($keyword);
                $VIEW_NAME = 'view/order/default.php';
                $MESSAGE = "<h5 class='text-dark text-center bg-danger pt-2 pb-2 my-2'>Không thể xóa vì các ràng buộc</h5>";
                
                
            }
            break;
        case 'view_detail':
            // Xử lý xem chi tiết đơn hàng
            $VIEW_NAME = 'view/order/detail.php';
            $details = $OrderModel->getOrderDetail($id);
            $thanhtien = 0;
            break;
        case 'search':
            // Xử lý tìm kiếm sản phẩm
            break;
        case 'statistics':
            // Xử lý thống kê sản phẩm
            break;
        default:
            // Mặc định hiển thị danh sách sản phẩm
            $VIEW_NAME = 'view/order/default.php';
            $orders = $OrderModel->getAllOrders($keyword);
            include '../../layout.php';
            break;
    }
    require '../../layout.php';
} else {
    $VIEW_NAME = 'view/order/default.php';
    $orders = $OrderModel->getAllOrders($keyword);
    include '../../layout.php';
}

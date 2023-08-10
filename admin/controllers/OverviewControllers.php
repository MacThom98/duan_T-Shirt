<?php
// require_once 'core/Database.php';
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
$OrderModel = new Order();
$BranchModel = new Branch();
extract($_REQUEST); //Bắt buộc phải extract các dữ liệu trong form được POST lên để thực hiện CRUD


if (isset($_GET['action']) == true) {
    $action = $_GET['action'];
    switch ($action) {
        case 'edit':
            break;
        case 'delete':
            break;
        case 'view':
            // Xử lý xem chi tiết sản phẩm
            break;
        case 'statistics':
            // Xử lý thống kê sản phẩm
            break;
        default:
        $VIEW_NAME = 'view/overview/default.php';
        $orders = $OrderModel->getTotalOder();
        break;
    }
}
$VIEW_NAME = 'view/overview/default.php';
$orders = $OrderModel->getTotalOder();
$topSales = $OrderModel->getTopSale();
$ordersSucess = $OrderModel->getTotalSaleSucess();
$ordersUnSucess = $OrderModel->getTotalSaleUnsuccess();
$ordersByDays = $OrderModel->getTottalByDay();
$ordersByWeeks = $OrderModel->getTottalByWeek();
$ordersByMonths = $OrderModel->getTottalByMonth();
require '../../layout.php';
<!-- Các thao tác admin có thể thực hiện với product như: -->
<?php
require_once 'pdo.php';

class Order
    {
    // public function getAllOrder($search)
    // {

    //     global $PER_PAGE;

    //     $row_count = pdo_query_value("SELECT count(*) FROM (SELECT p.productId, p.productName, p.price, p.description, p.created_at, p.updated_at, p.categoryId,
    //     c.categoryName, p.discountId, p.branchId, p.stock, p.image, b.branchName, d.discountName, d.discountValue
    //    FROM product p  
    //    LEFT JOIN branch b ON p.branchId = b.branchId
    //    LEFT JOIN discount d ON p.discountId = d.discountId
    //    LEFT JOIN category c ON p.categoryId = c.categoryId
    //    where p.productName LIKE '%$search%') as record");
    //     $_SESSION['page_count'] = ceil(($row_count / $PER_PAGE) * 1.0);
    //     if (!isset($_SESSION['page_no'])) {
    //         $_SESSION['page_no'] = 0;
    //     } else if (exist_param('page_no')) {
    //         $_SESSION['page_no'] = $_REQUEST['page_no'];
    //     }
    //     if ($_SESSION['page_no'] < 0) {
    //         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
    //     }
    //     if ($_SESSION['page_no'] > $_SESSION['page_count'] - 1) {
    //         $_SESSION['page_no'] = 0;
    //     }
    //     $start = $PER_PAGE * $_SESSION['page_no'];
    //     $sql = "SELECT p.productId, p.productName, p.price, p.description, p.created_at, p.updated_at, p.categoryId,
    //          c.categoryName, p.discountId, p.branchId, p.stock, p.image, b.branchName, d.discountName, d.discountValue
    //         FROM product p  
    //         LEFT JOIN branch b ON p.branchId = b.branchId
    //         LEFT JOIN discount d ON p.discountId = d.discountId
    //         LEFT JOIN category c ON p.categoryId = c.categoryId
    //         where p.productName LIKE ? 
    //         ORDER BY p.productId LIMIT $start,$PER_PAGE";
    //     $products = pdo_query($sql, '%' . $search . '%');
    //     return $products;
    // }

    public function getAllOrders($search){
        $sql = "SELECT * FROM orders ord
        left join user u on ord.userId = u.userId
        left join payment pay on pay.paymentId = ord.paymentId
        left join delivery deli on deli.deliveryId = ord.deliveryId
        WHERE ord.orderId like ?";
        $orders = pdo_query($sql,'%' .$search. '%');
        return $orders;
    }

    public function getOrderDetail($orderId){
        $sql = "SELECT *, orderdetails.sizeId AS sizeID  FROM orderdetails join product on orderdetails.productId = product.productId  WHERE orderId = $orderId";
        $detail = pdo_query($sql);
        return $detail;
    }
    public function getOrderById($orderId)
    {
        $sql = "SELECT * FROM orders WHERE orderId = $orderId";
        $order = pdo_query_one($sql);
        return $order;
    }
    public function getOrderByUserId($userId)
    {
        $sql = "SELECT * FROM orderdetails od
        join orders o  
        ON o.orderId = od.orderId
		JOIN payment pay 
        ON o.paymentId = pay.paymentId
  		WHERE userId = $userId having statusId < 3";
        $order = pdo_query($sql);
        return $order;
    }
    public function getOrderHistoryByUserId($userId)
    {
        $sql = "SELECT * FROM orders o 
        join orderdetails od
        ON o.orderId = od.orderId  WHERE userId = $userId
        having statusId > 2";
        $order = pdo_query($sql);
        return $order;
    }

    public function addOrder($userId, $fullname, $email, $phone, $address) {
        $sql = 'INSERT INTO orders (userId, fullname, email, phoneNumber, addressDelivery) VALUES (?, ?, ?, ?, ?)';
        pdo_execute($sql, $userId, $fullname, $email, $phone, $address);
        $lastest_id = "SELECT orderId FROM orders order by orderId desc limit 1";
        return pdo_query_value($lastest_id);
    }

    public function addOrderDetail($orderId,$productId,$price,$quantity,$totalMoney, $sizeId){
        $sql = 'INSERT INTO orderdetails(orderId,productId,price,quantity,totalMoney, sizeID) VALUES (?,?,?,?,?,?)';
        return pdo_execute($sql,$orderId,$productId,$price,$quantity,$totalMoney, $sizeId); 
    }

    public function updateOrderStatus($orderId, $statusId) {
        $sql = "UPDATE orders SET statusId = ? + 1 WHERE orderId = $orderId";
        pdo_execute($sql,$statusId);
    }

    
    public function deleteOrder($orderId)
    {
        $sql = 'DELETE FROM orders WHERE orderId = ?';
        pdo_execute($sql, $orderId);
    }
    // Phương thức để xóa 1 hoặc nhiều sản phẩm dựa vào danh sách các ID sản phẩm
    public function deleteOrders($OrderIds)
    {
        if (empty($OrderIds)) {
            return false; // Không có sản phẩm để xóa
        }
        if (is_array($OrderIds)) {
            foreach ($OrderIds as $OrderId) {
                $sql = "DELETE FROM Order WHERE OrderId = $OrderId";
                pdo_query($sql);
            }
        }
    }

    public function getAllPayments(){
        $sql = 'Select * from payment';
        return pdo_query($sql);
    }
    public function searchOrders($keyword)
    {
        $sql = 'SELECT * FROM Order WHERE name LIKE ?';
        $Orders = pdo_query($sql, '%' . $keyword . '%');
        return $Orders;
    }
}


?>

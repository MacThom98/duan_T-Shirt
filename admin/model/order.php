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

    public function getAllOrders($search)
    {
        $sql = "SELECT * FROM orders ord
        left join user u on ord.userId = u.userId
        left join payment pay on pay.paymentId = ord.paymentId
        left join statusOrder status on status.statusId = ord.statusId
        WHERE ord.orderId like ?";
        $orders = pdo_query($sql, '%' . $search . '%');
        return $orders;
    }

    public function getOrderDetail($orderId)
    {
        $sql = "SELECT * FROM orderdetails WHERE orderId = $orderId";
        $detail = pdo_query($sql);
        return $detail;
    }
    public function getOrderById($OrderId)
    {
        $sql = "SELECT p.OrderId, p.OrderName, p.price, p.description, p.created_at, p.updated_at, p.categoryId, c.categoryName, p.discountId, p.branchId, p.stock, p.image, b.branchName, d.discountName, d.discountValue
            FROM Order p  
            LEFT JOIN branch b ON p.branchId = b.branchId
            LEFT JOIN discount d ON p.discountId = d.discountId
            LEFT JOIN category c ON p.categoryId = c.categoryId WHERE OrderId = $OrderId";
        $Order = pdo_query_one($sql);
        return $Order;
    }

    public function addOrder($userId, $fullname, $email, $phone, $address, $note, $paymentId)
    {
        $sql = 'INSERT INTO orders (userId, fullname, email, phoneNumber, addressDelivery, note, paymentId) VALUES (?, ?, ?, ?, ?, ?, ?)';
        pdo_execute($sql, $userId, $fullname, $email, $phone, $address, $note, $paymentId);
    }

    public function addOrderDetail($orderId, $productId, $price, $quantity, $totalMoney)
    {
        $sql = 'INSERT INTO orderdetails(orderId,productId,price,quantity,totalMoney) VALUES (?,?,?,?,?,?)';
        pdo_execute($sql, $orderId, $productId, $price, $quantity, $totalMoney);
    }

    public function updateOrderStatus($orderId, $statusId)
    {
        $sql = "UPDATE orders SET statusId = ? + 1 WHERE orderId = $orderId";
        pdo_execute($sql, $statusId);
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

    public function searchOrders($keyword)
    {
        $sql = 'SELECT * FROM Order WHERE name LIKE ?';
        $Orders = pdo_query($sql, '%' . $keyword . '%');
        return $Orders;
    }


    public function getTotalOder()
    {
        $sql = "SELECT COUNT(DISTINCT orders.orderId) AS TotalDistinctCount, SUM(orderdetails.totalMoney) AS TotalMoney
        FROM orders
        JOIN orderdetails ON orders.orderId = orderdetails.orderId
        WHERE statusId = 3;";
        $categories = pdo_query_one($sql);
        return $categories;
    }

    public function getTotalSaleSucess()
    {
        $sql = "SELECT orderdetails.orderId as cateId, SUM(orderdetails.quantity) AS TotalQuantity, sum(orderdetails.totalMoney) as totalMoney FROM orders JOIN orderdetails on orders.orderId = orderdetails.orderId JOIN product on orderdetails.productId = product.productId JOIN category on category.categoryId = product.categoryId where statusId =3 GROUP BY orderdetails.orderId";
        $categories = pdo_query($sql);
        return $categories;
    }
    public function getTotalSaleUnsuccess()
    {
        $sql = "SELECT COUNT(orderdetails.orderId) as total, orderdetails.orderId as cateId, SUM(orderdetails.quantity) AS TotalQuantity, sum(orderdetails.totalMoney) as totalMoney FROM orders JOIN orderdetails on orders.orderId = orderdetails.orderId JOIN product on orderdetails.productId = product.productId JOIN category on category.categoryId = product.categoryId where orders.statusId = 6 GROUP BY orderdetails.orderId";
        $categories = pdo_query($sql);
        return $categories;
    }

    public function getTopSale()
    {
        $sql = "SELECT product.productName, SUM(orderdetails.quantity) AS TotalSold, SUM(orderdetails.totalMoney) AS Revenue FROM orderdetails JOIN product on orderdetails.productId = product.productId GROUP BY product.productName ORDER BY `TotalSold` DESC";
        $categories = pdo_query($sql);
        return $categories;
    }

    public function getTottalByDay()
    {
        $sql = "SELECT DATE(orders.orderDate) AS Date, SUM(orderdetails.totalMoney) AS Revenue, SUM(orderdetails.quantity) AS TotalProductsSold
        FROM orders
        JOIN orderdetails ON orders.orderId = orderdetails.orderId
        WHERE orders.statusId = 3
        GROUP BY DATE(orders.orderDate);";
        $categories = pdo_query($sql);
        return $categories;
    }

    public function getTottalByWeek()
    {
        $sql = "SELECT YEAR(orders.orderDate) AS Year,
         WEEK(orders.orderDate) AS Week, 
         SUM(orderdetails.totalMoney) AS Revenue, 
         SUM(orderdetails.quantity) AS TotalProductsSold
        FROM orders
        JOIN orderdetails ON orders.orderId = orderdetails.orderId
        WHERE orders.statusId = 3
        GROUP BY YEAR(orders.orderDate), WEEK(orders.orderDate);";
        $categories = pdo_query($sql);
        return $categories;
    }

    public function getTottalByMonth()
    {
        $sql = "SELECT YEAR(orders.orderDate) AS Year,
        MONTH(orders.orderDate) AS Month,
        SUM(orderdetails.totalMoney) AS Revenue,
        SUM(orderdetails.quantity) AS TotalProductsSold
 FROM orders
 JOIN orderdetails ON orders.orderId = orderdetails.orderId
 WHERE orders.statusId = 3
 GROUP BY YEAR(orders.orderDate), MONTH(orders.orderDate);";
        $categories = pdo_query($sql);
        return $categories;
    }




}



?>
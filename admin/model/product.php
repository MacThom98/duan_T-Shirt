<!-- Các thao tác admin có thể thực hiện với product như: -->
<?php
require_once 'pdo.php';

class Product
{
    public function getAllProducts($search)
    {

        global $PER_PAGE;

        $row_count = pdo_query_value("SELECT count(*) FROM (SELECT p.productId, p.productName, p.price, p.description, p.created_at, p.updated_at, p.categoryId,
        c.categoryName, p.discountId, p.branchId, p.stock, p.image, b.branchName, d.discountName, d.discountValue, s.sizeName
       FROM product p  
       LEFT JOIN branch b ON p.branchId = b.branchId
       LEFT JOIN discount d ON p.discountId = d.discountId
       LEFT JOIN category c ON p.categoryId = c.categoryId
       LEFT JOIN size s ON p.sizeId = s.sizeId
       where p.productName LIKE '%$search%') as record");
        $_SESSION['page_count'] = ceil(($row_count / $PER_PAGE) * 1.0);
        if (!isset($_SESSION['page_no'])) {
            $_SESSION['page_no'] = 0;
        } else if (exist_param('page_no')) {
            $_SESSION['page_no'] = $_REQUEST['page_no'];
        }
        if ($_SESSION['page_no'] < 0) {
            $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
        }
        if ($_SESSION['page_no'] > $_SESSION['page_count'] - 1) {
            $_SESSION['page_no'] = 0;
        }
        $start = $PER_PAGE * $_SESSION['page_no'];
        $sql = "SELECT p.productId, p.productName, p.price, p.description, p.created_at, p.updated_at, p.categoryId,
             c.categoryName, p.discountId, p.branchId, p.stock, p.image, b.branchName, d.discountName, d.discountValue, s.sizeName
            FROM product p  
            LEFT JOIN branch b ON p.branchId = b.branchId
            LEFT JOIN discount d ON p.discountId = d.discountId
            LEFT JOIN category c ON p.categoryId = c.categoryId
            LEFT JOIN size s ON p.sizeId = s.sizeId
            where p.productName LIKE ? 
            ORDER BY p.productId LIMIT $start,$PER_PAGE";
        $products = pdo_query($sql, '%' . $search . '%');
        return $products;
    }

    public function getProductById($productId)
    {
        $sql = "SELECT p.productId, p.productName, p.price, p.description, p.created_at, p.updated_at, p.categoryId, 
            c.categoryName, p.discountId, p.branchId, p.stock, p.image, b.branchName, d.discountName, d.discountValue, s.sizeName
            FROM product p  
            LEFT JOIN branch b ON p.branchId = b.branchId
            LEFT JOIN discount d ON p.discountId = d.discountId
            LEFT JOIN category c ON p.categoryId = c.categoryId 
            LEFT JOIN size s ON p.sizeId = s.sizeId
            WHERE productId = $productId";
$product = pdo_query_one($sql);
        return $product;
    }

    public function addProduct(
        $name,
        $price,
        $description,
        $discount,
        $branch,
        $img,
        $categoryId,
        $stock, 
        $sizeId
    ) {
        $sql =
            'INSERT INTO product (productName, price, description, discountId, branchId, image, categoryId,stock,sizeId) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)';
        pdo_execute(
            $sql,
            $name,
            $price,
            $description,
            $discount,
            $branch,
            $img,
            $categoryId,
            $stock,
            $sizeId
        );
    }

    public function updateProduct(
        $productId,
        $name,
        $price,
        $description,
        $discount,
        $img,
        $categoryId,
        $stock
    ) {
        $sql = "UPDATE product 
                SET productName = ?, price = ?, description = ?, discountId = ?, image = ?, categoryId = ?, stock = ? 
                WHERE productId = $productId";
        pdo_execute(
            $sql,
            $name,
            $price,
            $description,
            $discount,
            $img,
            $categoryId,
            $stock
        );
    }

    public function deleteProduct($productId)
    {
        $sql = 'DELETE FROM product WHERE productId = ?';
        pdo_execute($sql, $productId);
    }
    // Phương thức để xóa 1 hoặc nhiều sản phẩm dựa vào danh sách các ID sản phẩm
    public function deleteProducts($productIds)
    {
        if (empty($productIds)) {
            return false; // Không có sản phẩm để xóa
        }
        if (is_array($productIds)) {
            foreach ($productIds as $productId) {
                $sql = "DELETE FROM product WHERE productId = $productId";
                pdo_query($sql);
            }
        }
    }

    public function searchProducts($keyword)
    {
        $sql = 'SELECT * FROM product WHERE name LIKE ?';
        $products = pdo_query($sql, '%' . $keyword . '%');
        return $products;
    }
}


?>

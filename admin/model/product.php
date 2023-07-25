    <!-- Các thao tác admin có thể thực hiện với product như: -->
    <?php
    require_once 'pdo.php';

    class Product
    {
        public function getAllProducts()
        {
            $sql = "SELECT p.productId, p.productName, p.price, p.description, p.created_at, p.updated_at, p.categoryId, c.categoryName, p.discountId, p.branchId, p.stock, p.image, b.branchName, d.discountName, d.discountValue
            FROM product p  
            LEFT JOIN branch b ON p.branchId = b.branchId
            LEFT JOIN discount d ON p.discountId = d.discountId
            LEFT JOIN category c ON p.categoryId = c.categoryId;
            ";
            $products = pdo_query($sql);
            return $products;
        }

        public function getProductById($productId)
        {
            $sql = "SELECT p.productId, p.productName, p.price, p.description, p.created_at, p.updated_at, p.categoryId, c.categoryName, p.discountId, p.branchId, p.stock, p.image, b.branchName, d.discountName, d.discountValue
            FROM product p  
            LEFT JOIN branch b ON p.branchId = b.branchId
            LEFT JOIN discount d ON p.discountId = d.discountId
            LEFT JOIN category c ON p.categoryId = c.categoryId WHERE productId = $productId";
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
            $stock
        ) {
            $sql =
                'INSERT INTO product (productName, price, description, discountId, branchId, image, categoryId,stock) VALUES (?, ?, ?, ?, ?, ?, ?,?)';
            pdo_execute(
                $sql,
                $name,
                $price,
                $description,
                $discount,
                $branch,
                $img,
                $categoryId,
                $stock
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
            $sql = "UPDATE product SET productName = ?, price = ?, description = ?, discountId = ?, image = ?, categoryId = ?, stock = ? WHERE productId = $productId";
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
            };
            if(is_array($productIds)){
            foreach($productIds as $productId){
                $sql = "DELETE FROM product WHERE productId = $productId";
                pdo_query($sql);
            };
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

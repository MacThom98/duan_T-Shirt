    <!-- Các thao tác admin có thể thực hiện với product như: -->
    <?php

    require_once 'pdo.php';

    class Product {
        public function getAllProducts() {
            $sql = "SELECT * FROM product prod 
            inner join category cat on prod.categoryId = cat.categoryId
            inner join branch on branch.branchId = prod.branchId
            inner join gallery img on prod.productId = img.productId  ";
            $products = pdo_query($sql);
            return $products;
        }

        public function getProductById($productId) {
            $sql = "SELECT * FROM product WHERE id = $productId";
            $product = pdo_query_one($sql);
            return $product;
        }

        public function addProduct($name, $price, $description, $discount, $img, $categoryId) {
            $sql = "INSERT INTO product (productName, price, description, discount, thumbnail, categoryId ) VALUES (?, ?, ?, ?, ?, ?)";
            pdo_execute($sql, $name, $price, $description, $discount, $img, $categoryId);
        }

        public function updateProduct($productId, $name, $price, $description) {
            $sql = "UPDATE product SET name = ?, price = ?, description = ? WHERE id = ?";
            pdo_execute($sql, $name, $price, $description, $productId);
        }

        public function deleteProduct($productId) {
            $sql = "DELETE FROM product WHERE id = ?";
            pdo_execute($sql, $productId);
        }

        public function searchProducts($keyword) {
            $sql = "SELECT * FROM product WHERE name LIKE ?";
            $products = pdo_query($sql, '%' . $keyword . '%');
            return $products;
        }
    }

    ?>
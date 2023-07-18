    <!-- Các thao tác admin có thể thực hiện với product như: -->
    <?php

    require_once 'pdo.php';

    class Product {
        public function getAllProducts() {


            $sql = "SELECT p.productId, p.productName, p.price, p.description, p.created_at, p.updated_at, p.categoryId, c.categoryName, p.discountId, p.branchId, p.stock, p.image, b.branchName, d.discountName, d.discountValue
            FROM product p  
            LEFT JOIN branch b ON p.branchId = b.branchId
            LEFT JOIN discount d ON p.discountId = d.discountId
            LEFT JOIN category c ON p.categoryId = c.categoryId;
            ";

            $products = pdo_query($sql);
            return $products;
        }

        public function getProductById($productId) {
            $sql = "SELECT * FROM product WHERE id = $productId";
            $product = pdo_query_one($sql);
            return $product;
        }

        public function addProduct($name, $price, $description, $discount, $branch, $img, $categoryId,$stock) {
            $sql = "INSERT INTO product (productName, price, description, discountId, branchId, image, categoryId,stock) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
            pdo_execute($sql, $name, $price, $description, $discount, $branch, $img, $categoryId,$stock);
        }



        public function updateProduct($productId, $name, $price, $description) {
            $sql = "UPDATE product SET name = ?, price = ?, description = ? WHERE id = ?";
            pdo_execute($sql, $name, $price, $description, $productId);
        }

        public function deleteProduct($productId) {
            $sql = "DELETE FROM product WHERE productId = ?";
            pdo_execute($sql, $productId);
        }

        public function searchProducts($keyword) {
            $sql = "SELECT * FROM product WHERE name LIKE ?";
            $products = pdo_query($sql, '%' . $keyword . '%');
            return $products;
        }
    }

    ?>
Các thao tác admin có thể thực hiện với product như:
<?php

require_once 'pdo.php';

class Product {
    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $products = pdo_query($sql);
        return $products;
    }

    public function getProductById($productId) {
        $sql = "SELECT * FROM products WHERE id = $productId";
        $product = pdo_query_one($sql);
        return $product;
    }

    public function addProduct($name, $price, $description) {
        $sql = "INSERT INTO products (name, price, description) VALUES (?, ?, ?)";
        pdo_execute($sql, $name, $price, $description);
    }

    public function updateProduct($productId, $name, $price, $description) {
        $sql = "UPDATE products SET name = ?, price = ?, description = ? WHERE id = ?";
        pdo_execute($sql, $name, $price, $description, $productId);
    }

    public function deleteProduct($productId) {
        $sql = "DELETE FROM products WHERE id = ?";
        pdo_execute($sql, $productId);
    }

    public function searchProducts($keyword) {
        $sql = "SELECT * FROM products WHERE name LIKE ?";
        $products = pdo_query($sql, '%' . $keyword . '%');
        return $products;
    }
}

?>
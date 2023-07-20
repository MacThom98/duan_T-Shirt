<!-- Các thao tác admin có thể thực hiện với product như: -->
<?php

require_once 'pdo.php';

class Product {
    public function getAllProducts() {
        
        $current_page = 1;
        if(isset($_GET['page'])){
            $current_page = $_GET['page'];
        }        
        $index = ($current_page - 1) * 6;
        // var_dump($result);

        $sql = "SELECT * FROM product limit $index,6";
        $products = pdo_query($sql);
        return $products;
    }
    public function count(){
        $sql = "SELECT COUNT(id) as number from product";
        $result = pdo_query($sql);
        $number = 1;
        if($result != null && $number > 0){
            $number = $result[0] ['number'];
        }
        $page = ceil($number / 6);
        $current_page = 1;
                  if(isset($_GET['page'])){
                      $current_page = $_GET['page'];
                  }        
                  $index = ($current_page - 1) * 6;
        return $page;
        
    }
    

    public function getProductById($productId) {
        $sql = "SELECT * FROM product WHERE id = $productId";
        $product = pdo_query_one($sql);
        return $product;
    }
    public function paging(){
        $sql = "SELECT title, price,thumbnail,description from product";
        $page = pdo_query_one($sql);
        return $page;
    }
    public function addProduct($name, $price, $description) {
        $sql = "INSERT INTO product (name, price, description) VALUES (?, ?, ?)";
        pdo_execute($sql, $name, $price, $description);
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
<!-- Các thao tác admin có thể thực hiện với product như: -->
<?php

require_once 'pdo.php';

class Product {
    public function getAllProducts() {
        $sql = "SELECT * FROM product as prod inner join gallery as gal on prod.productId = gal.productId";
        $products = pdo_query($sql);
        return $products;
    }

    public function getTotalProductbyCate() {
        $sql = "SELECT *, COUNT(prod.productId) as total, cat.categoryName as cateName, cat.categoryId as cateId
                        FROM product as prod INNER join category as cat on cat.categoryId = prod.categoryId  
                        GROUP BY cat.categoryId";
        $products = pdo_query($sql);
        return $products;
    }

    public function getProductById($productId) {
        $sql = "SELECT * FROM product as prod INNER JOIN gallery as gal 
                            ON prod.productId = gal.productId 
                            WHERE prod.productId = $productId";
        $product = pdo_query_one($sql);
        return $product;
    }

    public function getProductbyCate($value, $id) {
        $sql = "SELECT prod.productId as prodId, prod.productName as prodName, prod.price as price, gallery.galleryURL as imageUrl FROM gallery JOIN product AS prod ON gallery.productId = prod.productId ";
        if($value != ""){
            $sql .= " and prod.productName LIKE   '% . $value . %'";
        }
        if($id != ""){
            $sql .= " join category as cat on cat.categoryId = prod.categoryId  
                WHERE cat.categoryId =  $id";
        }
        $result = pdo_query($sql);
        return $result;
    }

    public function getProductbyCategory($cateId) {
        $sql = "SELECT prod.productId as prodId, prod.productName as prodName, 
        prod.price as price, gallery.galleryURL as imageUrl
        FROM gallery RIGHT JOIN product AS prod ON gallery.productId = prod.productId 
        right join category as cat on cat.categoryId = prod.categoryId  
        WHERE cat.categoryId =  $cateId";
        $product = pdo_query_one($sql);
        return $product;
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
        $sql = "SELECT prod.productId as prodId, prod.productName as prodName,
        prod.price as price, gallery.galleryURL as imageUrl
        FROM product as prod JOIN gallery 
        ON prod.productId = gallery.productId 
        WHERE productName LIKE ?";
        $products = pdo_query($sql, '%' . $keyword . '%');
        return $products;
    }


    
}

?>
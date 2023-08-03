<?php

require_once 'pdo.php';

class Category{
    public function getAllCategories($searchCat) {
        $sql = "SELECT cat.categoryId, cat.categoryName, COUNT(prod.productId) as productCount 
        FROM category cat
        left JOIN product prod ON cat.categoryId = prod.categoryId 
        where cat.categoryName like ?
        GROUP BY cat.categoryId;";
        return pdo_query($sql,"%".$searchCat."%");
    }
    public function getCategoryById($categoryId) {
        $sql = "SELECT * FROM Category WHERE categoryId = ?";
        $category = pdo_query_one($sql, $categoryId);
        return $category;
    }
    public function getListCategoryNotIn($categoryId) {
        $sql = "SELECT * FROM Category WHERE categoryId NOT IN ($categoryId);";
        return pdo_query($sql);
    }
    public function addCategory($name) {
        $sql = "INSERT INTO category (categoryName) VALUES (?)";
        pdo_execute($sql, $name);
    }

    public function updateCategory($categoryId, $categoryName) {
        $sql = "UPDATE Category SET categoryName = ? WHERE categoryId = ?";
        pdo_execute($sql, $categoryName, $categoryId);
    }

    public function deleteCategory($categoryId) {
        $sql = "DELETE FROM Category WHERE categoryid = ?";
        pdo_execute($sql, $categoryId);
    }
    public function searchCategories($keyword) {
        $sql = "SELECT * FROM Category WHERE name LIKE ?";
        $categories = pdo_query($sql, '%' . $keyword . '%');
        return $categories;
    }
    
    public function deleteCategoriesSelected($categoriesSelected){
        if (empty($categoriesSelected)) {
            return false; // Không có sản phẩm để xóa
        }else{
        if (is_array($categoriesSelected)) {
            foreach ($categoriesSelected as $categoryId) {
                $sql = "DELETE FROM category WHERE categoryId = $categoryId";
                pdo_query($sql);
            };
            return true;
        }
        }
    }
}

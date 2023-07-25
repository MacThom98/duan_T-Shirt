<?php

require_once 'pdo.php';

class Category{
    public function getAllCategories() {
        $sql = "SELECT * FROM category";
        return pdo_query($sql);
    }

    public function getCategoryById($categoryId) {
        $sql = "SELECT * FROM Category WHERE categoryid = ?";
        $category = pdo_query_one($sql, $categoryId);
        return $category;
    }
    public function getListCategoryNotIn($categoryId) {
        $sql = "SELECT * FROM Category WHERE categoryId NOT IN ($categoryId);";
        return pdo_query($sql);
    }
    public function addCategory($name, $description) {
        $sql = "INSERT INTO Category (name, description) VALUES (?, ?)";
        pdo_execute($sql, $name, $description);
    }

    public function updateCategory($categoryId, $name, $description) {
        $sql = "UPDATE Category SET name = ?, description = ? WHERE id = ?";
        pdo_execute($sql, $name, $description, $categoryId);
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
    
}

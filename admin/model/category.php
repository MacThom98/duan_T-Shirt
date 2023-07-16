<?php

require_once 'pdo.php';

class Category{
    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        $categories = pdo_query($sql);
        return $categories;
    }

    public function getCategoryById($categoryId) {
        $sql = "SELECT * FROM categories WHERE id = ?";
        $category = pdo_query_one($sql, $categoryId);
        return $category;
    }

    public function addCategory($name, $description) {
        $sql = "INSERT INTO categories (name, description) VALUES (?, ?)";
        pdo_execute($sql, $name, $description);
    }

    public function updateCategory($categoryId, $name, $description) {
        $sql = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
        pdo_execute($sql, $name, $description, $categoryId);
    }

    public function deleteCategory($categoryId) {
        $sql = "DELETE FROM categories WHERE id = ?";
        pdo_execute($sql, $categoryId);
    }
    public function searchCategories($keyword) {
        $sql = "SELECT * FROM categories WHERE name LIKE ?";
        $categories = pdo_query($sql, '%' . $keyword . '%');
        return $categories;
    }
    
}

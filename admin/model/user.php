<?php

require_once 'pdo.php';

class User {
    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $users = pdo_query($sql);
        return $users;
    }

    public function getUserById($userId) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $user = pdo_query_one($sql, $userId);
        return $user;
    }

    public function addUser($name, $email, $password) {
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        pdo_execute($sql, $name, $email, $password);
    }

    public function updateUser($userId, $name, $email, $password) {
        $sql = "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?";
        pdo_execute($sql, $name, $email, $password, $userId);
    }

    public function deleteUser($userId) {
        $sql = "DELETE FROM users WHERE id = ?";
        pdo_execute($sql, $userId);
    }
    public function searchUsers($keyword) {
        $sql = "SELECT * FROM users WHERE name LIKE ?";
        $users = pdo_query($sql, '%' . $keyword . '%');
        return $users;
    }
    
}

<?php

require_once 'pdo.php';

class User {
    public function getAllUsers() {
        $sql = "SELECT * FROM user";
        $users = pdo_query($sql);
        return $users;
    }

    public function getUserById($userId) {
        $sql = "SELECT * FROM user WHERE id = ?";
        $user = pdo_query_one($sql, $userId);
        return $user;
    }

    public function addUser($name, $email, $password) {
        $sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";
        pdo_execute($sql, $name, $email, $password);
    }

    public function updateUser($userId, $name, $email, $password) {
        $sql = "UPDATE user SET name = ?, email = ?, password = ? WHERE id = ?";
        pdo_execute($sql, $name, $email, $password, $userId);
    }

    public function deleteUser($userId) {
        $sql = "DELETE FROM user WHERE id = ?";
        pdo_execute($sql, $userId);
    }
    public function searchUsers($keyword) {
        $sql = "SELECT * FROM user WHERE name LIKE ?";
        $users = pdo_query($sql, '%' . $keyword . '%');
        return $users;
    }
    
}

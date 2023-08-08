<?php

require_once 'pdo.php';

class User {
    public function getAllUsers($search) {
        global $PER_PAGE;

        $row_count = pdo_query_value("SELECT count(*) FROM 
        (SELECT u.userId FROM user u JOIN role r ON u.roleId = r.roleId Where u.userFullName like '%$search%') 
        as record");

        $_SESSION['page_count'] = ceil(($row_count / $PER_PAGE) * 1.0);
        if (!isset($_SESSION['page_no'])) {
            $_SESSION['page_no'] = 0;
        } else if (exist_param('page_no')) {
            $_SESSION['page_no'] = $_REQUEST['page_no'];
        }
        if ($_SESSION['page_no'] < 0) {
            $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
        }
        if ($_SESSION['page_no'] > $_SESSION['page_count'] - 1) {
            $_SESSION['page_no'] = 0;
        }
        $start = $PER_PAGE * $_SESSION['page_no'];

        $sql = "SELECT * FROM user u JOIN role r ON u.roleId = r.roleId 
        Where u.userFullName like ?
        ORDER BY u.userId LIMIT $start,$PER_PAGE";
        $users = pdo_query($sql, "%".$search."%");
        return $users;
    }

    public function getUserById($userId) {
        $sql = "SELECT * FROM user u JOIN role r ON u.roleId = r.roleId WHERE userId = ?";
        $user = pdo_query_one($sql, $userId);
        return $user;
    }

    public function addUser($name, $email, $phone, $address, $pass, $roleId ) {
        $sql = "INSERT INTO user (userFullname, userEmail, phoneNumber, address, password, roleId) VALUES (?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $name, $email, $phone, $address, $pass, $roleId);
    }

    public function updateUser($userId, $name, $email, $phone, $address, $pass, $roleId) {
        $sql = "UPDATE user SET userFullname = ?, userEmail = ?, phoneNumber = ?, address = ?, password = ?, roleId = ?  WHERE userId = ?";
        pdo_execute($sql, $name, $email, $phone, $address, $pass, $roleId, $userId);
    }

    public function deleteUser($userId) {
        $sql = "DELETE FROM user WHERE userId = ?";
        pdo_execute($sql, $userId);
    }
    public function searchUsers($keyword) {
        $sql = "SELECT * FROM user WHERE name LIKE ?";
        $users = pdo_query($sql, '%' . $keyword . '%');
        return $users;
    }
    
}

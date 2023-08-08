<?php
require_once 'pdo.php';


class Role {
    public function getAllRoles(){
        $sql = "SELECT * FROM role";
        return pdo_query($sql);
    }

    public function getListRoleNotIn($roleId) {
        $sql = "SELECT * FROM role WHERE roleId NOT IN ($roleId);";
        return pdo_query($sql);
    }
}

?>
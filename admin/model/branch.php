<?php
require_once 'pdo.php';
class Branch {
    public function getAllBranches() {
        $sql = "SELECT * FROM branch";
        return pdo_query($sql);
    }
    
    public function getBranchById($branchId) {
        $sql = "SELECT * FROM branch WHERE branchId = $branchId";
        return pdo_query_one($sql);
    }
    
    public function addBranch($branchName) {
        $sql = "INSERT INTO branch (branchName) VALUES (?)";
        pdo_execute($sql, [$branchName]);
    }
    
    public function updateBranch($branchId, $branchName) {
        $sql = "UPDATE branch SET branchName = ? WHERE branchId = ?";
        pdo_execute($sql, [$branchName, $branchId]);
    }
    
    public function deleteBranch($branchId) {
        $sql = "DELETE FROM branch WHERE branchId = ?";
        pdo_execute($sql, [$branchId]);
    }
}


?>
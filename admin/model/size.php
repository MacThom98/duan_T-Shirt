<?php
require_once 'pdo.php';


class Size {
    public function getAllSizes(){
        $sql = "SELECT * FROM size";
        return pdo_query($sql);
    }
}

?>
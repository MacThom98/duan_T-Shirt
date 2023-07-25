    <!-- Các thao tác admin có thể thực hiện với product như: -->
    <?php

    require_once 'pdo.php';

    class Discount {
        public function getAllDiscounts() {
            $sql = "SELECT * FROM discount";
            return pdo_query($sql);
        }
        
        public function getDiscountById($discountId) {
            $sql = "SELECT * FROM discount WHERE discountId = ?";
            return pdo_query($sql, [$discountId]);
        }
        public function getListDiscountNotIn($discountId) {
            $sql = "SELECT * FROM discount WHERE discountId NOT IN ($discountId);";
            return pdo_query($sql);
        }
        
        public function addDiscount($discountName, $discountValue, $discountFromDate, $discountToDate) {
            $sql = "INSERT INTO discount (discountName, discountValue, discountFromDate, discountToDate) VALUES (?, ?, ?, ?)";
            pdo_execute($sql, [$discountName, $discountValue, $discountFromDate, $discountToDate]);
        }
        
        public function updateDiscount($discountId, $discountName, $discountValue, $discountFromDate, $discountToDate) {
            $sql = "UPDATE discount SET discountName = ?, discountValue = ?, discountFromDate = ?, discountToDate = ? WHERE discountId = ?";
            pdo_execute($sql, [$discountName, $discountValue, $discountFromDate, $discountToDate, $discountId]);
        }
        
        public function deleteDiscount($discountId) {
            $sql = "DELETE FROM discount WHERE discountId = ?";
            pdo_execute($sql, [$discountId]);
        }
    }
    
    
    ?>
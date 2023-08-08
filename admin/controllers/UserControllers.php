<?php
// require_once 'core/Database.php';


require_once '../../model/role.php';
require_once '../../model/user.php';
require_once '../../../global.php';
if(isset($_GET['keyword_Search'])){
    $keyword=$_GET['keyword_Search'];
}else {
    $keyword="";
}

$RoleModel = new Role();
$UserModel = new User();
extract($_REQUEST); //;Bắt buộc phải extract các dữ liệu trong form được POST lên để thực hiện CRUD

if(isset($_GET['panigation'])){
    $users = $UserModel->getAllUsers($keyword);
}else{
    $_SESSION['page_no'] = 0;
    $users = $UserModel->getAllUsers($keyword);
}
if (isset($_GET['action']) == true) {
    $action = $_GET['action'];
    switch ($action) {
        case 'add':
            $VIEW_NAME = 'view/user/addUser.php';
            $listRole = $RoleModel->getAllRoles();
            if (exist_param('btn_add')) {
                $fullname = convert_name($name);
                $roleId = $_POST['role'];
                try {
                    $UserModel->addUser($fullname, $email, $phone, $address, $pass, $roleId);
                    unset($fullname, $email, $phone, $address, $pass, $roleId);
                    $MESSAGE = 'Thêm mới thành công!';
                } catch (Exception $exc) {
                    $MESSAGE = 'Thêm mới thất bại!';
                }
            }
            break;
        case 'edit':
            $VIEW_NAME = 'view/user/editUser.php';
            $userId = $_GET['id'];
            $user = $UserModel->getUserById($userId);
            // $roleId = $_POST['role'];
            if (exist_param('btn_update')) {
                $fullname = convert_name($name);
                $UserModel->updateUser($userId, $fullname, $email, $phone, $address, $pass, $role);
                try {
                    $UserModel->updateUser($userId, $fullname, $email, $phone, $address, $pass, $role);
                    // unset($fullname, $email, $phone, $address, $pass, $roleId);
                    $MESSAGE = 'Cập nhật thông tin thành công!';
                } catch (Exception $exc) {
                    $MESSAGE = 'Cập nhật thất bại!';
                }
            }
            break;
        case 'delete':
            // Đoạn mã để xóa sản phẩm dựa vào danh sách ID sản phẩm đã chọn
            if (exist_param('btn_delete_selected')) {
                $selecteduserIds = $userIds;
                if (!empty($selecteduserIds)) {
                    try {
                        // Gọi phương thức deleteusers() của lớp user để xóa sản phẩm
                        $success = $userModel->deleteusers($selecteduserIds);

                        if ($success) {
                            // Xóa thành công
                            $MESSAGE = "<h5 class='text-dark text-center bg-success pt-2 pb-2 my-2'>Xóa sản phẩm thành công</h5>";
                        } else {
                            // Xóa thất bại
                            $MESSAGE = "<h5 class='text-dark text-center bg-danger pt-2 pb-2 my-2'>Xóa sản phẩm thất bại</h5>";
                        }
                    } catch (PDOException $e) {
                        // Xử lý lỗi nếu xảy ra
                        $MESSAGE =
                            'Xảy ra lỗi khi xóa sản phẩm: ' . $e->getMessage();
                    }
                } else {
                    // Chưa chọn sản phẩm để xóa
                    $MESSAGE = 'Vui lòng chọn ít nhất một sản phẩm để xóa.';
                }
            }

        //Xóa sản phẩm theo ID truyền vào
            try{
            $UserModel->deleteUser($id);
            // Cập nhật lại danh sách sản phẩm sau khi xóa thành công
            $users = $UserModel->getAllUsers($keyword);
            
            // Đặt VIEW_NAME và MESSAGE để hiển thị kết quả sau khi xóa
            $VIEW_NAME = 'view/user/default.php';
            $MESSAGE = "<h5 class='text-dark text-center bg-success pt-2 pb-2 my-2'>Xóa thành công</h5>";
            }catch(PDOException $e){
                    // Cập nhật lại danh sách sản phẩm sau khi xóa thành công
                $users = $UserModel->getAllusers($keyword);
                $VIEW_NAME = 'view/user/default.php';
                $MESSAGE = "<h5 class='text-dark text-center bg-danger pt-2 pb-2 my-2'>Không thể xóa vì các ràng buộc</h5>";
                
                
            }
            break;
        case 'view':
            // Xử lý xem chi tiết sản phẩm
            break;
        case 'search':
            // Xử lý tìm kiếm sản phẩm
            break;
        case 'statistics':
            // Xử lý thống kê sản phẩm
            break;
        default:
            // Mặc định hiển thị danh sách sản phẩm
            $VIEW_NAME = 'view/user/default.php';
            $users = $UserModel->getAllUsers($keyword);
            include '../../layout.php';
            break;
    }
    require '../../layout.php';
} else {
    $VIEW_NAME = 'view/user/default.php';
    $users = $UserModel->getAllUsers($keyword);
    include '../../layout.php';
}
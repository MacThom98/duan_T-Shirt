<?php 
require '../../global.php';
require '../model/user.php';

$UserModel = new User();
$users = $UserModel->getAllUsers();
// $VIEW_NAME = $SITE_URL.'/view/login/';
if(isset($_POST['dangnhap'])){
    $email = $_POST['username'];
    $pass = $_POST['password'];
        foreach($users as $user){
        if($email != $user['userEmail'] || $pass != $user['password']){
            $MESSAGE = 'Tài khoản hoặc mật khẩu không đúng';
            $VIEW_NAME= 'view/user/login.php';
            break;
        }else if($email == $user['userEmail'] || $pass == $user['password']){
            $_SESSION['user'] = $user;
            $VIEW_NAME = 'view/home/default.php';
            $MESSAGE = 'Đăng nhập thành công';
            // require '../../layout.php';
            break;
        }
    }require '../../layout.php';
}

?>
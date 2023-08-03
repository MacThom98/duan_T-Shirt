<?php 

require '../../global.php';
require '../model/user.php';

$UserModel = new User();
$users = $UserModel->getAllUsers();
$VIEW_NAME = $SITE_URL.'/view/login/';
if(isset($_POST['dangnhap'])){
    $email = $_POST['username'];
    $pass = $_POST['password'];
    foreach($users as $user){
        if($email==$user['userEmail'] && $pass == $user['password']){
            $_SESSION['user'] = $user;
            $VIEW_NAME= 'view/checkout/default.php';
            $MESSAGE = 'Đăng nhập thành công';
            break;
        }else{
            $MESSAGE = 'Tài khoản hoặc mật khẩu không đúng';
            $VIEW_NAME= 'view/login/default.php';
        }
    }
}
require '../layout.php';
?>
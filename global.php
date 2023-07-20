<?php
session_start();

// Định nghĩa các url cần thiết được sử dụng trong website
$ROOT_URL = "/duan_T-shirt"; //đường dẫn gốc của website
$CONTENT_ADMIN_URL = "$ROOT_URL/public/admin"; //đường dẫn chứa tài nguyên tĩnh của admin(img, css, js)
$CONTENT_SITE_URL = "$ROOT_URL/public/site"; //đường dẫn chứa tài nguyên tĩnh của site(img, css, js)
$ADMIN_URL = "$ROOT_URL/admin"; //đường dẫn vào phần quản trị
$SITE_URL = "$ROOT_URL/site"; //đường dẫn vào phần site
$PER_PAGE = 10; //số lượng hàng hóa mỗi trang

// đường dẫn chứa hình khi upload

$IMAGE_DIR = $ROOT_URL."/uploads/images/";


// 2 biến toàn cục để chia sẻ giữa controller và view
$VIEW_NAME = "index.php";
$MESSAGE = "";

//Kiểm tra sự tồn tại của 1 tham số trong request, trả về true nếu tồn tại
function exist_param($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}
/* Lưu file upload vào folder
 * $fieldname là tên field trong form, $target_dir là folder lưu file
 * trả về tên file đã upload là ngày giờ hệ thống
 */
function uploadImage($fieldname)
{
    // Đường dẫn chứa hình khi upload
    global $IMAGE_DIR;
    // Kiểm tra xem có file được upload không
    if (isset($_FILES[$fieldname]) && $_FILES[$fieldname]['error'] === UPLOAD_ERR_OK) {
        $file_uploaded = $_FILES[$fieldname];
        $img = $file_uploaded["name"];

        // Tạo đường dẫn đầy đủ cho tệp tải lên
        $target_path = $IMAGE_DIR . $img;

        // Di chuyển tệp tải lên đến đường dẫn đích
        if (move_uploaded_file($file_uploaded["tmp_name"], $target_path)) {
            return $img;
        } else {
            // Lỗi khi di chuyển tệp tải lên
            echo "Upload không thành công";
            return false;
        }
    } else {
        echo "Upload không thành công";
        // Không có file được upload hoặc có lỗi khi upload
        return false;
    }
}

/* Tạo cookie
 * $name là tên cookie, $value là giá trị cookie
 * $day là số ngày tồn tại cookie
 */
function add_cookie($name, $value, $day)
{
    setcookie($name, $value, time() + (86400 * $day), "/");
}
// Xóa cookie, $name là tên cookie muốn xóa
function delete_cookie($name)
{
    add_cookie($name, "", -1);
}
/* Đọc giá trị cookie
 * $name là tên cookie, trả vể giá trị của cookie
 */
function get_cookie($name)
{
    return $_COOKIE[$name] ?? '';
}
/* Kiểm tra đăng nhập và vai trò
 * Các trang php yêu cầu user đăng nhập sẽ gọi hàm này ở đầu file
 */
function check_login()
{
    global $SITE_URL;
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['vai_tro'] == 1) {
            return;
        }
        if (strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE) {
            return;
        }
    }
    $_SESSION['request_uri'] = $_SERVER["REQUEST_URI"];
    header("location: $SITE_URL/tai-khoan/dang-nhap.php");
}

// Định dạng lại tên Loại, hàng hoá
function convert_name($name)
{
    return ucfirst(trim(preg_replace('/\s+/', ' ', $name)));
}

// Định dạng lại họ tên khách hàng
function convert_ho_ten($name)
{
    return ucwords(strtolower(trim(preg_replace('/\s+/', ' ', $name))));
}

// Kiểm tra usename có đúng chuẩn
function check_username($name)
{
    return preg_match('/^\w{5,20}$/', $name);
}


?>
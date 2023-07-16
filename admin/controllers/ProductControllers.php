<?php

// require_once 'core/Database.php';
require_once '../../model/product.php';
require_once '../../../global.php';

// check_login();

extract($_REQUEST);
var_dump($_REQUEST) ;
// if (exist_param("btn_insert")) {
//     if ($giam_gia >= 0 && $giam_gia <= 100) {
//         $ten_hh = convert_name($ten_hh);
//         $file_name = save_file("up_hinh", "$IMAGE_DIR/products/");
//         $hinh = $file_name ? $file_name : "";
//         $ngay_nhap = $ngay_nhap ? $ngay_nhap : date_format(date_create(), 'Y-m-d');
//         try {
//             hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $ngay_nhap, $mo_ta);
//             unset($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $ngay_nhap, $so_luot_xem, $mo_ta);
//             $MESSAGE = "Thêm mới thành công!";
//         } catch (Exception $exc) {
//             $MESSAGE = "Thêm mới thất bại!";
//         }
//     } else {
//         $MESSAGE = "Giảm giá chỉ từ 0-100%";
//     }
//     $VIEW_NAME = "hang-hoa/new.php";
// } else if (exist_param("btn_update")) {
//     if ($giam_gia >= 0 && $giam_gia <= 100) {
//         $ten_hh = convert_name($ten_hh);
//         $file_name = save_file("up_hinh", "$IMAGE_DIR/products/");
//         $hinh = $file_name ? $file_name : $hinh;
//         $ngay_nhap = $ngay_nhap ? $ngay_nhap : date_format(date_create(), 'Y-m-d');
//         try {
//             hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $ngay_nhap, $mo_ta);
//             $MESSAGE = "Cập nhật thành công!";
//         } catch (Exception $exc) {
//             $MESSAGE = "Cập nhật thất bại!";
//         }
//     } else {
//         $MESSAGE = "Giảm giá chỉ từ 0-100%";
//     }
//     $VIEW_NAME = "hang-hoa/edit.php";
// } else if (exist_param("btn_delete")) {
//     try {
//         hang_hoa_delete($ma_hh);
//         $MESSAGE = "Xóa thành công!";
//     } catch (Exception $exc) {
//         $MESSAGE = "Xóa thất bại!";
//     }
//     $items = hang_hoa_select_page();
//     $VIEW_NAME = "hang-hoa/list.php";
// } else if (exist_param("btn_edit")) {
//     $item = hang_hoa_select_by_id($ma_hh);
//     extract($item);
//     $VIEW_NAME = "hang-hoa/edit.php";
// } else if (exist_param("btn_list")) {
//     $items = hang_hoa_select_page();
//     $VIEW_NAME = "hang-hoa/list.php";
// } else {
    $VIEW_NAME = "view/product/default.php";
// }
require "../../layout.php";




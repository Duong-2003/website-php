<?php
include("../linkAdmin.php");
include($linkconnIncludes);
include('./CheckImg.php');
session_start();
ob_start();

if (isset($_POST['submit']) && $_POST['name'] != '') {
    $user_name = $_POST['name'];
    $user_pass = $_POST['pass'];
    $user_email = $_POST['email'];
    $address = $_POST['address'];
    $role = $_POST['role'];


    
 // Kiểm tra xem giá trị role có hợp lệ hay không
 $allowedRoles = ['Admin', 'User', 'Guest'];
 if (!in_array($role, $allowedRoles)) {
     $connect->close();
     $error = "&error=Quyền không hợp lệ";
     header("location:" . $linkPages . "Edit_Users.php?datakey=" . $_POST['name'] . $error);
     exit();
 }

 
    $query = "UPDATE users 
                SET pass='$user_pass', email='$user_email', address ='$address', role ='$role'
                WHERE name='$user_name'";
    if ($connect->query($query) === TRUE) {
        $connect->close();
        header("location:" . $linkPages . "ListUsers.php?notifi=Sửa thành công");
        exit(); // Thêm dòng này để ngăn mã tiếp tục chạy sau khi chuyển hướng
    } else {
        $connect->close();
        $error = "&error=Lỗi không sửa được sản phẩm: " . $connect->error;
        header("location:" . $linkPages . "Edit_Users.php?datakey=" . $_POST['name'] . $error);
        exit(); // Thêm dòng này để ngăn mã tiếp tục chạy sau khi chuyển hướng
    }
} else {
    $connect->close();
    $error = "&error=Chưa nhập đủ thông tin";
    header("location:" . $linkPages . "Edit_Users.php?datakey=" . $_POST['name'] . $error);
    exit(); // Thêm dòng này để ngăn mã tiếp tục chạy sau khi chuyển hướng
}

?>



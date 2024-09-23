<?php
include("../linkAdmin.php");
include($linkconnIncludes);
include('./CheckImg.php');

session_start();
ob_start();

if (isset($_POST['submit']) && !empty($_POST['name'])) {
    $user_name = $_POST['name'];
    $user_pass = $_POST['pass'];
    $user_email = $_POST['email'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    // Kiểm tra xem giá trị role có hợp lệ hay không
    $allowedRoles = ['admin', 'user']; // Chỉ cho phép admin và user
    if (!in_array($role, $allowedRoles)) {
        $connect->close();
        $error = "&error=Quyền không hợp lệ";
        header("location:" . $linkPages . "Edit_Users.php?datakey=" . urlencode($user_name) . $error);
        exit();
    }

    // Mã hóa mật khẩu nếu có thay đổi
    $hashed_password = password_hash($user_pass, PASSWORD_DEFAULT);
    
    // Sử dụng Prepared Statements để tránh SQL Injection
    $query = $connect->prepare("UPDATE users SET pass=?, email=?, address=?, role=? WHERE name=?");
    $query->bind_param("sssss", $hashed_password, $user_email, $address, $role, $user_name);

    if ($query->execute()) {
        $query->close();
        $connect->close();
        header("location:" . $linkPages . "ListUsers.php?notifi=Sửa thành công");
        exit();
    } else {
        $query->close();
        $connect->close();
        $error = "&error=Lỗi không sửa được người dùng: " . urlencode($connect->error);
        header("location:" . $linkPages . "Edit_Users.php?datakey=" . urlencode($user_name) . $error);
        exit();
    }
} else {
    $connect->close();
    $error = "&error=Chưa nhập đủ thông tin";
    header("location:" . $linkPages . "Edit_Users.php?datakey=" . urlencode($_POST['name']) . $error);
    exit();
}
?>
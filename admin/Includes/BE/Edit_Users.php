<?php
include('../conn/connect.php');
include('./CheckImg.php');

session_start();
ob_start();

if (isset($_POST['submit'])) {
    $user_name = $_POST['name'] ?? null;
    $user_pass = $_POST['pass'] ?? null;
    $user_email = $_POST['email'] ?? null;
    $address = $_POST['address'] ?? null;
    $role = $_POST['role'] ?? null;

    // Kiểm tra xem giá trị role có hợp lệ hay không
    $allowedRoles = ['0', '1']; // Chỉ cho phép admin và user
    if (!in_array($role, $allowedRoles)) {
        $connect->close();
        $error = "&error=Quyền không hợp lệ";
        header("location: ../../Edit_Users.php?datakey=" . urlencode($user_name) . $error);
        exit();
    }

    // Mã hóa mật khẩu nếu có thay đổi
    $hashed_password = !empty($user_pass) ? password_hash($user_pass, PASSWORD_DEFAULT) : null;

    // Sử dụng Prepared Statements để tránh SQL Injection
    if ($hashed_password) {
        $query = $connect->prepare("UPDATE users SET pass=?, email=?, address=?, role=? WHERE name=?");
        $query->bind_param("sssss", $hashed_password, $user_email, $address, $role, $user_name);
    } else {
        $query = $connect->prepare("UPDATE users SET email=?, address=?, role=? WHERE name=?");
        $query->bind_param("ssss", $user_email, $address, $role, $user_name);
    }

    // Thực hiện truy vấn và xử lý kết quả
    if ($query->execute()) {
        $query->close();
        $connect->close();
        header("location: ../../ListUsers.php?notifi=Sửa thành công");
        exit();
    } else {
        $query->close();
        $connect->close();
        $error = "&error=Lỗi không sửa được người dùng: " . urlencode($connect->error);
        header("location: ../../Pages/Edit_Users.php?datakey=" . urlencode($user_name) . $error);
        exit();
    }
} else {
    // Xử lý trường hợp không đủ thông tin
    $connect->close();
    $error = "&error=Chưa nhập đủ thông tin";
    header("location: ../../Pages/Edit_Users.php?datakey=" . urlencode($_POST['name']) . $error);
    exit();
}
?>
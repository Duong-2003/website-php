<?php

include('../conn/connect.php');

session_start();
ob_start();

if (isset($_POST['submit']) && !empty($_POST['name'])) {
    $user_name = $_POST['name'];
    $user_pass = $_POST['pass'];
    $user_email = $_POST['email'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    // Validate the role value
    $allowedRoles = ['admin', 'user']; // Chỉ cho phép admin và user
    if (!in_array($role, $allowedRoles)) {
        $connect->close();
        $error = "Quyền không hợp lệ";
        header("location:../../Pages/Form_Users.php?datakey=" . urlencode($user_name) . "&error=" . urlencode($error));
        exit();
    }

    // Kiểm tra xem tên người dùng đã tồn tại chưa
    $checkQuery = $connect->prepare("SELECT COUNT(*) FROM users WHERE name = ?");
    $checkQuery->bind_param("s", $user_name);
    $checkQuery->execute();
    $checkQuery->bind_result($count);
    $checkQuery->fetch();
    $checkQuery->close();

    if ($count > 0) {
        $connect->close();
        $error = "Tên người dùng đã tồn tại";
        header("location:../../Pages/ListUsers.php?datakey=" . urlencode($user_name) . "&error=" . urlencode($error));
        exit();
    }

    // Mã hóa mật khẩu
    $hashed_password = password_hash($user_pass, PASSWORD_DEFAULT);

    // Tạo câu truy vấn SQL để thêm người dùng mới
    $query = $connect->prepare("INSERT INTO users (name, pass, email, address, role) VALUES (?, ?, ?, ?, ?)");
    $query->bind_param("sssss", $user_name, $hashed_password, $user_email, $address, $role);

    if ($query->execute()) {
        $query->close();
        $connect->close();
        header("location:../../Pages/ListUsers.php?notifi=" . urlencode("Thêm thành công"));
        exit();
    } else {
        $error = "Lỗi không thêm được người dùng: " . $query->error;
        header("location:../../Pages/ListUsers.php?datakey=" . urlencode($user_name) . "&error=" . urlencode($error));
        exit();
    }
} else {
    $connect->close();
    $error = "Chưa nhập đủ thông tin";
    header("location:../../Pages/ListUsers.php?error=" . urlencode($error));
    exit();
}
?>
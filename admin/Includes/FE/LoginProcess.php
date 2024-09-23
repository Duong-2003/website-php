<?php
include("../linkAdmin.php");
include($linkconnIncludes);
session_start();
ob_start();

$error = null;

// Kiểm tra xem có dữ liệu từ form gửi lên không
if (isset($_POST['submit'])) {
    $username = trim($_POST['account']);
    $password = trim($_POST['password']);

    // Kiểm tra xem các trường có được điền đầy đủ không
    if ($username !== '' && $password !== '') {
        // Sử dụng prepared statements để tránh SQL injection
        $stmt = $connect->prepare("SELECT * FROM users WHERE name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $stored_hashed_password = $user['pass'];

            // Kiểm tra mật khẩu
            if (password_verify($password, $stored_hashed_password)) {
                $_SESSION['username'] = $username;

                // Điều hướng theo vai trò người dùng
                if ($user['role'] != 1) {
                    header("location:".$linkPages."Menu.php");
                } else {
                    header("location:../../admin/Includes/FE/Menu.php");
                }
                exit();
            } else {
                $error = 'Sai mật khẩu hoặc tài khoản';
            }
        } else {
            $error = 'Tên đăng nhập không tồn tại';
        }
    } else {
        $error = 'Chưa nhập toàn bộ thông tin cần thiết';
    }
} else {
    $error = 'Yêu cầu không hợp lệ';
}

// Đóng kết nối và chuyển hướng nếu có lỗi
if ($error) {
    $connect->close();
    header("location:".$linkPages."Admin_Login.php?error=".urlencode($error));
    exit();
}

// Đóng kết nối
$connect->close();
?>
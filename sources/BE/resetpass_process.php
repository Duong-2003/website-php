<?php
include('../linkFile.php');
include($linkconnSources);

session_start();
ob_start();

$username = $_POST['account'] ?? '';
$passwordReset = $_POST['passwordReset'] ?? '';
$email = $_POST['email'] ?? '';
$error = null;
$notifi = null;

if(isset($_POST['submit']) && !empty($username) && !empty($passwordReset) && !empty($email)){
    // Truy vấn để lấy thông tin người dùng
    $select_sql = "SELECT * FROM users WHERE name = ?";
    $stmt = $connect->prepare($select_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stored_hashed_email = $user['email'];

        if (empty($stored_hashed_email)) {
            $error = "Tài khoản không có email không thể lấy lại";
            header("Location: " . $linkWebsite . "resetpass.php?error=" . urlencode($error));
            exit();
        }

        // Kiểm tra email
        if (!hash_equals($stored_hashed_email, $email)) {
            $error = "Nhập sai email";
            header("Location: " . $linkWebsite . "resetpass.php?error=" . urlencode($error));
            exit();
        }

        // Mã hóa mật khẩu mới
        $hashed_password = password_hash($passwordReset, PASSWORD_DEFAULT);
        $update_sql = "UPDATE users SET pass = ? WHERE name = ?";
        $stmt_update = $connect->prepare($update_sql);
        $stmt_update->bind_param("ss", $hashed_password, $username);

        if ($stmt_update->execute()) {
            $notifi = "Thay đổi mật khẩu thành công";
            header("Location: " . $linkWebsite . "login.php?notifi=" . urlencode($notifi));
            exit();
        } else {
            $error = "Thay đổi mật khẩu không thành công: " . $connect->error;
            header("Location: " . $linkWebsite . "resetpass.php?error=" . urlencode($error));
            exit();
        }

    } else {
        $error = "Tài khoản đã nhập chưa đăng ký.";
        header("Location: " . $linkWebsite . "resetpass.php?error=" . urlencode($error));
        exit();
    }
} else {
    $error = 'Chưa nhập toàn bộ thông tin bắt buộc';
    header("Location: " . $linkWebsite . "resetpass.php?error=" . urlencode($error));
    exit();
}

$connect->close();
?>
<?php
include('../linkFIle.php');
include($linkconnSources);
session_start();
ob_start();

if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['rePass'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $email = htmlspecialchars($_POST['email']);
    $rePass = $_POST['rePass'];
    $address = htmlspecialchars($_POST['address']);
    $role = 0; // Default role for all new users
    $error = null;
    $notifi = null;

    // Check if passwords match
    if ($password !== $rePass) {
        $error = 'Mật khẩu nhập lại không giống';
        header("Location: ".$linkWebsite."register.php?error=".urlencode($error));
        exit();
    }

    // Check if username already exists
    $checkQuery = "SELECT * FROM users WHERE name = ?";
    $stmt = $connect->prepare($checkQuery);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = 'Tài khoản đã tồn tại';
        header("Location: ".$linkWebsite."register.php?error=".urlencode($error));
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the insert query
    $query = "INSERT INTO users (name, pass, role, email, address) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("ssiss", $username, $hashed_password, $role, $email, $address);

    // Execute the query
    if ($stmt->execute()) {
        $notifi = 'Đăng ký thành công';
        header("Location: ".$linkWebsite."login.php?notifi=".urlencode($notifi));
        exit();
    } else {
        $error = 'Lỗi đăng ký: ' . $stmt->error;
        header("Location: ".$linkWebsite."register.php?error=".urlencode($error));
        exit();
    }

    $stmt->close();
    $connect->close();
} else {
    $error = 'Chưa nhập toàn bộ thông tin bắt buộc';
    header("Location: ".$linkWebsite."register.php?error=".urlencode($error));
    exit();
}
?>
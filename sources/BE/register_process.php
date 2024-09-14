<?php
include('../linkFIle.php');
include ($linkconnSources);
session_start();
ob_start();
if(isset($_POST['submit']) && $_POST['username'] != '' && $_POST['password'] != ''&& $_POST['rePass']!= ''){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $rePass = $_POST['rePass'];
    $address = $_POST['address'];
    $role = 0;
    $error = null;
    $notifi = null;

    if($password != $rePass)
    {
        $connect->close();
        $error = 'Mật khẩu nhập lại không giống';
        header("location:".$linkWebsite."register.php?error=".$error);
    }
    $checkQuery = "SELECT * FROM users WHERE name = '$username'";
    $result = $connect->query($checkQuery);
    if ($result->num_rows > 0) {
        $error = 'Tài khoản đã tồn tại';
        header("location:".$linkWebsite."register.php?error=".$error);
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if($email != ''){
        // $hashed_email = password_hash($email, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, pass, role,email,address) VALUES ('$username', '$hashed_password','$role','$email','$address')";
    }
    else{
        $query = "INSERT INTO users (name, pass, role,email,address) VALUES ('$username', '$hashed_password','$role','$email','$address')";
    }
    if ($connect->query($query) === TRUE) {
        $connect->close();
        $notifi = 'Đăng ký thành công';
        header("location:".$linkWebsite."login.php?notifi=".$notifi);
    }else {
        $error = 'Lỗi đăng ký !'. $connect->error;
        $connect->close();
        header("location:".$linkWebsite."register.php?error=".$error);
    }
    $connect->close();
}
else{
    $connect->close();
    $error = 'Chưa nhập toàn bộ thông tin bắt buộc';
    header("location:".$linkWebsite."register.php?error=".$error);
}
?>
<?php
include("../linkAdmin.php");
include($linkconnIncludes);

session_start();
ob_start();

if (isset($_POST['submit']) && $_POST['name'] != '') {
    $user_name = $_POST['name'];
    $user_pass = $_POST['pass'];
    $user_email = $_POST['email'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    // Validate the role value
    $allowedRoles = ['Admin', 'User', 'Guest'];
    if (!in_array($role, $allowedRoles)) {
        $connect->close();
        $error = "&error=Quyền không hợp lệ";
        header("location:" . $linkPages . "Add_Users.php?datakey=" . $_POST['name'] . $error);
        exit();
    }

    // Encrypt the password
    $hashed_password = password_hash($user_pass, PASSWORD_DEFAULT);

    // Construct the SQL query to insert a new user
    $query = "INSERT INTO users (name, pass, email, address, role)
              VALUES ('$user_name', '$hashed_password', '$user_email', '$address', '$role')";

    if ($connect->query($query) === TRUE) {
        $connect->close();
        header("location:" . $linkPages . "ListUsers.php?notifi=Thêm thành công");
        exit();
    } else {
        $connect->close();
        $error = "&error=Lỗi không thêm được người dùng: " . $connect->error;
        header("location:" . $linkPages . "Add_Users.php?datakey=" . $_POST['name'] . $error);
        exit();
    }
} else {
    $connect->close();
    $error = "&error=Chưa nhập đủ thông tin";
    header("location:" . $linkPages . "Add_Users.php?datakey=" . $_POST['name'] . $error);
    exit();
}
?>
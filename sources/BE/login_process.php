<?php
include('../linkFile.php');
include ($linkconnSources);
session_start();
ob_start();
$username = $_POST['account'];
$password = $_POST['password'];
$error = null;
if(isset($_POST['submit']) && $username != '' && $password != ''){
    $query = "SELECT * FROM users WHERE name = '$username'";
    $result = $connect->query($query);  
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $stored_hashed_password = $user['pass'];
        if (password_verify($password, $stored_hashed_password)) {
            if($user['role'] !=1){
                $connect->close();
                $_SESSION['username'] = $username;
                header("location:".$linkWebsite."website.php");
                exit();
            }
            else{
                $connect->close();
                $_SESSION['username'] = $username;
                header("location:../../admin/Includes/FE/MenuAdmin.php");
                exit(); 
            }
        } 
        else {
            $connect->close();
            $error = 'Sai mật khẩu hoặc tài khoản';
            header("location:".$linkWebsite."login.php?error=".$error);
        }
    } else {
        $connect->close();
        $error = 'Tên đăng nhập không tồn tại ';
        header("location:".$linkWebsite."login.php?error=".$error);
    }
}
else
{
    $connect->close();
    $error = 'Chưa nhập toàn bộ thông tin cần thiết';
    header("location:".$linkWebsite."login.php?error=".$error);
}


?>

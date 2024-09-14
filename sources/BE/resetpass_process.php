<?php
include('../linkFile.php');
include ($linkconnSources);

session_start();
ob_start();
$username = $_POST['account'];
$passwordReset = $_POST['passwordReset'];
$email = $_POST['email'];
$error = null;
$notifi = null;
if(isset($_POST['submit']) && $username != '' && $passwordReset != '' &&  $email != ''){
    $select_sql = "SELECT * FROM users WHERE name = '$username'";
    $result = $connect->query($select_sql);
    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();
        $stored_hashed_email = $user['email'];
        if($stored_hashed_email == NULL){
            $connect->close();
            $error = "Tài khoản không có email không thể lấy lại";
            header("location:".$linkWebsite."resetpass.php?error=".$error);
        }
        if (!password_verify($email, $stored_hashed_email)){
            $connect->close();
            $error = "Nhấp sai email";
            header("location:".$linkWebsite."resetpass.php?error=".$error);
        }
        $hashed_password = password_hash($passwordReset, PASSWORD_DEFAULT);
        $update_sql = "UPDATE users
                        SET pass = '$hashed_password'
                        WHERE name = '$username'";
        if ($connect->query($update_sql) === TRUE) {
            $connect->close();
            $notifi = "Thay đổi mật khẩu thành công";
            header("location:".$linkWebsite."login.php?notifi=".$notifi);
        } else {
            $error = "Thay đổi mật khẩu không thành công". $conn->error;
            $connect->close();
            header("location:".$linkWebsite."resetpass.php?error=".$notifi);
        }
        
    } else {
        $connect->close();
        $error = "Tài khoản đã nhập chưa đăng ký.";
        header("location:".$linkWebsite."resetpass.php?error=".$error);
    }
}
else
{
    $connect->close();
    $error = 'Chưa nhập toàn bộ thông tin bắt buộc';
    header("location:".$linkWebsite."resetpass.php?error=".$error);
}
$connect->close();

?>

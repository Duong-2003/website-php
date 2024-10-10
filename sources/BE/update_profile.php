<?php
session_start();
include('../../connect_SQL/connect.php'); // Kết nối đến cơ sở dữ liệu

// Lấy ID người dùng từ session
$user_id = $_SESSION['user_id'];

// Kiểm tra nếu user_id tồn tại
if (!isset($user_id)) {
    echo "Vui lòng đăng nhập để tiếp tục.";
    exit();
}

$message = "";

// Lấy thông tin từ form
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$bio = $_POST['bio'];
$website = $_POST['website'];
$location = $_POST['location'];

// Xử lý upload ảnh đại diện
$avatar = $_FILES['avatar'];
$avatarPath = '';

if ($avatar['error'] == UPLOAD_ERR_OK) {
    // Kiểm tra loại tệp ảnh
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($avatar['type'], $allowedTypes)) {
        $avatarDir = '../Assets/img/index/';
        // Kiểm tra thư mục có tồn tại không
        if (!is_dir($avatarDir)) {
            mkdir($avatarDir, 0755, true); // Tạo thư mục nếu không tồn tại
        }
        $avatarName = uniqid('avatar_') . '_' . basename($avatar['name']);
        $avatarPath = $avatarDir . $avatarName;

        // Di chuyển tệp đến thư mục mong muốn
        if (move_uploaded_file($avatar['tmp_name'], $avatarPath)) {
            $message .= "Ảnh đại diện đã được cập nhật. ";
        } else {
            $message .= "Lỗi khi tải lên ảnh đại diện. ";
        }
    } else {
        $message .= "Chỉ cho phép tải lên tệp hình ảnh (jpg, png, gif). ";
    }
}

// Cập nhật thông tin người dùng trong cơ sở dữ liệu
$sqlUser = "UPDATE `user` SET name = ?, email = ? WHERE user_id = ?";
$stmtUser = $connect->prepare($sqlUser);
$stmtUser->bind_param("ssi", $username, $email, $user_id);
$stmtUser->execute();

if ($avatarPath) {
    $sqlUpdateAvatar = "UPDATE `user` SET avatar = ? WHERE user_id = ?";
    $stmtUpdateAvatar = $connect->prepare($sqlUpdateAvatar);
    $stmtUpdateAvatar->bind_param("si", $avatarPath, $user_id);
    $stmtUpdateAvatar->execute();
}

// Cập nhật thông tin hồ sơ (bỏ qua cột phone nếu không cần thiết)
// Cập nhật thông tin hồ sơ
$sqlProfile = "UPDATE `profile_user` SET phone = ?, date_of_birth = ?, gender = ?, bio = ?, website = ?, location = ? WHERE user_id = ?";
$stmtProfile = $connect->prepare($sqlProfile);
$stmtProfile->bind_param("ssssssi", $phone, $dob, $gender, $bio, $website, $location, $user_id);
$stmtProfile->execute();

// Kiểm tra nếu cập nhật thành công
if ($stmtUser->affected_rows > 0 || $stmtProfile->affected_rows > 0) {
    $message .= "Cập nhật hồ sơ thành công.";
} else {
    $message .= "Không có thay đổi nào được thực hiện.";
}

// Đóng kết nối
$stmtUser->close();
$stmtProfile->close();
$connect->close();

// Chuyển hướng về trang hồ sơ và hiển thị thông báo
$_SESSION['message'] = $message;
header("Location: ../../Website/profile_user.php"); // Thay đổi đường dẫn đến trang hồ sơ của bạn
exit();
?>
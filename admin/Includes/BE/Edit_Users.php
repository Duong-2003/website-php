<?php
include('../conn/connect.php');
include('./CheckImg.php');

session_start();
ob_start();

if (isset($_POST['submit'])) {
    // Lấy thông tin từ biểu mẫu
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass']; // Không mã hóa mật khẩu ngay lập tức
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $img = basename($_FILES['avatar']['name']);
    $error = '';

    // Kiểm tra và di chuyển tệp ảnh nếu có
    if (!empty($img)) {
        if (IsExceedingFileNameSize($img)) {
            $error = "?error=Tên ảnh quá dài không thể lưu trữ";
            header("location:../../Includes/BE/Edit_Users.php?datakey=" . $ma . $error);
            exit();
        }

        if (!move_uploaded_file($_FILES['sp_img']['tmp_name'], $target_img)) {
            $error = "?error=Lỗi không di chuyển ảnh đến Assets";
            header("location:../../Includes/BE/Edit_Users.php?datakey=" . $ma . $error);
            exit();
        }
    }
    // Kiểm tra xem tất cả các trường có được điền đầy đủ hay không
    if (empty($name) || empty($email) || empty($address) || empty($role)) {
        $connect->close();
        $error = "&error=Chưa nhập đủ thông tin";
        header("location:../../Includes/BE/Edit_Users.php?datakey=" . urlencode($name) . $error);
        exit();
    }

    // Kiểm tra xem giá trị role có hợp lệ hay không
    $allowedRoles = ['Admin', 'User']; // Chỉ cho phép admin và user
    if (!in_array($role, $allowedRoles)) {
        $connect->close();
        $error = "&error=Quyền không hợp lệ";
        header("location:../../Includes/BE/Edit_Users.php?datakey=" . urlencode($name) . $error);
        exit();
    }

    // Mã hóa mật khẩu nếu có thay đổi
    $hashed_password = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;

    // Sử dụng Prepared Statements để tránh SQL Injection
    if ($hashed_password) {
        $query = $connect->prepare("UPDATE users SET name=?, email=?, password=?, address=?, phone=?, role=? WHERE id=?");
        $query->bind_param("ssssssi", $name, $email, $hashed_password, $address, $phone, $role, $id);
    } else {
        $query = $connect->prepare("UPDATE users SET name=?, email=?, address=?, phone=?, role=? WHERE id=?");
        $query->bind_param("sssssi", $name, $email, $address, $phone, $role, $id);
    }

    // Thực hiện truy vấn và xử lý kết quả
    if ($query->execute()) {
        $query->close();
        $connect->close();
        header("location:../../ListUsers.php?notifi=Sửa thành công");
        exit();
    } else {
        $query->close();
        $connect->close();
        $error = "&error=Lỗi không sửa được người dùng: " . urlencode($connect->error);
        header("location:../../Includes/BE/Edit_Users.php?datakey=" . urlencode($name) . $error);
        exit();
    }
} else {
    // Xử lý trường hợp không đủ thông tin
    $connect->close();
    $error = "&error=Chưa nhập đủ thông tin";
    header("location:../../Includes/BE/Edit_Users.php?datakey=" . urlencode($_POST['name']) . $error);
    exit();
}
?>
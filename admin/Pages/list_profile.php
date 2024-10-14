<?php
include('../../connect_SQL/connect.php'); // Kết nối đến cơ sở dữ liệu

session_start();
$user_id = $_SESSION['user_id'] ?? null; // Lấy ID người dùng từ session

if (!$user_id) {
    echo "ERROR: Vui lòng đăng nhập.";
    exit();
}

// Lấy thông tin người dùng từ bảng profile_user
$sql = "SELECT * FROM profile_user WHERE user_id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $profile = $result->fetch_assoc();
} else {
    echo "ERROR: Không tìm thấy thông tin người dùng.";
    exit();
}

// Xử lý cập nhật thông tin
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date_of_birth = $_POST['date_of_birth'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $bio = $_POST['bio'] ?? '';
    $website = $_POST['website'] ?? '';
    $location = $_POST['location'] ?? '';
    $phone = $_POST['phone'] ?? '';

    // Cập nhật thông tin vào cơ sở dữ liệu
    $update_sql = "UPDATE profile_user SET date_of_birth = ?, gender = ?, bio = ?, website = ?, location = ?, phone = ? WHERE user_id = ?";
    $update_stmt = $connect->prepare($update_sql);
    $update_stmt->bind_param("ssssssi", $date_of_birth, $gender, $bio, $website, $location, $phone, $user_id);

    if ($update_stmt->execute()) {
        header("Location: list_profile.php?notifi=Cập nhật thành công");
        exit();
    } else {
        echo "ERROR: Không thể cập nhật thông tin.";
    }
}

// Xử lý xóa tài khoản
if (isset($_POST['delete'])) {
    $delete_sql = "DELETE FROM profile_user WHERE user_id = ?";
    $delete_stmt = $connect->prepare($delete_sql);
    $delete_stmt->bind_param("i", $user_id);

    if ($delete_stmt->execute()) {
        session_destroy(); // Đăng xuất
        header("Location: ../Pages/login.php?notifi=Tài khoản đã bị xóa");
        exit();
    } else {
        echo "ERROR: Không thể xóa tài khoản.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Quản lý thông tin người dùng</h1>
    
    <div>
        <?= isset($_GET["notifi"]) ? htmlspecialchars($_GET["notifi"]) : '' ?>
    </div>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Ngày sinh:</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?= htmlspecialchars($profile['date_of_birth']) ?>">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Giới tính:</label>
            <select class="form-select" id="gender" name="gender">
                <option value="male" <?= ($profile['gender'] == 'male') ? 'selected' : '' ?>>Nam</option>
                <option value="female" <?= ($profile['gender'] == 'female') ? 'selected' : '' ?>>Nữ</option>
                <option value="other" <?= ($profile['gender'] == 'other') ? 'selected' : '' ?>>Khác</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Tiểu sử:</label>
            <textarea class="form-control" id="bio" name="bio"><?= htmlspecialchars($profile['bio']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Trang web:</label>
            <input type="url" class="form-control" id="website" name="website" value="<?= htmlspecialchars($profile['website']) ?>">
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Địa điểm:</label>
            <input type="text" class="form-control" id="location" name="location" value="<?= htmlspecialchars($profile['location']) ?>">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($profile['phone']) ?>">
        </div>
        
        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
        <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản?')">Xóa tài khoản</button>
    </form>
</div>
</body>
</html>
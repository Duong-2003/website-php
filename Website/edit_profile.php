<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Chỉnh Sửa Hồ Sơ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .profile-header {
            background-color: #f7f7f7;
            padding: 20px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .profile-header img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
        }
    </style>
</head>

<?php
session_start();
include('../Sources/FE/top_header.php');
include('../Sources/FE/header.php');
include('../connect_SQL/connect.php'); // Kết nối đến cơ sở dữ liệu

// Lấy ID người dùng từ session
$user_id = $_SESSION['user_id'];

// Kiểm tra nếu user_id tồn tại
if (!isset($user_id)) {
    echo "Vui lòng đăng nhập để chỉnh sửa hồ sơ.";
    exit();
}

// Lấy thông tin người dùng từ bảng user
$sqlUser = "SELECT * FROM `user` WHERE user_id = ?";
$stmtUser = $connect->prepare($sqlUser);
$stmtUser->bind_param("i", $user_id);
$stmtUser->execute();
$resultUser = $stmtUser->get_result();

// Kiểm tra nếu có dữ liệu người dùng
if ($resultUser->num_rows > 0) {
    $userData = $resultUser->fetch_assoc();
    
    // Lấy thông tin hồ sơ từ bảng profile_user
    $sqlProfile = "SELECT * FROM `profile_user` WHERE user_id = ?";
    $stmtProfile = $connect->prepare($sqlProfile);
    $stmtProfile->bind_param("i", $user_id);
    $stmtProfile->execute();
    $resultProfile = $stmtProfile->get_result();

    // Kiểm tra nếu có dữ liệu hồ sơ
    if ($resultProfile->num_rows > 0) {
        $profileData = $resultProfile->fetch_assoc();
    } else {
        // Nếu không tìm thấy hồ sơ, khởi tạo mảng mặc định
        $profileData = [
            'phone' => '',
            'date_of_birth' => '',
            'gender' => '',
            'bio' => '',
            'website' => '',
            'location' => '',
            'avatar' => 'default_avatar.png' // Hình đại diện mặc định
        ];
    }
} else {
    echo "Không tìm thấy thông tin người dùng.";
    exit();
}
?>

<body>
    <div class="container mt-5">
    <div class="profile-header">
            <?php
            // Kiểm tra xem hình đại diện có tồn tại không
            $avatarPath = htmlspecialchars($userData['avatar']);
            if (file_exists($avatarPath) && !empty($avatarPath)) {
                echo '<img src="' . $avatarPath . '" alt="Avatar">';
            } else {
                echo '<img src="../Assets/img/index/avatar-dep-119.jpg" alt="Avatar">';
            }
            ?>
            <h2><?php echo htmlspecialchars($userData['name']); ?></h2>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="../Sources/BE/update_profile.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Ảnh đại diện</label>
                        <input type="file" class="form-control" id="avatar" name="avatar">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên người dùng</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($userData['name']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($userData['email']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($profileData['phone']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Ngày sinh</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo htmlspecialchars($profileData['date_of_birth']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Giới tính</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="male" <?php echo ($profileData['gender'] == 'male') ? 'selected' : ''; ?>>Nam</option>
                            <option value="female" <?php echo ($profileData['gender'] == 'female') ? 'selected' : ''; ?>>Nữ</option>
                            <option value="other" <?php echo ($profileData['gender'] == 'other') ? 'selected' : ''; ?>>Khác</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label">Giới thiệu bản thân</label>
                        <textarea class="form-control" id="bio" name="bio" rows="3"><?php echo htmlspecialchars($profileData['bio']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="url" class="form-control" id="website" name="website" value="<?php echo htmlspecialchars($profileData['website']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="location" name="location" value="<?php echo htmlspecialchars($profileData['location']); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a href="profile.php" class="btn btn-secondary">Hủy</a>
                    <a href="./profile_user.php" class="btn btn-primary">Quay Ve</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php
include('../Sources/FE/footer_save.php');
include('../Sources/FE/footer.php');
?>

</html>
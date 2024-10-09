<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Hồ Sơ Người Dùng</title>
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

        .profile-info {
            margin-top: 20px;
        }

        .form-control[readonly] {
            background-color: #e9ecef;
        }
    </style>
</head>

<?php
session_start();

include( '../Sources/FE/top_header.php');
include( '../Sources/FE/header.php');

include_once('../sources/connect.php');

?>

<body>
    <div class="container mt-5">
        <div class="profile-header">
            <img src="<?php echo $userData['avatar']; ?>" alt="Avatar">
            <h2><?php echo $userData['username']; ?></h2>
        </div>
        <div class="card profile-info">
            <div class="card-body">
                <div class="mb-3">
                    <label for="username" class="form-label">Tên người dùng</label>
                    <input type="text" class="form-control" id="username" value="<?php echo $users['username']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $username['email']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" value="<?php echo $username['phone']; ?>" readonly>
                </div>
                <div class="text-center">
                    <a href="./edit_profile_form.php" class="btn btn-primary">Chỉnh sửa hồ sơ</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php
include( '../Sources/FE/footer_save.php');
include( '../Sources/FE/footer.php');
?>

</html>
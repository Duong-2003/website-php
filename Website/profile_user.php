<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Hồ Sơ Người Dùng</title>
    <style>
        .avatar {
            width: 150px;  /* Increased size */
            height: 150px; /* Increased size */
            border-radius: 50%;
            margin-right: 10px; /* Adjusted margin */
            object-fit: cover; /* Ensure the image is not distorted */
        }

        body {
            font-family: Arial, sans-serif; /* Font style */
        }
    </style>
</head>

<?php
$linkFE = '../sources/FE/'; // Ensure this path is correct
include($linkFE . 'top_header.php');
include($linkFE . 'header.php');

// Assuming you have a function to get user data
// Example: $userData = getUserData(); 
// Here is a dummy array for demonstration purposes
$userData = [
    'username' => 'Tên người dùng',
    'email' => 'email@example.com',
    'phone' => '0123456789',
    'avatar' => 'https://cdn-media.sforum.vn/storage/app/media/THANHAN/2/2a/avatar-dep-119.jpg'
];
?>

<body>

    <div class="container mt-5">
        <h2>Hồ Sơ Của Tôi</h2>
        <div class="card">
            <div class="card-body">
                <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Ảnh đại diện</label>
                        <div>
                            <img src="<?php echo $userData['avatar']; ?>" alt="Avatar" class="avatar">
                        </div>
                        <input type="file" class="form-control" id="avatar" name="avatar">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên người dùng</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $userData['username']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $userData['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $userData['phone']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php
include($linkFE . 'footer_save.php');
include($linkFE . 'footer.php');
?>

</html>
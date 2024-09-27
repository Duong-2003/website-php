<?php
session_start(); // Bắt đầu phiên

if (!isset($_SESSION['username'])) {
    header('Location: ../Pages/Admin_Login.php');
    exit();
} else {
    // Kiểm tra giá trị của username
    echo 'Đã đăng nhập với username: ' . htmlspecialchars($_SESSION['username']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            transition: margin-left 0.3s;
            /* Hiệu ứng chuyển đổi cho margin */
        }

        .sidebar {
            height: 100vh;
            width: 300px;
            /* Độ rộng của sidebar */
            position: fixed;
            top: 0;
            left: 0;
            /* Đặt sidebar cố định bên trái */
            background-color: #343a40;
            /* Màu nền sidebar */
            padding-top: 20px;
            /* Khoảng cách từ trên xuống */
            font-family: 'Verdana', sans-serif;
            /* Thay đổi font cho sidebar */
            overflow-y: auto;
            /* Cho phép cuộn nếu nội dung dài */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            /* Đổ bóng cho sidebar */
        }

        .sidebar .nav-link {
            color: #f8f9fa;
            /* Màu chữ cho nav link */
            font-size: 1.1rem;
            /* Kích thước chữ */
            transition: background-color 0.3s;
            /* Hiệu ứng chuyển màu nền */
            white-space: nowrap;
            /* Đảm bảo chữ không xuống dòng */
            padding: 10px 15px;
            /* Khoảng cách bên trong liên kết */
            border-radius: 5px;
            /* Bo góc cho các liên kết */
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            /* Màu nền khi hover */
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        .sidebar .user-info {
            display: flex;
            align-items: center;
            padding: 15px;
            /* Khoảng cách tốt hơn cho padding */
            color: #f8f9fa;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            /* Để dropdown có thể được định vị */
        }

        .dropdown-menu {
            width: 250px;
            /* Đảm bảo menu dropdown rộng hơn */
            position: absolute;
            /* Đặt dropdown ở vị trí tuyệt đối */
            right: 0;
            /* Đưa dropdown sang bên phải */
            z-index: 1000;
            /* Đảm bảo dropdown nằm trên các thành phần khác */
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                margin-left: 0;
                /* Phục hồi lại margin khi màn hình nhỏ */
            }

            .sidebar {
                width: 100%;
                /* Đặt sidebar rộng 100% trên màn hình nhỏ */
                height: auto;
                /* Chiều cao tự động */
                position: relative;
                /* Thay đổi vị trí để không cố định */
            }

            .sidebar .nav-link {
                font-size: 1rem;
                /* Kích thước chữ nhỏ hơn trên màn hình nhỏ */
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="container">
        <div class="sidebar" id="sidebar">
            <div class="user-info">
                <img src="https://cdn-media.sforum.vn/storage/app/media/THANHAN/2/2a/avatar-dep-119.jpg" alt="Avatar"
                    class="avatar me-2">
                <strong><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Khách'; ?></strong>
                <div class="dropdown ms-auto"> <!-- Thêm dropdown vào đây -->
                    <a href="#" class="text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small">
                        <?php if (isset($_SESSION['username'])): ?>
                            <li><a class="dropdown-item" target="_blank" href="../Pages/MenuAdmin.php">Xem trang</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../Includes/BE/LogoutProcess.php">Đăng xuất</a></li>
                        <?php else: ?>
                            <li><a class="dropdown-item" href="../Pages/Admin_Login.php">Đăng nhập</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="modal-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="./Ecom.php" class="nav-link"><i class="fa-solid fa-chart-line"></i> Thống kê doanh
                            số</a>
                    </li>
                    <li class="nav-item">
                        <a href="../Pages/ListProductType.php" class="nav-link"><i class="fa-solid fa-tags"></i> Danh
                            mục Loại Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a href="../Pages/ListProduct.php" class="nav-link"><i class="fa-solid fa-box"></i> Danh mục Sản
                            phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a href="../Pages/ListUsers.php" class="nav-link"><i class="fa-solid fa-users"></i> Danh mục
                            Người dùng</a>
                    </li>
                    <li class="nav-item">
                        <a href="../Pages/ListOrder.php" class="nav-link"><i class="fa-solid fa-shopping-cart"></i> Danh
                            mục Đơn hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>
<?php
session_start();
ob_start();


if (!isset($_SESSION['username'])) {
    header('Location: ../Pages/Admin_Login.php');
    exit();
}
// else {
//     // Kiểm tra giá trị của username
//     echo 'Đã đăng nhập với username: ' . htmlspecialchars($_SESSION['username']);
// }
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        transition: margin-left 0.3s;
    }

    .sidebar {
        height: 100vh;
        width: 300px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #343a40;
        padding-top: 20px;
        font-family: 'Verdana', sans-serif;
        overflow-y: auto;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
    }

    .sidebar .nav-link {
        color: #f8f9fa;
        font-size: 1.1rem;
        transition: background-color 0.3s;
        white-space: nowrap;
        padding: 10px 15px;
        border-radius: 5px;
    }

    .sidebar .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
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
        color: #f8f9fa;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
    }

    .dropdown-menu {
        width: 250px;
        position: absolute;
        right: 0;
        z-index: 1000;
    }

    @media (max-width: 768px) {
        body {
            margin-left: 0;
        }

        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .sidebar .nav-link {
            font-size: 1rem;
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
                <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
            </div>
            <div class="modal-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="../Pages/Ecom.php" class="nav-link"><i class="fa-solid fa-sign-out-alt"></i> Xem
                            trang</a>

                    </li>
                    <li class="nav-item">
                        <a href="./Ecom.php" class="nav-link"><i class="fa-solid fa-chart-line"></i> Thống kê</a>
                    </li>
                    <li class="nav-item">
                        <a href="../Pages/ListProductType.php" class="nav-link"><i class="fa-solid fa-tags"></i> Danh
                            mục loại sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a href="../Pages/ListProduct.php" class="nav-link"><i class="fa-solid fa-box"></i> Danh mục sản
                            phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a href="../Pages/ListUsers.php" class="nav-link"><i class="fa-solid fa-users"></i> Danh mục
                            tài khoản</a>
                    </li>
                    <li class="nav-item">
                        <a href="../Pages/ListOrder.php" class="nav-link"><i class="fa-solid fa-shopping-cart"></i> Danh
                            mục đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a href="../Includes/BE/LogoutProcess.php" class="nav-link"><i
                                class="fa-solid fa-sign-out-alt"></i> Đăng xuất</a>

                    </li>


                </ul>
            </div>
        </div>
    </div>

</body>

</html>
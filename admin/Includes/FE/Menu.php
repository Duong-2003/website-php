<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../Includes/linkAdmin.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Admin Dashboard</title>
    <style>
        .navbar-brand {
            font-family: initial;
        }
    </style>
</head>

<body>

    <?php
    // Uncomment if session start is needed
    // session_start();
    
    // Check if the user is logged in
    // if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    //     header('Location: Admin_Login.php');
    //     exit;
    // }
    ?>

    <!-- Navbar for mobile -->
    <nav class="navbar navbar-dark bg-dark d-lg-none">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Navbar for desktop -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-none d-lg-block">
        <div class="container-fluid">
            <a class="navbar-brand" href="./Ecom.php">TRANG QUẢN TRỊ ADMIN</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="./Ecom.php" class="nav-link"><i class="fa-solid fa-chart-line"></i> Thống kê doanh số</a>
                    </li>
                    <li class="nav-item">
                        <a href="./ListProductType.php" class="nav-link"><i class="fa-solid fa-tags"></i> Danh mục Loại Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a href="./ListProduct.php" class="nav-link"><i class="fa-solid fa-box"></i> Danh mục Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a href="./ListUsers.php" class="nav-link"><i class="fa-solid fa-users"></i> Danh mục Người dùng</a>
                    </li>
                    <li class="nav-item">
                        <a href="./ListOrder.php" class="nav-link"><i class="fa-solid fa-shopping-cart"></i> Danh mục Đơn hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Offcanvas menu for mobile -->
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="./Ecom.php" class="nav-link text-white"><i class="fa-solid fa-chart-line"></i> Thống kê doanh số</a>
                </li>
                <li class="nav-item">
                    <a href="./ListProductType.php" class="nav-link text-white"><i class="fa-solid fa-tags"></i> Danh mục Loại Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a href="./ListProduct.php" class="nav-link text-white"><i class="fa-solid fa-box"></i> Danh mục Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a href="./ListUsers.php" class="nav-link text-white"><i class="fa-solid fa-users"></i> Danh mục Người dùng</a>
                </li>
                <li class="nav-item">
                    <a href="./ListOrder.php" class="nav-link text-white"><i class="fa-solid fa-shopping-cart"></i> Danh mục Đơn hàng</a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://cdn-media.sforum.vn/storage/app/media/THANHAN/2/2a/avatar-dep-119.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong><?php echo $_SESSION['username']; ?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small">
                    <li><a class="dropdown-item" target="_blank" href="../../Website/Website.php">Xem trang</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Chuyển hướng đến Ecom.php nếu không có tham số trong URL
        if (window.location.pathname === "/path/to/your/admin/dashboard.php") { // Thay đổi đường dẫn tới file này
            window.location.href = "./Ecom.php";
        }
    </script>

</body>

</html>
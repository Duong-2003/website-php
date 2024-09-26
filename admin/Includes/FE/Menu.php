<!DOCTYPE html>
<html lang="en">

<head>
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

include('../conn/connect.php');
    ?>

    <!-- Button to open modal -->
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#navbarModal">
        Mở Menu
    </button>

    <!-- Modal for navbar -->
    <div class="modal fade" id="navbarModal" tabindex="-1" aria-labelledby="navbarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="navbarModalLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="./Ecom.php" class="nav-link text-white"><i class="fa-solid fa-chart-line"></i> Thống kê doanh số</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Pages/ListProductType.php" class="nav-link text-white"><i class="fa-solid fa-tags"></i> Danh mục Loại Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Pages/ListProduct.php" class="nav-link text-white"><i class="fa-solid fa-box"></i> Danh mục Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Pages/ListUsers.php" class="nav-link text-white"><i class="fa-solid fa-users"></i> Danh mục Người dùng</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Pages/ListOrder.php" class="nav-link text-white"><i class="fa-solid fa-shopping-cart"></i> Danh mục Đơn hàng</a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://cdn-media.sforum.vn/storage/app/media/THANHAN/2/2a/avatar-dep-119.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Khách'; ?></strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small">
                            <?php if (isset($_SESSION['username'])): ?>
                                <li><a class="dropdown-item" target="_blank" href="../FE/Menu.php">Xem trang</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../BE/LogoutProcess.php">Đăng xuất</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item" href="../Pages/Admin_Login.php">Đăng nhập</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
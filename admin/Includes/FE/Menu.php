<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../Includes/linkAdmin.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Admin Dashboard</title>
    <style>
        @media (min-width: 992px) {
            .navbar-expand-lg .navbar-collapse {
                display: flex !important;
                flex-basis: auto;
                justify-content: flex-end;
            }
        }

        #logo img {
            height: 60px;
            margin: 0 auto;
        }

        .navbar-brand {
            font-family: 'Courier New', Courier, monospace;
        }

        .nav-link {
            display: flex;
            align-items: center;
        }

        .nav-link i {
            margin-right: 8px;
        }

        /* Đảm bảo menu không bị vỡ phông */
        .navbar-nav {
            flex-direction: row;
        }

        @media (max-width: 992px) {
            .offcanvas-body {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark d-lg-none">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-none d-lg-block">
        <div class="container-fluid">
            <a class="navbar-brand" href="./Ecom.php">TRANG QUẢN TRỊ ADMIN</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="./Ecom.php" class="nav-link">
                            <i class="fa-solid fa-chart-line"></i> Thống kê doanh số
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./ListProductType.php" class="nav-link">
                            <i class="fa-solid fa-tags"></i> Danh mục Loại Sản phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./ListProduct.php" class="nav-link">
                            <i class="fa-solid fa-box"></i> Danh mục Sản phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./ListUsers.php" class="nav-link">
                            <i class="fa-solid fa-users"></i> Danh mục Người dùng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./ListOrder.php" class="nav-link">
                            <i class="fa-solid fa-shopping-cart"></i> Danh mục Đơn hàng
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar">
        <div class="offcanvas-header">
            <div id="logo">
                <a href="#"><img src="<?= $linkImg . 'admin.png' ?>" alt="Logo"></a>
            </div>
        </div>
        <div class="offcanvas-body">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="./Ecom.php" class="nav-link text-white">
                        <i class="fa-solid fa-chart-line"></i> Thống kê doanh số
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./ListProductType.php" class="nav-link text-white">
                        <i class="fa-solid fa-tags"></i> Danh mục Loại Sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./ListProduct.php" class="nav-link text-white">
                        <i class="fa-solid fa-box"></i> Danh mục Sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./ListUsers.php" class="nav-link text-white">
                        <i class="fa-solid fa-users"></i> Danh mục Người dùng
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./ListOrder.php" class="nav-link text-white">
                        <i class="fa-solid fa-shopping-cart"></i> Danh mục Đơn hàng
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://avatars.githubusercontent.com/u/125018793?s=400&u=d66a7dc1d555eb23d223fe07b638e9701a5735be&v=4" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Admin</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" target="_blank" href="../../Website/Website.php">View</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
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
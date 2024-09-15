<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Header Menu</title>

    <style>
        #navbar2 {
            background: linear-gradient(to right, #7FACD6, #BFB8DA);
        }

        .navbar-nav .dropdown-menu {
            position: absolute;
            left: 0;
            top: 100%;
            min-width: 100%;
            z-index: 9999;
            display: none; /* Ẩn menu mặc định */
        }

        .navbar-nav .dropdown:hover .dropdown-menu {
            display: block; /* Hiển thị menu khi hover */
        }

        .dropdown-item {
            background-color: #f8f9fa; /* Màu nền cho các mục dropdown */
            color: #333;
            padding: 15px 20px; /* Tăng padding cho các mục */
            border-bottom: 1px solid #e9ecef; /* Đường viền giữa các mục */
            
            display: flex; /* Đảm bảo nội dung căn giữa */
            align-items: center; /* Căn giữa theo chiều dọc */
            justify-content: center; /* Căn giữa theo chiều ngang */
        }

        .dropdown-item:hover {
            background-color: #e2e6ea; /* Màu nền khi hover */
        }
 
       
        /* CSS cho submenu */
        
        .dropdown-menu ul {
            display: block; /* Hiển thị submenu */
            padding-left: 15px; /* Khoảng cách bên trái cho submenu */
            margin: 0; /* Không có margin */
        }

        /* Căn chỉnh các mục trong submenu */
        .dropdown-menu li {
            display: flex; /* Hiển thị theo chiều dọc */
            flex-direction: column; /* Căn chỉnh theo chiều dọc */
        }

        .dropdown-menu .dropdown-item {
            height: auto; /* Đặt chiều cao tự động cho các mục trong submenu */
            justify-content: flex-start; /* Căn trái cho nội dung trong submenu */
        }

        nav.navbar.navbar-expand-lg {
            bottom: -8px;
        }
    </style>
</head>

<body>
    <div class="header-menu" id="header-menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav" id="navbar2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="danhmucsanpham" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i style="font-size: 20px; margin: 0 2px;" class="fa-solid fa-list"></i>
                            ĐỒ DÙNG HỌC SINH
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="danhmucsanpham">
                            <li>
                                <a class="dropdown-item" href="#">STUDENT STATIONERY</a>
                                <ul>
                                    <li><a class="dropdown-item" href="#">Notebook</a></li>
                                    <li><a class="dropdown-item" href="#">Pen</a></li>
                                    <li><a class="dropdown-item" href="#">Balo</a></li>
                                    <li><a class="dropdown-item" href="#">Cover the Notebook</a></li>
                                    <li><a class="dropdown-item" href="#">Label Book</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">OFFICE STATIONERY</a>
                                <ul>
                                    <li><a class="dropdown-item" href="#">Document Book</a></li>
                                    <li><a class="dropdown-item" href="#">Clamp</a></li>
                                    <li><a class="dropdown-item" href="#">Pin Shooting</a></li>
                                    <li><a class="dropdown-item" href="#">Note</a></li>
                                    <li><a class="dropdown-item" href="#">Printing Paper</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="khuyenmai" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-tag" style="font-size: 20px; margin: 0 2px;"></i>
                            VĂN PHÒNG PHẨM
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="khuyenmai">
                            <li><a class="dropdown-item" href="#">Giảm giá sản phẩm</a></li>
                            <li><a class="dropdown-item" href="#">Ưu đãi đặc biệt</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="tintuc" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-envelope" style="font-size: 20px; margin: 0 2px;"></i>
                            TIN TỨC
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="tintuc">
                            <li><a class="dropdown-item" href="#">Tin tức mới nhất</a></li>
                            <li><a class="dropdown-item" href="#">Bài viết nổi bật</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="lienhe" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-envelope" style="font-size: 20px; margin: 0 2px;"></i>
                            LIÊN HỆ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="lienhe">
                            <li><a class="dropdown-item" href="#">Thông tin liên hệ</a></li>
                            <li><a class="dropdown-item" href="#">Hỗ trợ khách hàng</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="showroom" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-store" style="font-size: 20px; margin: 0 2px;"></i>
                            SHOWROOM360
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="showroom">
                            <li><a class="dropdown-item" href="#">Thông tin liên hệ</a></li>
                            <li><a class="dropdown-item" href="#">Hỗ trợ khách hàng</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="khuyenmai2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-gift" style="font-size: 20px; margin: 0 2px;"></i>
                            KHUYẾN MÃI
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="khuyenmai2">
                            <li><a class="dropdown-item" href="#">Thông tin liên hệ</a></li>
                            <li><a class="dropdown-item" href="#">Hỗ trợ khách hàng</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="blog" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-book" style="font-size: 20px; margin: 0 2px;"></i>
                            BLOG
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="blog">
                            <li><a class="dropdown-item" href="#">Thông tin liên hệ</a></li>
                            <li><a class="dropdown-item" href="#">Hỗ trợ khách hàng</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
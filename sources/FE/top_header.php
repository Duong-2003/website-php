<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>

    <style>
        #navbar1 {
            color: #8ab0d5;
            box-shadow: 0px 6px 4px rgba(0, 0, 0, 0.3);
        }

        .top-slogan {
            font-size: 20px;
        }

        .nav-link {
            padding: 10px 15px;
            border-radius: 5px;
            border: 2px solid transparent;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            border-color: rgba(255, 255, 255, 0.5);
        }

        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.3);
            color: #fff;
            border-color: rgba(255, 255, 255, 0.5);
        }

        a.nav-link {
            color: #8ab0d5;
        }
     
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" id="navbar1">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <div class="top-slogan me-auto">Chào mừng bạn đến với <strong>Tech of World</strong>. Cùng vui mua sắm.
                </div>
                <ul class="navbar-nav" id="ic-notuser">
                    <li class="nav-item">
                        <a class="nav-link home" href="./index.php"><i class="fas fa-home"></i> Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link login" href="./login.php"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link register" href="./register.php"><i class="fas fa-user-plus"></i> Đăng ký</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link forgot-password" href="./forgot-password.php"><i class="fas fa-key"></i> Quên
                            mật khẩu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link contact" href="./contact.php"><i class="fas fa-envelope"></i> Liên hệ</a>
                    </li>
                </ul>
                

                <ul class="navbar-nav ms-auto" id="ic-user" style="display: none;">
                <li class="nav-item">
                        <a class="nav-link home" href="./website.php"><i class="fas fa-home"></i> Trang chủ</a>
                    </li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           
                            <span id="username-display" class="ms-2"><?= htmlspecialchars($user['name']) ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="../sources/FE/profile_user.php"><i
                                        class="fas fa-user"></i> Hồ sơ của tôi</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="../sources/BE/logout_process.php"><i
                                        class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    include_once($linkFE . "User.php");

    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (isset($_SESSION['username'])) {
        // Sử dụng thông tin đăng nhập từ session
        $loggedInUsername = $_SESSION['username'];
    }
    ?>

    <script>
        var username = <?php echo isset($loggedInUsername) ? json_encode($loggedInUsername) : 'null'; ?>;

        // Xử lý hiển thị thông tin người dùng
        function myFunction() {
            if (username) {
                document.getElementById("username-display").textContent = username;
                document.getElementById("ic-user").style.display = 'flex';
                document.getElementById("ic-notuser").style.display = 'none';
            } else {
                document.getElementById("ic-user").style.display = 'none';
                document.getElementById("ic-notuser").style.display = 'flex';
            }
        }

        document.addEventListener("DOMContentLoaded", myFunction);
    </script>
</body>

</html>
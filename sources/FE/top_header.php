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
            /* background: linear-gradient(to right, #7FACD6, #BFB8DA); */
            color: #8ab0d5;
            box-shadow: 0px 6px 4px rgba(0, 0, 0, 0.3);
        }

       

        .top-slogan {
            font-size: 20px;
            opacity: 0;
            animation: fadeUp 1s ease-out forwards, glow 2s ease-in-out infinite;
        }

        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes glow {
            0% {
                text-shadow: 0 0 0 rgba(255, 255, 255, 0);
            }

            50% {
                text-shadow: 0 0 10px rgba(255, 255, 255, 1);
            }

            100% {
                text-shadow: 0 0 0 rgba(255, 255, 255, 0);
            }
        }

        .top-social a {
            color: #fff;
            padding: 0 10px;
            font-size: 27px;
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
            /* Border on hover */
        }

        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.3);
            color: #fff;
            border-color: rgba(255, 255, 255, 0.5);
            /* Active border color */
        }

        /* Distinct hover styles */
        .nav-link.home:hover {
            background-color: rgba(255, 99, 71, 0.7);
            /* Tomato */
            color: #fff;
            /* Change text color on hover */
        }

        .nav-link.login:hover {
            background-color: rgba(30, 144, 255, 0.7);
            /* Dodger Blue */
            color: #fff;
        }

        .nav-link.register:hover {
            background-color: rgba(60, 179, 113, 0.7);
            /* Medium Sea Green */
            color: #fff;
        }

        .nav-link.contact:hover {
            background-color: RGBA(255, 182, 193, 1);
            /* Gold */
            color: #fff;
        }

        .nav-link.forgot-password:hover {
            background-color: RGBA(255, 160, 122, 1);
            /* Orange */
            color: #fff;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler:hover {
            background-color: rgba(255, 255, 255, 0.1);
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

        // Xử lý thay đổi icone user
        function myFunction() {
            if (typeof username !== 'undefined' && username !== null) {
                console.log("Đăng nhập: " + username);
                var newElement = document.getElementById("ic-user");
                var oldElement = document.getElementById("ic-notuser");
                if (newElement && oldElement) {
                    var clonedElement = newElement.cloneNode(true);
                    clonedElement.style.display = 'block';
                    oldElement.parentNode.replaceChild(clonedElement, oldElement);
                }
            } else {
                console.log("Chưa đăng nhập");
            }
        }
        document.addEventListener("DOMContentLoaded", myFunction);
    </script>
</body>

</html>
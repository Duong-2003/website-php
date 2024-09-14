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
    <title>Tech of World Website Shop</title>

    <style>
        body {
            background-color: #f0f4f8; /* Light background for harmony */
        }

        #header {
            z-index: 1000;
            top: 0;
            position: sticky;
            transition: 0.5s;
            box-shadow: 0px 6px 4px rgba(0, 0, 0, 0.3);
            background-image: url(../Assets/img/index/bg-breadcrumb.webp);
        }

        #home ul {
            display: flex;
            justify-content: space-evenly;
            padding-top: 10px;
        }

        #home li a {
            color: #3d3d64;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        #home li:hover a {
            background-color: rgba(255, 255, 255, 0.3);
            color: #d2d2e1 !important;
        }

        #menu-header {
            font-size: 20px;
        }

        .header-input {
            padding: 5px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            min-width: 160px;
            z-index: 100;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        @media screen and (max-width: 990px) {
            #home ul {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="header" id="header">
        <div class="container">
            <div class="row py-2 text-center">
                <div class="col-lg-3 col-md-12" id="logo">
                    <a href="./website.php"><img src="<?= $linkImgIndex . 'logo1.webp' ?>" alt="Logo" style="height:auto;width:100%"></a>
                </div>

                <div class="col-lg-6 col-md-12 text-white">
                    <form action="./listSearch.php" method="GET">
                        <div class="input-group mb-3 header-input">
                            <input id="searchInput" type="text" class="form-control" placeholder="Nội dung tìm kiếm" name="search">
                            <span class="input-group-text" style="background-color:#9fa3fe;">
                                <a style="cursor: pointer;" id="searchClick" name="searchClick">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                </div>

                <div class="col-lg-3 col-md-12" id="home">
                    <ul id="menu-header">
                        <li>
                            <div class="dropdown">
                                <a href="./cart.php?page=1" class="nav-link" id="order">
                                    <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:24px;color: #5c64b4;"></i>
                                    <strong style="font-family: cursive; font-size:25px;">CART</strong>
                                </a>
                                <div class="dropdown-content">
                                    <a href="./cart.php">View Cart</a>
                                    <a href="./checkout.php">Checkout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("searchInput").addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                if (this.value.trim() === "") {
                    event.preventDefault();
                    alert("Vui lòng nhập dữ liệu để tìm kiếm!");
                }
            }
        });

        document.getElementById("searchClick").addEventListener("click", function () {
            var searchValue = document.getElementById('searchInput').value;
            if (searchValue) {
                window.location.href = "./listSearch.php?search=" + searchValue;
            }
        });

        // Image error handling
        function yourFunction() {
            var images = document.querySelectorAll('img');
            images.forEach(function (img) {
                img.addEventListener('error', function () {
                    this.src = '<?php echo $linkImgIndex; ?>nope-not-here.webp';
                });
            });
        }
        document.addEventListener('DOMContentLoaded', function () {
            yourFunction();
        });
    </script>

    <?php include_once($linkFE . "User.php"); ?>
</body>
</html>
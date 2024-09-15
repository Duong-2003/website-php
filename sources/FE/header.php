<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech of World Website Shop</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <style>
       

        #header {
            z-index: 1000;
            top: 0;
            position: sticky;
            transition: 0.5s;
            box-shadow: 0 4px 3px rgba(0, 0, 0, 0.3);
            background: linear-gradient(to right, #7FACD6, #BFB8DA);
        }

        #menu-header {
            font-size: 20px;
        }

        .header-input {
            padding: 5px;
        }

        .card {
            background-color: #ffffff;
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .dropdown-menu {
            min-width: 160px;
        }
    </style>
</head>
<body>
    <div class="header" id="header">
        <div class="container">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row py-4 items-center">
                <div class="w-full md:w-1/4 text-center" id="logo">
                    <a href="./website.php">
                        <img src="<?= $linkImgIndex . 'logo1.webp' ?>" alt="Logo" class="h-auto w-full">
                    </a>
                </div>

                <div class="w-full md:w-1/2">
                    <form action="./listSearch.php" method="GET" class="flex">
                        <input id="searchInput" type="text" class="flex-1 border rounded-l-lg p-2" placeholder="Nội dung tìm kiếm" name="search">
                        <button type="button" id="searchClick" class="bg-indigo-600 text-white rounded-r-lg p-2 hover:bg-indigo-700 transition">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>

                <div class="w-full md:w-1/4 text-center">
                    <div class="relative inline-block">
                        <button class="flex items-center bg-white rounded-lg p-2 shadow hover:shadow-md transition" id="order" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-shopping-cart text-gray-700"></i>
                            <span class="ml-2 text-lg font-semibold">Giỏ hàng</span>
                        </button>
                        <ul class="dropdown-menu hidden absolute right-0 bg-white shadow-lg mt-2 rounded-lg z-10">
                            <li><a class="dropdown-item block px-4 py-2 hover:bg-gray-100" href="./cart.php">View Cart</a></li>
                            <li><a class="dropdown-item block px-4 py-2 hover:bg-gray-100" href="./checkout.php">Checkout</a></li>
                        </ul>
                    </div>

                    <div class="relative inline-block mt-2">
                        <button class="flex items-center bg-white rounded-lg p-2 shadow hover:shadow-md transition" id="orderCall" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-phone text-gray-700"></i>
                            <span class="ml-2 text-lg font-semibold">Gọi đặt hàng</span>
                        </button>
                        <ul class="dropdown-menu hidden absolute right-0 bg-white shadow-lg mt-2 rounded-lg z-10">
                            <li><a class="dropdown-item block px-4 py-2 hover:bg-gray-100" href="tel:+1234567890">Gọi ngay</a></li>
                            <li><a class="dropdown-item block px-4 py-2 hover:bg-gray-100" href="#">Thông tin chi tiết</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>

    <script>
        document.getElementById("searchInput").addEventListener("keydown", function (event) {
            if (event.key === "Enter" && this.value.trim() === "") {
                event.preventDefault();
                alert("Vui lòng nhập dữ liệu để tìm kiếm!");
            }
        });

        document.getElementById("searchClick").addEventListener("click", function () {
            var searchValue = document.getElementById('searchInput').value;
            if (searchValue) {
                window.location.href = "./listSearch.php?search=" + searchValue;
            }
        });

        // Xử lý lỗi hình ảnh
        function handleImageError() {
            var images = document.querySelectorAll('img');
            images.forEach(function (img) {
                img.addEventListener('error', function () {
                    this.src = '<?php echo $linkImgIndex; ?>nope-not-here.webp';
                });
            });
        }
        document.addEventListener('DOMContentLoaded', handleImageError);
    </script>

    <?php include_once($linkFE . "User.php"); ?>
</body>
</html>
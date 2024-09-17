<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech of World Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        #header {
            position: relative;
            /* z-index: 1000;
            top: 0; */
            /* position: sticky; */
            transition: 0.5s;
            box-shadow: 0 4px 3px rgba(0, 0, 0, 0.3);
            background: linear-gradient(to right, #7FACD6, #BFB8DA);
        }

        #logo img {
            max-height: 50px;
        }

        .header-input {
            padding: 5px;
        }

        .dropdown-menu {
            min-width: 160px;
        }

        .header-btn {
            transition: background-color 0.3s;
        }

        .header-btn:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        button#orderCall {
            border: 1px solid #e39797;
            background: #fff;
            color: #dc3545;
        }

        button#order {
            background: #fafcff;
            color: #0dcaf0;
            border: 1px solid #86b7fe;
        }

        button#order:hover {

            background: #6c757d;
            color: #fff;
            border: 1px solid #6c757d;

        }

        button#orderCall:hover {
            background: #db848d;
            color: #fff;
            border: 1px solid #dd9aa0;
        }

        a#cart {
            text-decoration: none;
            color: #0dcaf0;

        }

        a#cart:hover {

            color: #fff;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <div id="logo">
                    <a href="./website.php">
                        <img src="<?= $linkImgIndex . 'logo1.webp' ?>" alt="Logo" class="img-fluid">
                    </a>
                </div>

                <form action="./listSearch.php" method="GET" class="d-flex flex-grow-1 mx-3">
                    <input id="searchInput" type="text" class="form-control me-2"
                        placeholder="Vui lòng nhập từ khóa để tìm kiếm!" name="search" required>
                    <button type="button" id="searchClick" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </form>

                <div class="d-flex align-items-center">
                    <div class=" me-3">
                        <button class="btn header-btn" id="order">
                            <i class="fa fa-shopping-cart text-gray-700"></i>
                            <span class="ms-2"><a id="cart" href="../Website/cart.php">Giỏ hàng</a></span>
                        </button>

                    </div>

                    <div class="">
                        <button class="btn header-btn" id="orderCall">
                            <i class="fa fa-phone text-gray-700"></i>
                            <span class="ms-2">Gọi đặt hàng:</span>01234567890
                        </button>

                    </div>
                </div>

            </div>
        </div>
    </header>

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
</body>

</html>
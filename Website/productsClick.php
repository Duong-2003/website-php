<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm theo loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .content a {
            text-decoration: none;
        }

        .card {
            box-shadow: 0 0 5px 0px;
            color: #999;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .sidebar {
            position: sticky;
            top: 0;
            height: calc(122vh - 10px);
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 20px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                border: none;
                position: relative;
                height: auto;
            }
        }

        button.cart-button.btn-buy.add_to_cart {
            width: 150px;
            background: #DC2028;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
            color: #fff;
            font-size: 14px;
            border: 1px solid;
        }

        #buy {
            color: #fff
        }
    </style>
</head>
<?php
include('../sources/FE/top_header.php');
include('../sources/FE/header.php');
include( '../sources/FE/nav.php');

include('../sources/FE/menu.php');
?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 sidebar">
                <h5 style="text-align: center;">Danh mục sản phẩm</h5>
                <ul class="list-group">

                    <a href="../website/productsClick.php?loaisanpham=but">
                        <li class="list-group-item">Bút</li>
                    </a>
                    <a href="../website/productsClick.php?loaisanpham=hop">
                        <li class="list-group-item">Hộp</li>
                    </a>
                    <a href="../website/productsClick.php?loaisanpham=biakep">
                        <li class="list-group-item">Bìa kẹp</li>
                    </a>
                    <a href="../website/productsClick.php?loaisanpham=maytinh">
                        <li class="list-group-item">Máy tính</li>
                    </a>
                    <a href="../website/productsClick.php?loaisanpham=nhandan">
                        <li class="list-group-item">Nhãn dán</li>
                    </a>
                    <a href="../website/productsClick.php?loaisanpham=sotay">
                        <li class="list-group-item">Sổ tay</li>
                    </a>
                    <a href="../website/productsClick.php?loaisanpham=vo">
                        <li class="list-group-item">Vở</li>
                    </a>
                </ul>
                <hr>
                <h5 style="text-align: center;">Sắp xếp theo giá</h5>
                <ul class="list-group">
                    <li class="list-group-item"><a href="?sort=price-asc&category=<?= $_GET['category'] ?? '' ?>">Giá
                            thấp đến cao</a></li>
                    <li class="list-group-item"><a href="?sort=price-desc&category=<?= $_GET['category'] ?? '' ?>">Giá
                            cao xuống thấp</a></li>
                </ul>
                <hr>
                <img src="../Assets/img/index/img_aside_banner.webp" alt="">
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="product-list mb-3 p-2">
                    <div class="container">
                        <div class="row">
                            <hr style="color: #ad850c">
                            <div class="text-center py-2">
                                <div class="row">
                                    <?php

                                    include_once('../admin/Includes/connect.php');

                                    // Lấy loại sản phẩm từ URL
                                    $loaisanpham = isset($_GET['loaisanpham']) ? $_GET['loaisanpham'] : '';

                                    // Truy vấn sản phẩm theo loại
                                    $sql = "SELECT * FROM sanpham WHERE loaisanpham = '$loaisanpham'";
                                    $result = $connect->query($sql);

                                    $duongdanimg = '../Assets/img/sanpham/'; // Đảm bảo đường dẫn này là chính xác
                                    
                                    if ($result && $result->num_rows > 0) {
                                        while ($data = $result->fetch_assoc()) {
                                            echo '<div class="col-lg-4 col-md-6 col-sm-9 py-2">';
                                            echo '<a href="./product.php?sp_ma=' . $data['sp_ma'] . '">';
                                            echo '<div class="card">';
                                            echo '<img src="' . $duongdanimg . $data['sp_img'] . '" class="card-img-top" alt="' . $data['sp_ten'] . '">';
                                            echo '<p class="card-title"><strong>' . $data['sp_ten'] . '</strong></p>';
                                            echo '<p class="card-text"><strong style="color:#f30; font-size:25px">' . number_format($data['sp_gia'], 0, '.', '.') . ' <sup>đ</sup></strong></p>';
                                            echo '<div class="action-cart d-flex align-items-center justify-content-center">';
                                            echo '<button class="cart-button btn-buy add_to_cart" title="Thêm vào giỏ">';
                                            echo '<a id="buy" href="./product.php?sp_ma=' . $data['sp_ma'] . '">Thêm vào giỏ</a>';
                                            echo '</button>';
                                            echo '</div>'; // action-cart
                                            echo '</div>'; // card-body
                                            echo '</div>'; // card
                                            echo '</a>';
                                            echo '</div>'; // col
                                        }
                                    } else {
                                        echo '<p class="text-center">Không có sản phẩm nào</p>';
                                    }

                                    $connect->close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    include('../sources/FE/footer_save.php');
    include('../sources/FE/footer.php');

    ?>
</body>

</html>
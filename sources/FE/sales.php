<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <title>Trang Sản Phẩm Khuyến Mãi</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .section_flash_sale {
            margin-bottom: 60px;
        }

        .block-title {
            text-align: center;
        }

        .block-product {
            border: 2px solid #DC2028;
            border-radius: 15px;
            padding: 20px;
            background: #fff;
        }

        .flash-sale-swiper {
            overflow: hidden;
        }

        .swiper-slide {
            flex: 0 0 auto;
            width: 18%; /* Giảm chiều rộng để chứa 5 sản phẩm */
            margin-right: 1%;
            transition: transform 0.3s;
        }

        .swiper-slide:last-child {
            margin-right: 0;
        }

        .product-block-item {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            overflow: hidden;
            transition: transform 0.2s;
        }

        .product-block-item:hover {
            transform: scale(1.03);
        }

        .product-info .item-product-name {
            color: #000;
            font-size: 1.1rem;
            margin: 5px 0;
        }

        .product__price .old-price {
            text-decoration: line-through;
            color: #888;
        }

        .cart-button {
            background: #DC2028;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .cart-button:hover {
            background: #c02028;
        }

        .product-block-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #DC2028;
        }

        .pagination .page-link {
            color: #007bff;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .swiper-slide {
                width: 45%; /* Chiều rộng cho màn hình nhỏ */
            }
        }

        @media (max-width: 480px) {
            .swiper-slide {
                width: 90%; /* Chiều rộng cho màn hình rất nhỏ */
                margin-right: 0; /* Không có khoảng cách bên phải */
            }
        }
    </style>
</head>

<body>
    <section class="section_flash_sale">
        <div class="container">
            <div class="block-title">
                <img src="../Assets/img/index/img_title.webp" alt="">
            </div>

            <div class="block-product">
                <div class="flash-sale-swiper swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        include_once("../sources/connect.php");

                        $valueCart = 6; // Số sản phẩm trên mỗi trang
                        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Trang hiện tại
                        $offset = ($page - 1) * $valueCart; // Tính toán offset

                        // Lọc sản phẩm không hết hạn
                        $totalSql = "SELECT COUNT(*) as total FROM sanpham sp JOIN sales s ON sp.sp_ma = s.sp_ma WHERE s.is_expired = 0"; 
                        $totalResult = $connect->query($totalSql);
                        $totalRow = $totalResult->fetch_assoc();
                        $totalProducts = $totalRow['total'];
                        $totalPages = ceil($totalProducts / $valueCart); // Tính tổng số trang

                        // Truy vấn sản phẩm với offset
                        $sql = "SELECT sp.*, s.discount_percent FROM sanpham sp JOIN sales s ON sp.sp_ma = s.sp_ma WHERE s.is_expired = 1 LIMIT $offset, $valueCart"; 
                        $result = $connect->query($sql);
                        $duongdanimg = '../Assets/img/sanpham/';

                        if ($result->num_rows > 0) {
                            while ($data = $result->fetch_assoc()) {
                                echo '<div class="swiper-slide product-block-item">';
                                echo '<a href="./product.php?sp_ma=' . $data['sp_ma'] . '">';
                                echo '<img src="' . $duongdanimg . $data['sp_img'] . '" alt="' . $data['sp_ten'] . '">';
                                echo '<div class="product-info">';
                                echo '<p class="item-product-name"><strong>' . $data['sp_ten'] . '</strong></p>';

                                // Tính toán giá sau khi giảm
                                if (!empty($data['discount_percent'])) {
                                    $discountedPrice = $data['sp_gia'] * (1 - $data['discount_percent'] / 100);
                                    echo '<p class="product__price"><strong style="color:#f30; font-size:20px">' . number_format($discountedPrice, 0, '.', '.') . ' <sup>đ</sup></strong>';
                                    echo ' <span class="old-price">' . number_format($data['sp_gia'], 0, '.', '.') . ' <sup>đ</sup></span></p>';
                                } else {
                                    echo '<p class="product__price"><strong style="color:#f30; font-size:20px">' . number_format($data['sp_gia'], 0, '.', '.') . ' <sup>đ</sup></strong></p>';
                                }
                                echo '</div>'; // product-info
                                echo '<button class="cart-button btn-buy add_to_cart" title="Thêm vào giỏ">Thêm vào giỏ</button>';
                                echo '</a>';
                                echo '</div>'; // swiper-slide
                            }
                        } else {
                            echo '<p class="text-center">Không có sản phẩm nào</p>';
                        }

                        // Phân trang
                        if ($totalPages > 1) {
                            echo '<nav aria-label="Page navigation">';
                            echo '<ul class="pagination justify-content-center">';
                            for ($i = 1; $i <= $totalPages; $i++) {
                                $active = $i === $page ? 'active' : '';
                                echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                            }
                            echo '</ul>';
                            echo '</nav>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            slidesPerView: 5, // Hiện 5 sản phẩm trên mỗi hàng
            spaceBetween: 10,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
            },
        });
    </script>
</body>

</html>
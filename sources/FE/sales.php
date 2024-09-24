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
        .section_flash_sale {
            margin-bottom: 90px;
        }

        .section_flash_sale .block-title {
            text-align: center;
        }

        .section_flash_sale .block-title h2 {
            margin-bottom: 15px;
            font-size: 2rem;
            color: #DC2028;
        }

        .timer {
            background: #DC2028;
            border-radius: 5px;
            width: 191px;
            margin: auto;
            padding: 10px 5px 7px;
            color: #fff;
            font-weight: bold;
        }

        .section_flash_sale .block-product {
            border: 2px solid #DC2028;
            border-radius: 15px;
            padding: 50px 45px;
            background: #fff;
        }

        .product-block-item {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }

        .product-block-item:hover {
            transform: scale(1.05);
        }

        .product-info .item-product-name {
            color: #000;
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .product__price .old-price {
            text-decoration: line-through;
            color: #888;
        }

        .cart-button {
            background: #DC2028;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .cart-button:hover {
            background: #c02028;
        }
    </style>
</head>

<body>
    <section class="section_flash_sale">
        <div class="container">
            <div class="block-title">
                <img src="../Assets/img/index/img_title.webp" alt="">
                <div class="timer" data-countdown="countdown" data-date="12-10-2022-09-15-45">
                    <div class="lof-labelexpired d-none"> Hết hạn</div>
                </div>
            </div>

            <div class="block-product">
                <div class="flash-sale-swiper swiper-container">
                    <div class="swiper-wrapper">
                        <!-- Sản phẩm 1 -->
                        <div class="swiper-slide">
                            <form action="/cart/add" method="post" class="variants">
                                <div class="product-block-item">
                                    <a href="/vo-viet-ke-ngang-nhieu-hinh-sieu-ngo-nghinh">
                                        <img class="product-thumbnail lazy loaded" 
                                             src="//bizweb.dktcdn.net/thumb/large/100/434/558/products/sp10.jpg?v=1629774327897"
                                             alt="Vở viết kẻ ngang nhiều hình siêu ngộ nghĩnh">
                                    </a>
                                    <div class="product-info">
                                        <a href="/vo-viet-ke-ngang-nhieu-hinh-sieu-ngo-nghinh" 
                                           class="item-product-name">Vở viết kẻ ngang nhiều hình siêu ngộ nghĩnh</a>
                                        <div class="product__price">
                                            <span class="price">12.000₫</span>
                                            <span class="old-price">41.000₫</span>
                                        </div>
                                    </div>
                                    <div class="action-cart">
                                        <button class="cart-button" type="button" 
                                                onclick="window.location.href='/vo-viet-ke-ngang-nhieu-hinh-sieu-ngo-nghinh'">
                                            Tùy chọn
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Sản phẩm 2 -->
                        <div class="swiper-slide">
                            <form action="/cart/add" method="post" class="variants">
                                <div class="product-block-item">
                                    <a href="/hop-dung-van-phong-pham-bang-nhua-trong-suot-tien-dung">
                                        <img class="product-thumbnail lazy loaded" 
                                             src="//bizweb.dktcdn.net/thumb/large/100/434/558/products/sp8-3.jpg?v=1629774002220"
                                             alt="Hộp đựng văn phòng phẩm bằng nhựa trong suốt tiện dụng">
                                    </a>
                                    <div class="product-info">
                                        <a href="/hop-dung-van-phong-pham-bang-nhua-trong-suot-tien-dung" 
                                           class="item-product-name">Hộp đựng văn phòng phẩm bằng nhựa trong suốt tiện dụng</a>
                                        <div class="product__price">
                                            <span class="price">15.000₫</span>
                                            <span class="old-price">25.000₫</span>
                                        </div>
                                    </div>
                                    <div class="action-cart">
                                        <button class="cart-button" type="button" 
                                                onclick="window.location.href='/hop-dung-van-phong-pham-bang-nhua-trong-suot-tien-dung'">
                                            Tùy chọn
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Sản phẩm 3 -->
                        <div class="swiper-slide">
                            <form action="/cart/add" method="post" class="variants">
                                <div class="product-block-item">
                                    <a href="/sach-huong-dan-lap-trinh">
                                        <img class="product-thumbnail lazy loaded" 
                                             src="//bizweb.dktcdn.net/thumb/large/100/434/558/products/sp9.jpg?v=1629774327897"
                                             alt="Sách hướng dẫn lập trình">
                                    </a>
                                    <div class="product-info">
                                        <a href="/sach-huong-dan-lap-trinh" 
                                           class="item-product-name">Sách hướng dẫn lập trình</a>
                                        <div class="product__price">
                                            <span class="price">25.000₫</span>
                                            <span class="old-price">50.000₫</span>
                                        </div>
                                    </div>
                                    <div class="action-cart">
                                        <button class="cart-button" type="button" 
                                                onclick="window.location.href='/sach-huong-dan-lap-trinh'">
                                            Tùy chọn
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Sản phẩm 4 -->
                        <div class="swiper-slide">
                            <form action="/cart/add" method="post" class="variants">
                                <div class="product-block-item">
                                    <a href="/bong-bong-bat-ngo">
                                        <img class="product-thumbnail lazy loaded" 
                                             src="//bizweb.dktcdn.net/thumb/large/100/434/558/products/sp11.jpg?v=1629774327897"
                                             alt="Bóng bóng bất ngờ">
                                    </a>
                                    <div class="product-info">
                                        <a href="/bong-bong-bat-ngo" 
                                           class="item-product-name">Bóng bóng bất ngờ</a>
                                        <div class="product__price">
                                            <span class="price">30.000₫</span>
                                            <span class="old-price">60.000₫</span>
                                        </div>
                                    </div>
                                    <div class="action-cart">
                                        <button class="cart-button" type="button" 
                                                onclick="window.location.href='/bong-bong-bat-ngo'">
                                            Tùy chọn
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-primary" id="prev-slide">Trước</button>
                    <button class="btn btn-primary" id="next-slide">Tiếp theo</button>
                </div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            slidesPerView: 3,
            spaceBetween: 30,
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
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        });

        document.getElementById('prev-slide').addEventListener('click', () => {
            swiper.slidePrev();
        });

        document.getElementById('next-slide').addEventListener('click', () => {
            swiper.slideNext();
        });
    </script>
</body>
</html>

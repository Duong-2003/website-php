<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyfQk8J2U6m9T4WjDlJ6oKxvzr1Qs3Z1N7hjFIvmwV4C0S8F1HT6Y4gXx9Gh7I8D" crossorigin="anonymous"></script>
    <title>{{ $tittle }} </title> -->
<style>

.section_flash_sale {
    margin-bottom: 90px;
}

.section_flash_sale .block-title {
    text-align: center;
}

.section_flash_sale .block-title h2 {
    margin-bottom: 15px;
}

a, .text-link {
    color: #000;
    text-decoration: none;
    background: transparent;
}

img {
    max-width: 100%;
    height: auto;
}

.section_flash_sale .block-title .timer {
    background: #DC2028;
    border-radius: 5px;
    width: 191px;
    margin: auto;
    padding: 10px 5px 7px;
    position: relative;
    z-index: 9;
}

.section_flash_sale .block-title .timer .time {
    z-index: 9;
    position: relative;
}

.section_flash_sale .block-product {
    border: 2px solid #DC2028;
    border-radius: 15px;
    padding: 50px 45px;
    position: relative;
    margin-top: -30px;
    background: #fff;
}

.swiper-container {
    margin-left: auto;
    margin-right: auto;
    position: relative;
    overflow: hidden;
    list-style: none;
    padding: 0;
    z-index: 1;
}

.section_flash_sale .swiper-button-next {
    background: #DC2028;
    right: -25px;
}

.swiper-button-next.swiper-button-disabled, 
.swiper-button-prev.swiper-button-disabled {
    opacity: .35;
    cursor: auto;
    pointer-events: none;
}

.section_flash_sale .swiper-button-prev:after {
    font-size: 18px;
    line-height: 40px;
    font-weight: bold;
    margin-right: 3px;
}

.section_flash_sale .swiper-button-next:after {
    font-size: 18px;
    line-height: 40px;
    font-weight: bold;
    margin-left: 3px;
}

.section_flash_sale .block-product .product-block-item .cart-button {
    width: 150px;
    background: #DC2028;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 30px;
    color: #fff;
    font-size: 14px;
}
.product-block-item .action svg path, .product-block-item .action svg circle {
    fill: #fff;
}
.product-block-item .action svg {
    width: 20px;
    height: 20px;
}.product-block-item .product-info .item-product-name {
    padding-top: 20px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    position: relative;
    width: 100%;
    color: #000;
    line-height: 1.3;
    margin-bottom: 5px;
    display: block;
    font-size: 14px;
}.product-block-item:hover .product-thumbnail {
    transform: scale(1.05);
}

</style>
</head>

<body>
    <section class="section_flash_sale">
        <div class="container">
            <div class="block-title">
                <h2>
                    <a href="san-pham-noi-bat" title="Flash sale">

                        <img src="//bizweb.dktcdn.net/100/434/558/themes/894884/assets/img_title.png?1676278234490"
                            alt="Icon tiêu đề">

                    </a>
                </h2>
                <div class="timer">
                    <div class="time" data-countdown="countdown" data-date="12-10-2022-09-15-45">
                        <div class="lof-labelexpired d-none"> Hết hạn</div>
                    </div>
                </div>
            </div>

            <div class="block-product">
                <div class="flash-sale-swiper swiper-container swiper-container-initialized swiper-container-horizontal"
                    style="cursor: grab;">
                    <div class="swiper-wrapper" id="swiper-wrapper-fdd8782248f53745" aria-live="polite"
                        style="transform: translate3d(0px, 0px, 0px);">
                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 5"
                            style="width: 241px; margin-right: 30px;">

                            <form action="/cart/add" method="post" class="variants wishItem has-validation-callback"
                                data-cart-form="" data-id="product-actions-22762776" enctype="multipart/form-data">
                                <div class="product-block-item item-flash-sale">
                                    <div class="product-action">
                                        <a href="javascript:void(0)"
                                            class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                            data-wish="vo-viet-ke-ngang-nhieu-hinh-sieu-ngo-nghinh" tabindex="0"
                                            title="Thêm vào yêu thích">
                                            
                                        </a>

                                    </div>
                                    <a href="/vo-viet-ke-ngang-nhieu-hinh-sieu-ngo-nghinh"
                                        title="Vở viết kẻ ngang nhiều hình siêu ngộ nghĩnh" class="product-transition"
                                        style="height: 241px;">
                                        <img class="product-thumbnail lazy loaded"
                                            src="//bizweb.dktcdn.net/thumb/large/100/434/558/products/sp10.jpg?v=1629774327897"
                                            data-src="//bizweb.dktcdn.net/thumb/large/100/434/558/products/sp10.jpg?v=1629774327897"
                                            alt="Vở viết kẻ ngang nhiều hình siêu ngộ nghĩnh" data-was-processed="true">
                                    </a>
                                    <div class="product-info">
                                        <a href="/vo-viet-ke-ngang-nhieu-hinh-sieu-ngo-nghinh"
                                            title="Vở viết kẻ ngang nhiều hình siêu ngộ nghĩnh"
                                            class="item-product-name">Vở viết kẻ ngang nhiều hình siêu ngộ nghĩnh</a>
                                        <div class="product__price">


                                            <span class="price">12.000₫</span>

                                            <span class="old-price">41.000₫</span>



                                        </div>
                                    </div>
                                    <div
                                        class="action-cart group-buttons d-flex align-items-center justify-content-center">


                                        <input class="hidden" type="hidden" name="variantId" value="50459709">
                                        <button class="cart-button" title="Tùy chọn" type="button"
                                            onclick="window.location.href='/vo-viet-ke-ngang-nhieu-hinh-sieu-ngo-nghinh'">
                                            
                                            Tùy chọn
                                        </button>


                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 5"
                            style="width: 241px; margin-right: 30px;">


                            <form action="/cart/add" method="post" class="variants wishItem has-validation-callback"
                                data-cart-form="" data-id="product-actions-22762752" enctype="multipart/form-data">
                                <div class="product-block-item item-flash-sale">
                                    <div class="product-action">
                                        <a href="javascript:void(0)"
                                            class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                            data-wish="hop-dung-van-phong-pham-bang-nhua-trong-suot-tien-dung"
                                            tabindex="0" title="Thêm vào yêu thích">
                                           
                                        </a>

                                    </div>
                                    <a href="/hop-dung-van-phong-pham-bang-nhua-trong-suot-tien-dung"
                                        title="Hộp đựng văn phòng phẩm bằng nhựa trong suốt tiện dụng"
                                        class="product-transition" style="height: 241px;">
                                        <img class="product-thumbnail lazy loaded"
                                            src="//bizweb.dktcdn.net/thumb/large/100/434/558/products/sp8-3.jpg?v=1629774002220"
                                            data-src="//bizweb.dktcdn.net/thumb/large/100/434/558/products/sp8-3.jpg?v=1629774002220"
                                            alt="Hộp đựng văn phòng phẩm bằng nhựa trong suốt tiện dụng"
                                            data-was-processed="true">
                                    </a>
                                    <div class="product-info">
                                        <a href="/hop-dung-van-phong-pham-bang-nhua-trong-suot-tien-dung"
                                            title="Hộp đựng văn phòng phẩm bằng nhựa trong suốt tiện dụng"
                                            class="item-product-name">Hộp đựng văn phòng phẩm bằng nhựa trong suốt tiện
                                            dụng</a>
                                        <div class="product__price">


                                            <span class="price">15.000₫</span>

                                            <span class="old-price">25.000₫</span>



                                        </div>
                                    </div>
                                    <div
                                        class="action-cart group-buttons d-flex align-items-center justify-content-center">


                                        <input class="hidden" type="hidden" name="variantId" value="50459661">
                                        <button class="cart-button" title="Tùy chọn" type="button"
                                            onclick="window.location.href='/hop-dung-van-phong-pham-bang-nhua-trong-suot-tien-dung'">
                                            
                                            Tùy chọn
                                        </button>


                                    </div>
                                </div>
                            </form>
                        </div>
                        
                      
                                </div>
                            
                        </div>
                    </div>
                  
                </div>
                <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                    aria-label="Previous slide" aria-controls="swiper-wrapper-fdd8782248f53745" aria-disabled="true">
                </div>
                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                    aria-controls="swiper-wrapper-fdd8782248f53745" aria-disabled="false"></div>
            </div>


        </div>
    </section>
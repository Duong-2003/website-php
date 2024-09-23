<style>
.bread-crumb {
    margin-bottom: 0 !important;
    position: relative; /* Để căn chỉnh tuyệt đối cho tiêu đề */
}
.bread-crumb img {
    width: 100%; /* Đảm bảo hình ảnh chiếm toàn bộ chiều rộng */
    height: auto; /* Tự động điều chỉnh chiều cao */
}
.bread-crumb .nd-main-title-breadcrumb {
    color: #fff;
    font-weight: 700;
    font-size: 2rem; /* Kích thước chữ lớn hơn cho dễ đọc */
    text-transform: uppercase;
    position: absolute; /* Đặt tiêu đề ở vị trí tuyệt đối */
    top: 40%; /* Giữa theo chiều dọc */
    left: 50%; /* Giữa theo chiều ngang */
    transform: translate(-50%, -50%); /* Căn giữa */
    z-index: 2; /* Đảm bảo tiêu đề nằm trên hình ảnh */
    text-align: center; /* Căn giữa nội dung */
}
.breadcrumb {
    color: #fff; /* Màu chữ breadcrumb */
    background-color: transparent;
    font-size: 1rem; /* Kích thước chữ breadcrumb */
    font-style: italic;
    position: absolute; /* Đặt breadcrumb ở vị trí tuyệt đối */
    bottom: 10px; /* Cách đáy hình ảnh */
    left: 50%; /* Giữa theo chiều ngang */
    transform: translateX(-50%); /* Căn giữa */
    z-index: 2; /* Đảm bảo breadcrumb nằm trên hình ảnh */
    text-align: center; /* Căn giữa nội dung */
}
.breadcrumb li {
    display: inline-block;
    margin: 0 10px; /* Khoảng cách giữa các mục breadcrumb */
}
.breadcrumb li a {
    color: #fff; /* Màu chữ link */
    text-decoration: none; /* Bỏ gạch chân */
}

/* Responsive */
@media (max-width: 1000px) {
    .nd-main-title-breadcrumb{
        display: none;
    }
    
}
</style>

<section class="bread-crumb">
    <div class="container-fluid py-4">
        <div>
            <img src="../Assets/img/index/bg-breadcrumb.jpg" alt="">
            <div class="nd-main-title-breadcrumb">
                Sản phẩm nổi bật
            </div>
            <ul class="breadcrumb">		
                <li class="home" itemprop="itemListElement">
                    <a itemprop="item" href="../website/website.php" title="Trang chủ">
                        <span itemprop="name">Trang chủ >></span>
                    </a>
                </li>
                <li itemprop="itemListElement">
                    <strong>
                        <a itemprop="item" href="#" title="Sản phẩm nổi bật">
                            <span itemprop="name">Sản phẩm nổi bật</span>
                        </a>
                    </strong>
                </li>
            </ul>
        </div>
    </div>
</section>
<style>
.bread-crumb {
    margin-bottom: 0 !important;
    position: relative;
}

.bread-crumb img {
    width: 100%;
    height: auto;
}

.bread-crumb .nd-main-title-breadcrumb {
    color: #fff;
    font-weight: 700;
    font-size: 2rem;
    text-transform: uppercase;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    text-align: center;
}

.breadcrumb {
    color: #fff;
    background-color: transparent;
    font-size: 1rem;
    font-style: italic;
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 2;
    text-align: center;
}

.breadcrumb li {
    display: inline-block;
    margin: 0 10px;
}

.breadcrumb li a {
    color: #fff;
    text-decoration: none;
}

/* Responsive */
@media (max-width: 1000px) {
    .nd-main-title-breadcrumb {
        display: none;
    }
}
</style>

<section class="bread-crumb">
    <div class="container-fluid py-4">
        <img src="../Assets/img/index/bg-breadcrumb.jpg" alt="Breadcrumb Background">
        <div class="nd-main-title-breadcrumb">
            Sản phẩm nổi bật
        </div>
        <ul class="breadcrumb">
            <li class="home" itemprop="itemListElement">
                <a itemprop="item" href="../website/website.php" title="Trang chủ">
                    <span itemprop="name">Trang chủ</span>
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
</section>
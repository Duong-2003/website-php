<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm mới nhất</title>
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
            height: calc(122 - 10px);
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 20px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Ẩn thanh cuộn */
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                border: none;
                position: relative;
                height: auto; 
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 sidebar">
                <h5 style="text-align: center;">Danh mục sản phẩm</h5>
                <ul class="list-group">
                    <a href="#"><li class="list-group-item">Bút</li></a>
                    <a href="#"><li class="list-group-item">Hộp</li></a>
                    <a href="#"><li class="list-group-item">Lá</li></a>
                    <a href="#"><li class="list-group-item">Máy tính</li></a>
                    <a href="#"><li class="list-group-item">Nhãn dán</li></a>
                    <a href="#"><li class="list-group-item">Sổ tay</li></a>
                    <a href="#"><li class="list-group-item">Vở</li></a>
                </ul>
                <hr>
                <h5 style="text-align: center;">Sắp xếp theo giá</h5>
                <ul class="list-group">
                    <li class="list-group-item"><a href="?sort=price-asc">Giá thấp đến cao</a></li>
                    <li class="list-group-item"><a href="?sort=price-desc">Giá cao xuống thấp</a></li>
                </ul>
                <hr>
                <img src="../Assets/img/index/img_aside_banner.webp" alt="">
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="product-list mb-3 p-2">
                    <div class="container">
                        <div class="row">
                            <hr style="color: #ad850c">
                            <div class="col-md-12 text-center">
                                 <a href="#" style="color: #ad850c; text-decoration: none; font-size: 30px;">
                                    SẢN PHẨM NỔI BẬT
                                </a>
                                <div class="icon-title"><img src="../Assets/img/index/icon_after_title.webp" alt=""></div>
                            </div>
                        </div>

                        <?php
                        include_once("../sources/connect.php");
                        $valueCart = 6; // Số sản phẩm trên mỗi trang
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Trang hiện tại
                        $offset = ($page - 1) * $valueCart; // Tính toán offset

                        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'normal';
                        $orderBy = '';
                        if ($sort == 'price-asc') {
                            $orderBy = 'ORDER BY sp_gia ASC';
                        } elseif ($sort == 'price-desc') {
                            $orderBy = 'ORDER BY sp_gia DESC';
                        }

                        // Truy vấn để lấy tổng số sản phẩm
                        $totalSql = "SELECT COUNT(*) as total FROM sanpham";
                        $totalResult = $connect->query($totalSql);
                        $totalRow = $totalResult->fetch_assoc();
                        $totalProducts = $totalRow['total'];
                        $totalPages = ceil($totalProducts / $valueCart); // Tính tổng số trang

                        // Truy vấn sản phẩm với offset
                        $sql = "SELECT * FROM sanpham $orderBy LIMIT $offset, $valueCart";
                        $result = $connect->query($sql);
                        $duongdanimg = $linkImgSp;

                        $dataArray = [];
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $dataArray[] = $row;
                            }
                        }
                        // Đóng kết nối
                        $connect->close();
                        ?>

                        <div class="text-center py-2">
                            <div class="row">
                                <?php foreach ($dataArray as $data): ?>
                                    <div class="col-lg-4 col-md-6 col-sm-9 py-2">
                                        <a href="./product.php?sp_ma=<?= $data['sp_ma'] ?>">
                                            <div class="card">
                                                <img src="<?= $duongdanimg . $data['sp_img'] ?>" class="card-img-top" alt="<?= $data['sp_ten'] ?>">
                                                <div class="card-body">
                                                    <p class="card-title">
                                                        <strong><?= $data['sp_ten'] ?></strong>
                                                    </p>
                                                    <p class="card-text">
                                                        <strong style="color:#f30; font-size:25px">
                                                            <?= number_format($data['sp_gia'], 0, '.', ',') ?> <sup>đ</sup>
                                                        </strong>
                                                    </p>
                                                    <a href="./product.php?sp_ma=<?= $data['sp_ma'] ?>" class="btn btn-primary">
                                                        <i class="fa-solid fa-cart-shopping"></i> Mua
                                                    </a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Phần phân trang -->
                        <div class="text-center mt-4">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <?php if ($page > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?= $page - 1 ?>&sort=<?= $sort ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                            <a class="page-link" href="?page=<?= $i ?>&sort=<?= $sort ?>"><?= $i ?></a>
                                        </li>
                                    <?php endfor; ?>

                                    <?php if ($page < $totalPages): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?= $page + 1 ?>&sort=<?= $sort ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
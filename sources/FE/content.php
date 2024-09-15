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
            transform: scale(1.1);
        }

        .sidebar {
            border-right: 1px solid #ddd;
            padding: 20px;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                border: none;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-3 sidebar">
                <!-- Danh mục sản phẩm -->
                <h5>Danh mục sản phẩm</h5>
                <ul class="list-group">
                    <li class="list-group-item">Loại sản phẩm 1</li>
                    <li class="list-group-item">Loại sản phẩm 2</li>
                    <li class="list-group-item">Loại sản phẩm 3</li>
                </ul>
            </div>

            <div class="col-lg-10 col-md-9">
                <div class="product-list mb-3 p-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" style="color: red; text-decoration: none; font-size: 30px">
                                    <hr>Sản phẩm mới nhất
                                    <hr>
                                </a>
                            </div>
                        </div>

                        <?php
                        include_once("../sources/connect.php");
                        $valueCart = 20;
                        $sql = "SELECT * FROM sanpham LIMIT $valueCart";
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
                                    <div class="col-lg-3 col-md-4 col-sm-6 py-2">
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

                        <div class="text-center">
                            <a class="btn btn-primary" href="./List.php?page=1">Xem thêm</a>
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
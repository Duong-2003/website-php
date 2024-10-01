<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm mới nhất</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .content a {
            text-decoration: none;
        }

        .card {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            border-radius: 15px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .sidebar {
            position: sticky;
            top: 0;
            height: calc(100vh - 20px);
            padding: 20px;
            border-radius: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h5 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .sidebar a {
            color: #333;
        }

        .sidebar a:hover {
            color: #007bff;
        }

        button.cart-button.btn-buy {
            width: 100%;
            background: #DC2028;
            height: 35px;
            border-radius: 30px;
            color: #fff;
            font-size: 14px;
            border: none;
            transition: background 0.3s;
            margin-top: 10px;
        }

        button.cart-button.btn-buy:hover {
            background: #c81d24;
        }

        #buy {
            color: #fff;
            text-decoration: none;
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
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3 col-md-4 sidebar">
                <h5>Danh mục sản phẩm</h5>
                <ul class="list-group">
                    <a href="../website/List.php">
                        <li class="list-group-item">Tất cả sản phẩm</li>
                    </a>
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
                <h5>Sắp xếp theo giá</h5>
                <ul class="list-group">
                    <li class="list-group-item"><a href="?sort=price-asc&category=<?= $_GET['category'] ?? '' ?>">Giá thấp đến cao</a></li>
                    <li class="list-group-item"><a href="?sort=price-desc&category=<?= $_GET['category'] ?? '' ?>">Giá cao xuống thấp</a></li>
                </ul>
                <hr>
                <img src="../Assets/img/index/img_aside_banner.webp" alt="" class="img-fluid">
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="product-list mb-3 p-2">
                    <div class="container">
                        <div class="row">
                            <hr style="color: #ad850c">
                            <div class="text-center py-2">
                                <div class="row">
                                    <?php
                                    include_once("../sources/connect.php");

                                    $valueCart = 9; // Số sản phẩm trên mỗi trang
                                    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Trang hiện tại
                                    $offset = ($page - 1) * $valueCart; // Tính toán offset
                                    
                                    // Lấy loại sản phẩm từ URL
                                    $category = isset($_GET['category']) ? $_GET['category'] : '';
                                    $whereClause = $category ? "WHERE category = '$category'" : '';

                                    // Sắp xếp
                                    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'normal';
                                    $orderBy = '';
                                    if ($sort == 'price-asc') {
                                        $orderBy = 'ORDER BY sp_gia ASC';
                                    } elseif ($sort == 'price-desc') {
                                        $orderBy = 'ORDER BY sp_gia DESC';
                                    }

                                    // Truy vấn để lấy tổng số sản phẩm
                                    $totalSql = "SELECT COUNT(*) as total FROM sanpham $whereClause";
                                    $totalResult = $connect->query($totalSql);
                                    $totalRow = $totalResult->fetch_assoc();
                                    $totalProducts = $totalRow['total'];
                                    $totalPages = ceil($totalProducts / $valueCart); // Tính tổng số trang
                                    
                                    // Truy vấn sản phẩm với offset
                                    $sql = "SELECT * FROM sanpham $whereClause $orderBy LIMIT $offset, $valueCart";
                                    $result = $connect->query($sql);
                                    $duongdanimg = $linkImgSp;

                                     // Truy vấn sản phẩm theo loại
                                     $sql = "SELECT sp.*, s.discount_percent 
                                     FROM sanpham sp 
                                     LEFT JOIN sales s ON sp.sp_ma = s.sp_ma AND s.is_expired = 0 
                                     ";
                             $result = $connect->query($sql);

                             $duongdanimg = '../Assets/img/sanpham/'; // Đảm bảo đường dẫn này là chính xác
                                    if ($result->num_rows > 0) {
                                        while ($data = $result->fetch_assoc()) {
                                            echo '<div class="col-lg-4 col-md-6 col-sm-9 py-2">';
                                            echo '<a href="./product.php?sp_ma=' . $data['sp_ma'] . '">';
                                            echo '<div class="card">';
                                            echo '<img src="' . $duongdanimg . $data['sp_img'] . '" class="card-img-top" alt="' . $data['sp_ten'] . '">';
                                            echo '<div class="card-body">';
                                            echo '<p class="card-title"><strong>' . $data['sp_ten'] . '</strong></p>';
                                           
                                            // Tính toán giá sau khi giảm
                                            if (!empty($data['discount_percent'])) {
                                                $discountedPrice = $data['sp_gia'] * (1 - $data['discount_percent'] / 100);
                                                echo '<p class="card-text"><strong style="color:#f30; font-size:25px">' . number_format($discountedPrice, 0, '.', '.') . ' <sup>đ</sup></strong>';
                                                echo ' <span style="text-decoration: line-through; color: #888;">' . number_format($data['sp_gia'], 0, '.', '.') . ' <sup>đ</sup></span></p>';
                                            } else {
                                                echo '<p class="card-text"><strong style="color:#f30; font-size:25px">' . number_format($data['sp_gia'], 0, '.', '.') . ' <sup>đ</sup></strong></p>';
                                            }
                                            echo '<div class="action-cart group-buttons d-flex align-items-center justify-content-center">';
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

                                    // Đóng kết nối
                                    $connect->close();
                                    ?>
                                </div>
                            </div>

                            <!-- Phần phân trang -->
                            <div class="text-center mt-4">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <?php if ($page > 1): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?category=<?= $category ?>&page=<?= $page - 1 ?>&sort=<?= $sort ?>" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                                <a class="page-link" href="?category=<?= $category ?>&page=<?= $i ?>&sort=<?= $sort ?>"><?= $i ?></a>
                                            </li>
                                        <?php endfor; ?>

                                        <?php if ($page < $totalPages): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?category=<?= $category ?>&page=<?= $page + 1 ?>&sort=<?= $sort ?>" aria-label="Next">
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
    </div>
</body>

</html>
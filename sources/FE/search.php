<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .content a {
            text-decoration: none;
        }

        .card {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s;
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
            background-color: #f8f9fa;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                position: relative;
                height: auto;
                border: none;
            }
        }

        button.cart-button.btn-buy {
            width: 150px;
            background: #DC2028;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
            color: #fff;
            font-size: 14px;
            border: none;
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



<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4 sidebar">
            <h5 class="text-center">Danh mục sản phẩm</h5>
            <ul class="list-group">
                <li class="list-group-item"><a href="../website/List.php">Tất cả sản phẩm</a></li>
                <li class="list-group-item"><a href="../website/products_click.php?product_type_id=but">Bút</a></li>
                <li class="list-group-item"><a href="../website/products_click.php?product_type_id=hop">Hộp</a></li>
                <li class="list-group-item"><a href="../website/products_click.php?product_type_id=biakep">Bìa kẹp</a></li>
                <li class="list-group-item"><a href="../website/products_click.php?product_type_id=maytinh">Máy tính</a></li>
                <li class="list-group-item"><a href="../website/products_click.php?product_type_id=nhandan">Nhãn dán</a></li>
                <li class="list-group-item"><a href="../website/products_click.php?product_type_id=sotay">Sổ tay</a></li>
                <li class="list-group-item"><a href="../website/products_click.php?product_type_id=vo">Vở</a></li>
                <li class="list-group-item"><a href="../website/products_click.php?product_type_id=tui">Túi</a></li>
                <li class="list-group-item"><a href="?discount=true">Sản phẩm giảm giá</a></li>
            </ul>
            <hr>
            <h5 class="text-center">Sắp xếp theo giá</h5>
            <ul class="list-group">
                <li class="list-group-item"><a href="?sort=price-asc">Giá thấp đến cao</a></li>
                <li class="list-group-item"><a href="?sort=price-desc">Giá cao xuống thấp</a></li>
            </ul>
        </div>

        <div class="col-lg-9 col-md-8">
            <div class="product-list mb-3 p-2">
                <div class="container">
                    <div class="row">
                        <hr style="color: #ad850c">
                        <div class="text-center py-2">
                            <div class="row">
                                <?php
                                    include('../connect_SQL/connect.php'); // Kết nối cơ sở dữ liệu
                                    $search = strtolower(trim($_GET['search'] ?? ''));
                                    $valueCart = 9; // Số sản phẩm trên mỗi trang
                                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Trang hiện tại
                                    $offset = ($page - 1) * $valueCart; // Tính toán offset

                                    // Truy vấn sản phẩm
                                    $query = "SELECT sp.* FROM product sp WHERE LOWER(sp.product_name) LIKE ? OR LOWER(sp.product_type_name) LIKE ? LIMIT ?, ?";
                                    $stmt = $connect->prepare($query);
                                    $searchParam = "%" . $search . "%";
                                    $stmt->bind_param("ssii", $searchParam, $searchParam, $offset, $valueCart);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    $duongdanimg = '../Assets/img/sanpham/';

                                    if ($result && $result->num_rows > 0) {
                                        while ($data = $result->fetch_assoc()) {
                                            ?>
                                            <div class="col-lg-4 col-md-6 col-sm-9 py-2">
                                                <a href="./product.php?product_id=<?= $data['product_id'] ?>">
                                                    <div class="card">
                                                        <img src="<?= $duongdanimg . $data['product_images'] ?>" class="card-img-top" alt="<?= $data['product_name'] ?>">
                                                        <div class="card-body">
                                                            <p class="card-title"><strong><?= htmlspecialchars($data['product_name']) ?></strong></p>
                                                            <p class="card-text">
                                                                <strong style="color:#f30; font-size:25px"><?= number_format($data['product_price'], 0, '.', '.') ?> <sup>đ</sup></strong>
                                                            </p>
                                                            <div class="action-cart d-flex align-items-center justify-content-center">
                                                                <a class="cart-button btn-buy" href="./product.php?product_id=<?= $data['product_id'] ?>">Thêm vào giỏ</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo '<p class="text-center">Không có sản phẩm nào</p>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination py-2 justify-content-center">
            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?search=<?= urlencode($search) ?>&page=<?= max(1, $page - 1) ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
                // Tổng số sản phẩm
                $sql = "SELECT COUNT(*) as total FROM product WHERE LOWER(product_name) LIKE ? OR LOWER(product_type_name) LIKE ?";
                $stmt = $connect->prepare($sql);
                $stmt->bind_param("ss", $searchParam, $searchParam);
                $stmt->execute();
                $countResult = $stmt->get_result();
                $total = $countResult->fetch_assoc()['total'] ?? 0;
                $pagination = ceil($total / $valueCart);

                for ($i = 1; $i <= $pagination; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?search=<?= urlencode($search) ?>&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?= $page >= $pagination ? 'disabled' : '' ?>">
                <a class="page-link" href="?search=<?= urlencode($search) ?>&page=<?= min($pagination, $page + 1) ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    
</body>

</html>
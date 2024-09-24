<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Giỏ hàng</title>

    <?php include('../sources/linkFIle.php'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 12px;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-title a {
            color: #007bff;
            text-decoration: none;
        }

        .card-title a:hover {
            text-decoration: underline;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .modal-header {
            background-color: #dc3545;
            color: white;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }

        .pagination .page-link {
            color: #007bff;
        }

        .pagination .page-link:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    ob_start();
    include($linkFE . 'top_header.php');
    include($linkFE . 'header.php');

    // Kiểm tra đăng nhập
    if (!isset($_SESSION['username'])) {
        $notifi = "Vui lòng đăng nhập để vào giỏ hàng";
        echo "<script>window.location.href = './login.php?notifi=" . urlencode($notifi) . "';</script>";
        exit();
    }

    $name = $_SESSION['username'];

    // Sử dụng Prepared Statements
    $stmt = $connect->prepare("SELECT * FROM donhang WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $resul = $stmt->get_result();

    $danhsachdonhang = [];
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC)) {
        $danhsachdonhang[] = $row;
    }
    $stmt->close();
    ob_end_flush();

    // Phân trang
    $cartValueShow = 10; // Số sản phẩm hiển thị trên mỗi trang
    $pagination = ceil(count($danhsachdonhang) / $cartValueShow);
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max(1, min($pagination, $page)); // Giới hạn trang hợp lệ

    // Tính toán chỉ số đầu và cuối
    $firstPage = ($page - 1) * $cartValueShow;
    $endPage = min($firstPage + $cartValueShow, count($danhsachdonhang));
    ?>

    <div class="container">
        <hr style="color:red">
        <h1 class="text-center" style="color:red;">Giỏ hàng</h1>
        <hr style="color:red">

        <div class="row">
            <?php
            if ($danhsachdonhang) :
                for ($i = $firstPage; $i < $endPage; $i++) :
                    $donhang = $danhsachdonhang[$i];
                    $stmt = $connect->prepare("SELECT * FROM sanpham WHERE sp_ma = ?");
                    $stmt->bind_param("i", $donhang['sp_ma']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $sp = $result->fetch_assoc();
                    $stmt->close();
            ?>
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= $linkImgSp . $sp['sp_img'] ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="./product.php?sp_ma=<?= $sp['sp_ma'] ?>"><?= $sp['sp_ten'] ?></a>
                                    </h5>
                                    <p class="card-text">Mã đơn hàng: <?= $donhang['donhang_ma'] ?></p>
                                    <p class="card-text">Số lượng: <?= $donhang['donhang_soluongsp'] ?></p>
                                    <p class="card-text">Giá: <?= number_format($donhang['donhang_gia'], 0, '.', ',') ?> <sub>đ</sub></p>
                                    <p class="card-text <?php echo ($donhang['donhang_trangthai'] == 'Đã hủy') ? 'text-danger' : ''; ?>">
                                        Trạng thái: <?= $donhang['donhang_trangthai'] ?>
                                    </p>
                                    <p class="card-text"><small class="text-muted">Ngày đặt: <?= $donhang['timeorder'] ?></small></p>

                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <?php if ($donhang['donhang_trangthai'] != "Đã hủy") : ?>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?= $donhang['donhang_ma'] ?>">
                                                Hủy
                                            </button>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Modal Hủy Đơn Hàng -->
                                    <div class="modal fade" id="modal<?= $donhang['donhang_ma'] ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalLabel">Hủy đơn hàng</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn hủy đơn hàng <?= $sp['sp_ten'] ?>?
                                                </div>
                                                <form action="<?= $linkBE ?>OrderCancel.php" method="post">
                                                    <input type="hidden" name="donhang_ma" value="<?= $donhang['donhang_ma'] ?>">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                        <button type="submit" class="btn btn-danger" name="submit">Xác nhận</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
            <?php else : ?>
                <div class="col-12 text-center">Không có đơn hàng nào trong giỏ.</div>
            <?php endif; ?>
        </div>

        <div class="text-center">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#paymentModal">
                Thanh toán đơn hàng
            </button>
        </div>

        <!-- Modal Thanh Toán -->
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="paymentModalLabel">Xác nhận thanh toán</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn thanh toán cho các đơn hàng trong giỏ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <form action="./pay.php" method="post">
                            <button type="submit" class="btn btn-success" name="submit">Xác nhận thanh toán</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <nav aria-label="Page navigation " class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $pagination; $i++) : ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?= ($page >= $pagination) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</body>

</html>
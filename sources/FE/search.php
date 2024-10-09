<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm sản phẩm</title>
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

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
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

<?php
include("../connect_SQL/connect.php"); // Kết nối cơ sở dữ liệu
$search = strtolower(trim($_GET['search']));
$arrange = isset($_GET['arrange']) ? $_GET['arrange'] : "";

// Sử dụng Prepared Statements để tránh lỗ hổng SQL Injection
$query = "SELECT * FROM product WHERE LOWER(product_name) LIKE ? OR LOWER(product_type_name) LIKE ?";
if ($arrange == "price") {
    $query .= " ORDER BY sp_gia DESC";
}

$stmt = $connect->prepare($query);
$searchParam = "%" . $search . "%";
$stmt->bind_param("ss", $searchParam, $searchParam);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo '<div class="container text-center mt-4">
            <span id="error" style="color: red; font-size: 30px;">Không có sản phẩm nào có từ khóa: ' . htmlspecialchars($search) . '</span>
          </div>';
    exit();
}

$duongdanimg = $linkImgSp;
$dataArray = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="container mt-4">
    <div class="dropdown py-3">
        <a class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sắp Xếp
        </a>
        <div class="dropdown-content">
            <a class="menu-dropdown" id="menu-dr-price">Theo giá</a>
            <a class="menu-dropdown" id="menu-dr-reviews">Theo đánh giá</a>
        </div>
    </div>
    <script>
        var arrange = "<?php echo $arrange; ?>";
        var element;
        if (arrange === "price") {
            element = document.getElementById("menu-dr-price");
        } else if (arrange === "reviews") {
            element = document.getElementById("menu-dr-reviews");
        }
        if (element) {
            element.style.backgroundColor = "red";
        }

        document.getElementById("menu-dr-price").addEventListener("click", function() {
            window.location.href = "./list_search.php?search=<?= urlencode($search) ?>&page=1&arrange=price";
        });
    </script>
</div>

<div class="container text-center">
    <div class="row">
    <?php foreach ($dataArray as $data): ?>
    <div class="col-lg-3 col-md-4 col-sm-6 py-2">
        <div class="card">
            <a href="./product.php?sp_ma=<?= htmlspecialchars($data['product_id']) ?>">
                <img src="<?= htmlspecialchars($duongdanimg . $data['product_images']) ?>" class="card-img-top" alt="<?= htmlspecialchars($data['sp_ten']) ?>">
                <div class="card-body">
                    <p class="card-title"><strong><?= htmlspecialchars($data['product_name']) ?></strong></p>
                    <p class="card-text"><strong style="color:#f30; font-size:25px"><?= number_format($data['product_price'], 0, '.', '.') ?> <sup>đ</sup></strong></p>
                </div>
            </a>
            <div class="action-cart group-buttons d-flex align-items-center justify-content-center">
                
                <button class="cart-button btn-buy add_to_cart" title="Thêm vào giỏ">
                    <a id="buy" href="./product.php?sp_ma=<?= htmlspecialchars($data['sp_ma']) ?>">Thêm vào giỏ</a>
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
</div>

<div>
    <?php
    $sql = "SELECT COUNT(*) as total FROM product";
    $result = $connect->query($sql);
    $total = $result->fetch_assoc()['total'] ?? 0;
    $pagination = ceil($total / 20);
    $connect->close();
    ?>

    <nav aria-label="Page navigation">
        <ul class="pagination py-2 justify-content-center">
            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?search=<?= urlencode($search) ?>&page=<?= max(1, $page - 1) ?><?= $arrange ? '&arrange=' . $arrange : '' ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for ($i = 1; $i <= $pagination; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?search=<?= urlencode($search) ?>&page=<?= $i ?><?= $arrange ? '&arrange=' . $arrange : '' ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?= $page >= $pagination ? 'disabled' : '' ?>">
                <a class="page-link" href="?search=<?= urlencode($search) ?>&page=<?= min($pagination, $page + 1) ?><?= $arrange ? '&arrange=' . $arrange : '' ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
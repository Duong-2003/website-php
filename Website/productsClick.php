<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm theo loại</title>
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
            height: calc(133vh - 0px);
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 20px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                border: none;
                position: relative;
                height: auto;
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
            border: none; /* Sửa đổi border */
        }

        #buy {
            color: #fff;
        }

        .list-group-item {
            flex: 1; /* Đảm bảo các mục trong danh sách có chiều cao đồng đều */
        }
    </style>
</head>

<?php
include('../sources/FE/top_header.php');
include('../sources/FE/header.php');
include('../sources/FE/menu.php');
include('../sources/FE/nav.php');
?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 sidebar">
                <h5 class="text-center">Danh mục sản phẩm</h5>
                <ul class="list-group">
                    <li class="list-group-item"><a href="../website/List.php">Tất cả sản phẩm</a></li>
                    <li class="list-group-item"><a href="../website/productsClick.php?loaisanpham=but">Bút</a></li>
                    <li class="list-group-item"><a href="../website/productsClick.php?loaisanpham=hop">Hộp</a></li>
                    <li class="list-group-item"><a href="../website/productsClick.php?loaisanpham=biakep">Bìa kẹp</a></li>
                    <li class="list-group-item"><a href="../website/productsClick.php?loaisanpham=maytinh">Máy tính</a></li>
                    <li class="list-group-item"><a href="../website/productsClick.php?loaisanpham=nhandan">Nhãn dán</a></li>
                    <li class="list-group-item"><a href="../website/productsClick.php?loaisanpham=sotay">Sổ tay</a></li>
                    <li class="list-group-item"><a href="../website/productsClick.php?loaisanpham=vo">Vở</a></li>
                    <li class="list-group-item"><a href="?discount=true">Sản phẩm giảm giá</a></li>
                </ul>
                <hr>
                <h5 class="text-center">Sắp xếp theo giá</h5>
                <ul class="list-group">
                    <li class="list-group-item"><a href="?sort=price-asc&loaisanpham=<?= $_GET['loaisanpham'] ?? '' ?>">Giá thấp đến cao</a></li>
                    <li class="list-group-item"><a href="?sort=price-desc&loaisanpham=<?= $_GET['loaisanpham'] ?? '' ?>">Giá cao xuống thấp</a></li>
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
                                    include_once('../sources/connect.php');

                                    $valueCart = 9; // Số sản phẩm trên mỗi trang
                                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Trang hiện tại
                                    $offset = ($page - 1) * $valueCart; // Tính toán offset

                                    // Lấy loại sản phẩm từ URL
                                    $loaisanpham = $_GET['loaisanpham'] ?? ''; // Sửa đổi tên biến
                                    $whereClause = !empty($loaisanpham) ? "WHERE sp.loaisanpham = '$loaisanpham'" : "";

                                    // Kiểm tra nếu lọc theo sản phẩm giảm giá
                                    if (isset($_GET['discount']) && $_GET['discount'] == 'true') {
                                        $whereClause .= ($whereClause ? " AND " : "WHERE ") . "s.discount_percent > 0";
                                    }

                                    // Sắp xếp
                                    $sort = $_GET['sort'] ?? 'normal';
                                    $orderBy = '';
                                    if ($sort == 'price-asc') {
                                        $orderBy = 'ORDER BY sp.sp_gia ASC';
                                    } elseif ($sort == 'price-desc') {
                                        $orderBy = 'ORDER BY sp.sp_gia DESC';
                                    }

                                    // Truy vấn sản phẩm theo loại
                                    $sql = "SELECT sp.*, s.discount_percent 
                                            FROM sanpham sp 
                                            LEFT JOIN sales s ON sp.sp_ma = s.sp_ma AND s.is_expired = 1 
                                            $whereClause 
                                            $orderBy 
                                            LIMIT $offset, $valueCart"; // Thêm LIMIT để phân trang
                                    
                                    $result = $connect->query($sql);

                                    $duongdanimg = '../Assets/img/sanpham/'; // Đảm bảo đường dẫn này là chính xác

                                    if ($result && $result->num_rows > 0) {
                                        while ($data = $result->fetch_assoc()) {
                                            ?>
                                            <div class="col-lg-4 col-md-6 col-sm-9 py-2">
                                                <a href="./product.php?sp_ma=<?= $data['sp_ma'] ?>">
                                                    <div class="card">
                                                        <img src="<?= $duongdanimg . $data['sp_img'] ?>" class="card-img-top" alt="<?= $data['sp_ten'] ?>">
                                                        <div class="card-body">
                                                            <p class="card-title"><strong><?= $data['sp_ten'] ?></strong></p>
                                                            <?php if (!empty($data['discount_percent'])): 
                                                                $discountedPrice = $data['sp_gia'] * (1 - $data['discount_percent'] / 100); ?>
                                                                <p class="card-text">
                                                                    <strong style="color:#f30; font-size:25px"><?= number_format($discountedPrice, 0, '.', '.') ?> <sup>đ</sup></strong>
                                                                    <span style="text-decoration: line-through; color: #888;"><?= number_format($data['sp_gia'], 0, '.', '.') ?> <sup>đ</sup></span>
                                                                </p>
                                                            <?php else: ?>
                                                                <p class="card-text">
                                                                    <strong style="color:#f30; font-size:25px"><?= number_format($data['sp_gia'], 0, '.', '.') ?> <sup>đ</sup></strong>
                                                                </p>
                                                            <?php endif; ?>
                                                            <div class="action-cart group-buttons d-flex align-items-center justify-content-center">
                                                                <button class="cart-button btn-buy add_to_cart" title="Thêm vào giỏ">
                                                                    <a id="buy" href="./product.php?sp_ma=<?= $data['sp_ma'] ?>">Thêm vào giỏ</a>
                                                                </button>
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

                                    // $connect->close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    include('../sources/FE/product_generation.php');
    include('../sources/FE/footer_save.php');
    include('../sources/FE/footer.php');
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm mới nhất</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Light background for contrast */
            margin: 0;
            padding: 0;
        }

        .content a {
            text-decoration: none;
        }

        .product-list {
            margin: 3rem auto;
            padding: 2rem;
            max-width: 1200px; /* Center the content */
            background-color: #fff; /* White background for product list */
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px; /* Rounded corners */
            margin-bottom: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden; /* Ensure content doesn't overflow */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            width: 100%;
            height: 200px; /* Fixed height for uniformity */
            object-fit: cover; /* Maintain aspect ratio */
        }

        .card-body {
            padding: 1rem;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #333; /* Darker text for better contrast */
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
            color: #dc3545; /* Bootstrap danger color for price */
            margin: 0;
        }

        button.cart-button.btn-buy.add_to_cart {
            width: 100%;
            background: #DC2028;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 25px;
            color: #fff;
            font-size: 16px;
            border: none;
            transition: background 0.3s;
        }

        button.cart-button.btn-buy.add_to_cart:hover {
            background: #c81d24; /* Darker red on hover */
        }

        h2 {
            font-size: 30px;
            font-weight: 700;
            text-align: center;
            text-transform: uppercase;
            color: #494949;
            margin-bottom: 20px;
        }

        ul.tabs {
            list-style: none;
            padding: 0;
            text-align: center; /* Center tabs */
            margin-bottom: 20px;
        }

        ul.tabs li {
            display: inline-block;
            cursor: pointer;
            margin: 0 10px;
        }

        ul.tabs li span {
            background: transparent;
            padding: 10px 15px;
            border-radius: 50px;
            color: #000;
            font-size: 14px;
            transition: background 0.3s, color 0.3s;
        }

        ul.tabs li:hover span {
            background: #9C8350;
            color: #fff;
        }

        @media (max-width: 768px) {
            .card {
                margin: 10px 0; /* Reduce margin on smaller screens */
            }

            .product-list {
                padding: 1rem; /* Reduce padding */
            }
        }
    </style>
</head>

<body>
    <?php
    include('../sources/FE/top_header.php');
    include('../sources/FE/header.php');
    include('../sources/FE/menu.php');

    include_once("../sources/connect.php"); // Kết nối cơ sở dữ liệu

    // Định nghĩa đường dẫn hình ảnh
    $duongdanimg = '../Assets/img/sanpham/';
    
    // Lấy loại sản phẩm từ tham số URL
    $productType = isset($_GET['loaisanpham']) ? $_GET['loaisanpham'] : '';
    $valueCart = 6; // Số sản phẩm tối đa hiển thị
    $sql = "SELECT * FROM sanpham WHERE loaisanpham = '$productType' LIMIT $valueCart";
    $result = $connect->query($sql);
    ?>
    
    <div class="product-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="block-title clearfix">
                        <h2>Văn phòng phẩm cho bạn</h2>
                        <ul class="tabs tabs-title tab-desktop ajax clearfix">
                            <li class="tab-link has-content current">
                                <a href="../website/website.php"><span title="Tất cả sản phẩm">Tất cả sản phẩm</span></a>
                            </li>
                            <li class="tab-link" data-tab="tab-1">
                                <a href="../website/contentClick.php?loaisanpham=but"><span title="Bút">Bút</span></a>
                            </li>
                            <li class="tab-link" data-tab="tab-2">
                                <a href="../website/contentClick.php?loaisanpham=hop"><span title="Hộp">Hộp</span></a>
                            </li>
                            <li class="tab-link" data-tab="tab-3">
                                <a href="../website/contentClick.php?loaisanpham=biakep"><span title="Bìa kẹp">Bìa kẹp</span></a>
                            </li>
                            <li class="tab-link" data-tab="tab-4">
                                <a href="../website/contentClick.php?loaisanpham=maytinh"><span title="Máy tính">Máy tính</span></a>
                            </li>
                            <li class="tab-link" data-tab="tab-5">
                                <a href="../website/contentClick.php?loaisanpham=nhandan"><span title="Nhãn dán">Nhãn dán</span></a>
                            </li>
                            <li class="tab-link" data-tab="tab-6">
                                <a href="../website/contentClick.php?loaisanpham=sotay"><span title="Sổ tay">Sổ tay</span></a>
                            </li>
                            <li class="tab-link" data-tab="tab-7">
                                <a href="../website/contentClick.php?loaisanpham=vo"><span title="Vở">Vở</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <div class="row">
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($data = $result->fetch_assoc()) {
                        echo '<div class="col-lg-3 col-md-4 col-sm-6 py-2">';
                        echo '<a href="./product.php?sp_ma=' . $data['sp_ma'] . '">';
                        echo '<div class="card">';
                        echo '<img src="' . $duongdanimg . $data['sp_img'] . '" class="card-img-top" alt="' . $data['sp_ten'] . '">';
                        echo '<div class="card-body">';
                        echo '<p class="card-title">' . $data['sp_ten'] . '</p>';
                        echo '<p class="card-text">' . number_format($data['sp_gia'], 0, '.', ',') . ' <sup>đ</sup></p>';
                        echo '<div class="action-cart">';
                        echo '<button class="cart-button btn-buy add_to_cart" title="Thêm vào giỏ">Thêm vào giỏ</button>';
                        echo '</div></div></div></a></div>';
                    }
                } else {
                    echo '<p class="text-center">Không có sản phẩm nào</p>';
                }

                $connect->close(); // Đóng kết nối
                ?>
            </div>
        </div>

        <div class="text-center">
            <a class="btn btn-primary" href="./List.php?page=1">Xem thêm</a>
        </div>
    </div>

    <?php
    include('../sources/FE/footer_save.php');
    include('../sources/FE/footer.php');
    ?>
</body>
</html>
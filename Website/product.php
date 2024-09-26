<?php
ob_start(); // Bắt đầu bộ đệm đầu ra
session_start();
include_once('../sources/linkFIle.php'); // Bao gồm kết nối đến cơ sở dữ liệu

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit();
}

$username = $_SESSION['username']; // Get the username from session

include($linkFE . 'top_header.php');
include($linkFE . 'header.php');
include_once($linkconnWebsite);

if (isset($_GET['sp_ma']) && $_GET['sp_ma'] != '') {
    $id = intval($_GET['sp_ma']);
    $sql = "SELECT * FROM sanpham WHERE sp_ma = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $duongdanimg = $linkImgSp;
    $sp = $result->fetch_assoc();
    if (!$sp) {
        echo "ERROR: Không tìm thấy sản phẩm";
        exit();
    }
} else {
    echo "ERROR: Không nhận được id";
    exit();
}

// Handle order submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $soluong = intval($_POST['donhang_soluongsp']);
    $gia = $sp['sp_gia'] * $soluong;

    // Insert order into the database
    $sqlInsert = "INSERT INTO donhang (sp_ma, name, donhang_soluongsp, donhang_gia, timeorder, donhang_trangthai) 
                  VALUES (?, ?, ?, ?, NOW(), 'Đang chờ')";
    $stmt = $connect->prepare($sqlInsert);
    $stmt->bind_param("isii", $sp['sp_ma'], $username, $soluong, $gia);

    if ($stmt->execute()) {
        $notifi = "Đặt hàng thành công!";
        header("Location: ./cart.php?sp_ma=$id&notifi=" . urlencode($notifi));
        exit();
    } else {
        $error = "Có lỗi xảy ra, vui lòng thử lại.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Chi tiết sản phẩm</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .notifi>p {
            font-size: 20px;
            text-align: center;
            font-weight: 600;
        }

        #item {
            display: inline-block;
            height: 40px;
            line-height: 40px;
            color: #000;
            background: #cdd5dd;
            padding: 0 20px;
            font-weight: bold;
            font-size: 16px;
            border-right: solid 1px #fff;
        }

        #item-head {
            font-family: 'Cursive';
            color: #cf5a51;
            font-size: 28px;
        }

        button#btnModal {
            margin-left: 10px;
            background-color: #9c8350;
            color: #fff;
            border-color: #9c8350;
        }

        .modal-header {
            background-color: #9c8350;
            color: white;
        }

     

        
    </style>
</head>

<body>
    <div class="notifi">
        <p class="text-primary"><?= isset($notifi) ? $notifi : '' ?></p>
        <p class="text-danger"><?= isset($error) ? $error : '' ?></p>
    </div>

    <form method="post" action="">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-6 col-md-6  rounded shadow-sm p-4" style="background: linear-gradient(135deg, #f8f9fa, #e2e6ea);">
                    <img src="<?= $duongdanimg . $sp['sp_img'] ?>" width = "100%"  height = "100% " class="img-fluid rounded product-image">
             
                </div>
                <div class="col-lg-6 col-md-6 bg-light rounded shadow-sm p-4">
                    <h2 id="item-head"><?= htmlspecialchars($sp['sp_ten']) ?></h2>
                    <h4 class="text-secondary">Mã sản phẩm: <?= htmlspecialchars($sp['sp_ma']) ?></h4>
                    <strong class="text-danger" style="font-size: 25px;">
                        <?= number_format($sp['sp_gia'], 0, '.', ',') ?><sup>đ</sup>
                    </strong>
                    <hr>
                    <strong id="item">Tên loại sản phẩm: <?= htmlspecialchars($sp['loaisp_ten']) ?></strong>
                    <strong id="item">Số lượng còn lại: <?= $sp['sp_soluong'] > 0 ? $sp['sp_soluong'] : '<span class="text-danger">Hết hàng</span>' ?></strong>
                    <div class="input-group my-2">
                        <span class="input-group-text"><strong>Số lượng mua:</strong></span>
                        <input id='value_buy' name="donhang_soluongsp" type="number" max='<?= $sp['sp_soluong'] ?>' min='1' value="1" class="form-control">
                    </div>
                    <strong id="item">Chi tiết: <?= htmlspecialchars($sp['sp_motachitiet']) ?></strong>

                    <div class="text-center my-3" id='pay'>
                        <strong style="color:red">Giá: <?= number_format($sp['sp_gia'], 0, '.', ',') ?><sup>đ</sup></strong>
                    </div>

                    <script>
                        const inputElement = document.getElementById('value_buy');
                        const outputElement = document.getElementById('pay');
                        inputElement.addEventListener('change', function(event) {
                            const quantity = event.target.value;
                            const price = <?= $sp['sp_gia'] ?>;
                            const totalPrice = quantity * price;
                            outputElement.innerHTML = "<strong>Giá phải trả: </strong>" + totalPrice.toLocaleString('en-US') + "<sup>đ</sup>";
                        });
                    </script>

                    <div class="text-center">
                        <?php if ($sp['sp_soluong'] > 0) : ?>
                            <button id="btnModal" type="button" class="btn btn-lg btn-gray btn_buy btn-buy-now" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-cart-shopping"></i>Mua ngay
                            </button>
                        <?php endif; ?>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="modal-content">Bạn có chắc chắn mua?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        const contentModal = document.getElementById('modal-content');
                        document.getElementById('btnModal').addEventListener("click", function() {
                            const productName = "<?= htmlspecialchars($sp['sp_ten']) ?>";
                            const totalPrice = document.getElementById('value_buy').value * <?= $sp['sp_gia'] ?>;
                            contentModal.innerHTML = `Bạn có chắc chắn mua ${productName}<br>Giá: ${totalPrice.toLocaleString('en-US')} <sup>đ</sup>`;
                        });
                    </script>
                </div>
            </div>
        </div>
    </form>

    <?php
    include($linkFE . 'footer_save.php'); 
     include($linkFE . 'footer.php'); 
     ?>
</body>
</html>
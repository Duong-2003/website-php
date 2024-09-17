<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Product Detail</title>
    <?php include_once('../sources/linkFIle.php'); ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .notifi>p {
            font-size: 25px;
            text-align: center;
            font-weight: 600;
        }
        #item {
            display: inline-block;
            height: 40px;
            line-height: 40px;
            color: #fff;
            background: #65717d;
            padding: 0 20px;
            font-weight: bold;
            font-size: 16px;
            border-right: solid 1px #fff;
        }
        #item-head {
            font-family: cursive;
            color: #cf5a51;
            font-size: 35px;
        }
        button#btnModal {
            margin-left: 10px;
            background-color: #9c8350;
            color: #fff;
            border-color: #9c8350;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include($linkFE . 'top_header.php');
    include($linkFE . 'header.php');

    include_once($linkconnWebsite);
    if ($_GET['sp_ma'] != '') {
        $id = $_GET['sp_ma'];
        $sql = "SELECT * FROM sanpham WHERE sp_ma = $id";
        $result = $connect->query($sql);
        $duongdanimg = $linkImgSp;
        $sp = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (!$sp) {
            echo "ERROR: Không tìm thấy sản phẩm";
            exit();
        }
    } else {
        echo "ERROR: Không nhận được id";
        exit();
    }

    // Xử lý đơn hàng khi form được submit
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $soluong = $_POST['donhang_soluongsp'];
        $username = $_SESSION['username'];
        $gia = $sp['sp_gia'] * $soluong;

        // Thêm đơn hàng vào cơ sở dữ liệu
        $sqlInsert = "INSERT INTO donhang (sp_ma, name, donhang_soluongsp, donhang_gia, timeorder, donhang_trangthai) 
                      VALUES (?, ?, ?, ?, NOW(), 'Đang chờ')";
        $stmt = $connect->prepare($sqlInsert);
        $stmt->bind_param("isii", $sp['sp_ma'], $username, $soluong, $gia);

        if ($stmt->execute()) {
            $notifi = "Đặt hàng thành công!";
            header("Location: ./product.php?sp_ma=$id&notifi=" . urlencode($notifi));
            exit();
        } else {
            $error = "Có lỗi xảy ra, vui lòng thử lại.";
        }
    }
    ?>

    <div class="notifi">
        <p class="text-primary"><?= isset($notifi) ? $notifi : '' ?></p>
        <p class="text-danger"><?= isset($error) ? $error : '' ?></p>
    </div>

    <form method="post" action="">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-7 col-md-7 py-3">
                    <img src="<?= $duongdanimg . $sp['sp_img'] ?>" alt="" class="img-fluid rounded">
                </div>
                <div class="col-lg-5 col-md-5 bg-light rounded shadow-sm p-3">
                    <h2 id="item-head"><?= $sp['sp_ten'] ?></h2>
                    <h4 class="text-secondary">Mã sản phẩm: <?= $sp['sp_ma'] ?></h4>
                    <strong class="text-danger" style="font-size: 25px;">
                        <?= number_format($sp['sp_gia'], 0, '.', ',') ?><sup>đ</sup>
                    </strong>
                    <hr>
                    <strong id="item">Loại sản phẩm: <?= $sp['loaisp_ten'] ?></strong>
                    <strong id="item">Số lượng còn lại: <?= $sp['sp_soluong'] != 0 ? $sp['sp_soluong'] : '<span class="text-danger">Hết hàng</span>' ?></strong>
                    <div class="input-group my-2">
                        <span class="input-group-text"><strong>Số lượng mua:</strong></span>
                        <input id='value_buy' name="donhang_soluongsp" type="number" max='<?= $sp['sp_soluong'] ?>' min='1' value="1" class="form-control">
                    </div>
                    <strong id="item">Chi tiết: <?= $sp['sp_motachitiet'] ?></strong>

                    <div class="text-center my-3" id='pay'>
                        <strong>Giá phải trả: <?= number_format($sp['sp_gia'], 0, '.', ',') ?><sup>đ</sup></strong>
                    </div>

                    <script>
                        const inputElement = document.getElementById('value_buy');
                        const outputElement = document.getElementById('pay');
                        let valuepay;

                        inputElement.addEventListener('change', function(event) {
                            valuepay = event.target.value * <?= $sp['sp_gia'] ?>;
                            valuepay = valuepay.toLocaleString('en-US');
                            outputElement.innerHTML = "<strong>Giá phải trả: </strong>" + valuepay + "<sup>đ</sup>";
                        });
                    </script>

                    <div class="text-center">
                        <?php if ($sp['sp_soluong'] != 0) : ?>
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
                        const buttonModal = document.getElementById('btnModal');
                        buttonModal.addEventListener("click", function() {
                            const textNameProduct = "<?= $sp['sp_ten'] ?>";
                            const textGia = valuepay === undefined ? "<?= number_format($sp['sp_gia'], 0, '.', ',') ?>" : valuepay;
                            contentModal.innerHTML = `Bạn có chắc chắn mua ${textNameProduct}<br>Giá: ${textGia} <sup>đ</sup>`;
                        });
                    </script>
                </div>
            </div>
        </div>
    </form>

    <?php include($linkFE . 'footer.php'); ?>
</body>
</html>
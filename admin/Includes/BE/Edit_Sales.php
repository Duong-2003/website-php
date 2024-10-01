<?php
// Kết nối cơ sở dữ liệu
include('../Includes/conn/connect.php');

// Xử lý kiểm tra giảm giá và thêm giảm giá
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['check_discount'])) {
        $sp_ma = $_POST['sp_ma'];

        // Lấy thông tin sản phẩm
        $sqlProduct = "SELECT sp_gia, sp_ten FROM sanpham WHERE sp_ma = ?";
        $stmtProduct = $connect->prepare($sqlProduct);
        $stmtProduct->bind_param("i", $sp_ma);
        $stmtProduct->execute();
        $resultProduct = $stmtProduct->get_result();
        $product = $resultProduct->fetch_assoc();

        if ($product) {
            $original_price = $product['sp_gia'];
            $product_name = $product['sp_ten'];

            // Kiểm tra giảm giá
            $sqlSale = "SELECT discount_percent FROM sales WHERE sp_ma = ? AND is_expired = 0";
            $stmtSale = $connect->prepare($sqlSale);
            $stmtSale->bind_param("i", $sp_ma);
            $stmtSale->execute();
            $resultSale = $stmtSale->get_result();

            if ($resultSale->num_rows > 0) {
                $sale = $resultSale->fetch_assoc();
                $discount_percent = $sale['discount_percent'];
                $discount_amount = ($original_price * $discount_percent) / 100;
                $discounted_price = $original_price - $discount_amount;

                echo "<div class='alert alert-success'>Sản phẩm có giảm giá!<br>Giá gốc: " . number_format($original_price, 2) . " VNĐ<br>Giá sau giảm: " . number_format($discounted_price, 2) . " VNĐ</div>";
            } else {
                echo "<div class='alert alert-warning'>Sản phẩm không có giảm giá.</div>";
                // Hiển thị form thêm giảm giá
                echo "
                <form method='POST' action=''>
                    <h5 class='mt-3'>Thêm Giảm Giá Cho Sản Phẩm: $product_name</h5>
                    <div class='mb-3'>
                        <label for='discount_percent' class='form-label'>Phần trăm giảm giá (%)</label>
                        <input type='number' name='discount_percent' class='form-control' required min='0' max='100'>
                    </div>
                    <div class='mb-3'>
                        <label for='start_date' class='form-label'>Ngày bắt đầu</label>
                        <input type='date' name='start_date' class='form-control' required>
                    </div>
                    <div class='mb-3'>
                        <label for='end_date' class='form-label'>Ngày kết thúc</label>
                        <input type='date' name='end_date' class='form-control' required>
                    </div>
                    <input type='hidden' name='sp_ma' value='$sp_ma'>
                    <button type='submit' name='add_discount' class='btn btn-success'>Thêm Giảm Giá</button>
                </form>
                ";
            }
        } else {
            echo "<div class='alert alert-danger'>Sản phẩm không tồn tại.</div>";
        }
    } elseif (isset($_POST['add_discount'])) {
        // Thêm giảm giá vào bảng sales
        $sp_ma = $_POST['sp_ma'];
        $discount_percent = $_POST['discount_percent'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $sqlInsertSale = "INSERT INTO sales (sp_ma, discount_percent, start_date, end_date, is_expired) VALUES (?, ?, ?, ?, 0)";
        $stmtInsertSale = $connect->prepare($sqlInsertSale);
        $stmtInsertSale->bind_param("idss", $sp_ma, $discount_percent, $start_date, $end_date);

        if ($stmtInsertSale->execute()) {
            echo "<div class='alert alert-success'>Thêm giảm giá thành công cho sản phẩm: $sp_ma</div>";
        } else {
            echo "<div class='alert alert-danger'>Lỗi: " . $stmtInsertSale->error . "</div>";
        }
    }
}
?>
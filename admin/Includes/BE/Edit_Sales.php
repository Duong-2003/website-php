<?php
include('../conn/connect.php');

// Kiểm tra xem có dữ liệu từ form không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $sale_id = $_POST['sale_id'];
    $sp_ma = $_POST['sp_ma'];
    $discount_percent = $_POST['discount_percent'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $sale_description = $_POST['sale_description'];
    $is_expired = isset($_POST['is_expired']) ? 1 : 0;

    // Kiểm tra dữ liệu
    if (empty($sp_ma) || $discount_percent < 0 || $discount_percent > 100) {
        echo "<div class='alert alert-danger'>Dữ liệu không hợp lệ. Vui lòng kiểm tra lại.</div>";
        exit;
    }

    // Cập nhật thông tin giảm giá vào cơ sở dữ liệu
    $sql = "UPDATE sales SET sp_ma = ?, discount_percent = ?, start_date = ?, end_date = ?, sale_description = ?, is_expired = ? WHERE sale_id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sissssi", $sp_ma, $discount_percent, $start_date, $end_date, $sale_description, $is_expired, $sale_id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Cập nhật giảm giá thành công!</div>";
        // Chuyển hướng về trang danh sách giảm giá sau 2 giây
        header("refresh:2; url=../../Pages/ListSales.php");
    } else {
        echo "<div class='alert alert-danger'>Cập nhật không thành công. Vui lòng thử lại sau.</div>";
    }

    $stmt->close();
} else {
    echo "<div class='alert alert-danger'>Yêu cầu không hợp lệ.</div>";
}

$connect->close();
?>
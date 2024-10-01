<?php
// Kết nối cơ sở dữ liệu
include('../conn/connect.php');

// Kiểm tra kết nối
if ($connect->connect_error) {
    die("Kết nối không thành công: " . $connect->connect_error);
}

// Xử lý thêm sản phẩm giảm giá
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_sale'])) {
    // Lấy dữ liệu từ biểu mẫu
    $sp_ma = $_POST['sp_ma'];
    $discount_percent = $_POST['discount_percent'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $sale_description = $_POST['sale_description'];

    // Kiểm tra dữ liệu
    if (empty($sp_ma) || empty($discount_percent) || empty($start_date) || empty($end_date)) {
        echo "<script>alert('Vui lòng điền đầy đủ thông tin!'); window.history.back();</script>";
        exit;
    }

    // Kiểm tra xem sản phẩm đã hết hạn chưa
    $is_expired = (new DateTime($end_date) < new DateTime()) ? 1 : 0;

    // Thêm sản phẩm giảm giá vào cơ sở dữ liệu
    $sql = "INSERT INTO sales (sp_ma, discount_percent, start_date, end_date, sale_description, is_expired) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);

    // Kiểm tra xem statement có được chuẩn bị thành công không
    if (!$stmt) {
        echo "<script>alert('Lỗi chuẩn bị câu lệnh: " . $connect->error . "');</script>";
        exit;
    }

    // Chuyển đổi kiểu dữ liệu phù hợp
    $stmt->bind_param("idsssi", $sp_ma, $discount_percent, $start_date, $end_date, $sale_description, $is_expired);
    
    if ($stmt->execute()) {
        echo "<script>alert('Thêm giảm giá thành công!'); window.location.href='../Pages/ListSales.php';</script>";
    } else {
        echo "<script>alert('Lỗi: " . $stmt->error . "');</script>";
    }

    // Đóng statement
    $stmt->close();
}

// Đóng kết nối
$connect->close();
?>
<?php
include('../linkFIle.php');
include($linkconnSources);
session_start();

if (isset($_POST['submit']) && !empty($_POST['donhang_soluongsp']) && !empty($_POST['sp_ma'])) {
    
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!isset($_SESSION['username'])) {
        $connect->close();
        $error = 'Vui lòng đăng nhập để đặt hàng';
        header("Location: " . $linkWebsite . "login.php?error=" . urlencode($error));
        exit();
    }

    $sp_ma = $_POST['sp_ma'];
    $nameuser = $_SESSION['username'];
    $donhang_soluongsp = $_POST['donhang_soluongsp'];

    // Sử dụng Prepared Statements để tránh SQL Injection
    $sql = "SELECT * FROM sanpham WHERE sp_ma = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $sp_ma);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $sp = $result->fetch_assoc();
        $sanpham_gia = $sp['sp_gia'];
        $donhang_gia = $donhang_soluongsp * $sanpham_gia;

        // Thêm đơn hàng
        $query = "INSERT INTO donhang (sp_ma, name, timeorder, donhang_gia, donhang_soluongsp, donhang_trangthai) VALUES (?, ?, NOW(), ?, ?, ?)";
        $stmt = $connect->prepare($query);
        $trangthai = 'Chờ xác nhận';
        $stmt->bind_param("isiss", $sp_ma, $nameuser, $donhang_gia, $donhang_soluongsp, $trangthai);

        if ($stmt->execute()) {
            // Cập nhật số lượng sản phẩm
            $query = "UPDATE sanpham SET sp_soluong = sp_soluong - ? WHERE sp_ma = ?";
            $updateStmt = $connect->prepare($query);
            $updateStmt->bind_param("ii", $donhang_soluongsp, $sp_ma);
            $updateStmt->execute();
            $updateStmt->close();

            // Chuyển hướng với thông báo thành công
            $notifi = "Đặt hàng thành công";
            header("Location: " . $linkWebsite . "product.php?notifi=" . urlencode($notifi) . "&sp_ma=" . $sp_ma);
            exit();
        } else {
            // Xử lý lỗi khi thêm đơn hàng
            $error = 'Lỗi đặt hàng: ' . $stmt->error;
            header("Location: " . $linkWebsite . "product.php?error=" . urlencode($error) . "&sp_ma=" . $sp_ma);
            exit();
        }
    } else {
        // Sản phẩm không tồn tại
        $error = "Không có sản phẩm";
        header("Location: " . $linkWebsite . "product.php?error=" . urlencode($error) . "&sp_ma=" . $sp_ma);
        exit();
    }

    $stmt->close();
} else {
    // Xử lý trường hợp không có dữ liệu đầu vào
    echo "Input error: Vui lòng kiểm tra thông tin nhập vào.";
}

$connect->close();
?>
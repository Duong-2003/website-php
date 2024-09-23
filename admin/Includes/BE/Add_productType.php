<?php
include("../linkAdmin.php");
include('../connect.php');
session_start();
ob_start();

if (isset($_POST['submit']) && !empty($_POST['loaisp']) && !empty($_POST['loaisanpham'])) {
    $loaisp = $_POST['loaisp'];
    $loaisanpham = $_POST['loaisanpham'];

    // Sử dụng Prepared Statement để kiểm tra loại sản phẩm đã tồn tại
    $stmt = $connect->prepare("SELECT * FROM loaisp WHERE loaisp_ten = ? AND loaisanpham = ?");
    $stmt->bind_param("ss", $loaisp, $loaisanpham);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $stmt->close();
        $connect->close();
        echo "Lỗi: Giá trị đã tồn tại trong cơ sở dữ liệu.";
        exit();
    }

    // Thêm loại sản phẩm mới vào cơ sở dữ liệu
    $stmt = $connect->prepare("INSERT INTO loaisp (loaisp_ten, loaisanpham) VALUES (?, ?)");
    $stmt->bind_param("ss", $loaisp, $loaisanpham);
    
    if ($stmt->execute()) {
        header("Location: " . $linkPages . "ListProductType.php?notifi=Thêm loại sản phẩm thành công!");
        exit();
    } else {
        echo "Lỗi không thêm được loại sản phẩm: " . $stmt->error;
    }

    $stmt->close();
    $connect->close();
} else {
    echo "Chưa nhập toàn bộ thông tin.";
    exit(); 
}
?>
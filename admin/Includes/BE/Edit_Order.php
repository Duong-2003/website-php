<?php
include("../linkAdmin.php");
include($linkconnIncludes);
session_start();
ob_start();

if (isset($_POST['submit']) && !empty($_POST['donhang_ma'])) {
    $newStatus = $_POST['donhang_trangthai'];
    $newPrice = $_POST['donhang_gia'];
    $statusOther = $_POST['status_input'];
    $id = $_POST['donhang_ma'];

    // Xử lý giá trị tiền
    if (is_string($newPrice)) {
        $newPrice = (float) str_replace(',', '', $newPrice);
    }

    // Tạo truy vấn
    if ($newStatus !== 'Khác' && !empty($newStatus)) {
        $query = "UPDATE donhang 
                  SET donhang_trangthai = '$newStatus', donhang_gia = '$newPrice'
                  WHERE donhang_ma = '$id'";
    } else {
        $query = "UPDATE donhang 
                  SET donhang_trangthai = '$statusOther', donhang_gia = '$newPrice'
                  WHERE donhang_ma = '$id'";
    }

    // Thực thi truy vấn
    if ($connect->query($query) === TRUE) {
        $connect->close();
        header("Location: " . $linkPages . "ListOrder.php?notifi=Sửa thành công");
    } else {
        $connect->close();
        $error = "&&error=Lỗi không sửa được đơn hàng: " . $connect->error;
        header("Location: " . $linkPages . "ListOrder.php?datakey=" . $id . $error);
    }
} else {
    $connect->close();
    $error = "&&error=Chưa nhập toàn bộ thông tin.";
    header("Location: " . $linkPages . "Edit_Order.php?datakey=" . $id . $error);
}
?>
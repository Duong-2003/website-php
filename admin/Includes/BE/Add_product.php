<?php
include("../linkAdmin.php");
include($linkconnIncludes);
include('./CheckImg.php');
session_start();
ob_start();

if (isset($_POST['submit']) && $_FILES['sp_img'] != null && $_POST['sp_motachitiet'] != '' && $_POST['sp_ten'] != '' && $_POST['sp_gia'] != '' && $_POST['sp_soluong'] != '') {
    $name = $_POST['sp_ten'];
    
    // Xử lý giá
    $price = $_POST['sp_gia'];
    $price = str_replace(',', '', $price); // Loại bỏ dấu phẩy
    $price = (float) $price; // Chuyển thành số thực

    $describe = $_POST['sp_mota'];
    $describeDetail = $_POST['sp_motachitiet'];
    $quantity = $_POST['sp_soluong'];
    $typename = $_POST['productTypeName'];
    $type = $_POST['productType'];
    $img = basename($_FILES['sp_img']['name']);

    $target_img = '../../../Assets/img/SanPham/' . $img;
    $error = '';

    // Tạo câu truy vấn
    if ($describe != '') {
        $query = "INSERT INTO sanpham (sp_ten, sp_gia, sp_mota, sp_motachitiet, sp_soluong, loaisp_ten, loaisanpham, sp_img) 
        VALUES ('$name', '$price', '$describe', '$describeDetail', '$quantity', '$typename', '$type', '$img')";
    } else {
        $query = "INSERT INTO sanpham (sp_ten, sp_gia, sp_mota, sp_motachitiet, sp_soluong, loaisp_ten, loaisanpham, sp_img) 
        VALUES ('$name', '$price', NULL, '$describeDetail', '$quantity', '$typename', '$type', '$img')";
    }

    // Kiểm tra nếu hình ảnh đã tồn tại
    if (!IsAlreadyExists($target_img)) {
        if (move_uploaded_file($_FILES['sp_img']['tmp_name'], $target_img)) {
            $error = "?error=Lỗi không di chuyển ảnh đến Assets.";
            header("location:" . $linkPages . "ListProduct.php" . $error);
            exit(); // Dừng thực thi sau khi redirect
        }
    }

    // Thực hiện truy vấn
    if ($connect->query($query) === TRUE) {
        $connect->close();
        header("location:" . $linkPages . "ListProduct.php?notifi=Thêm thành công");
        exit(); // Dừng thực thi sau khi redirect
    } else {
        $connect->close();
        $error = "?error=Lỗi không thêm được sản phẩm: " . $connect->error;
        header("location:" . $linkPages . "ListProduct.php" . $error);
        exit(); // Dừng thực thi sau khi redirect
    }
}
?>
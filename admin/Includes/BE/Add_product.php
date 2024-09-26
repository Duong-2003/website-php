<?php
include('../conn/connect.php');
include('./CheckImg.php');
session_start();
ob_start();


if (isset($_POST['submit']) && $_FILES['sp_img'] != null && $_POST['sp_motachitiet'] != '' && $_POST['sp_ten'] != '' && $_POST['sp_gia'] != '' && $_POST['sp_soluong'] != '') {
    $name = $_POST['sp_ten'];
    $price = $_POST['sp_gia'];
    $describe = $_POST['sp_mota'];
    $describeDetail = $_POST['sp_motachitiet'];
    $quantity = $_POST['sp_soluong'];
    $typename = $_POST['productTypeName'];
    $type = $_POST['productType'];
    $img = basename($_FILES['sp_img']['name']);

    $target_img = '../../../Assets/img/SanPham/' . $img;
    $error = '';

    // Chuyển đổi giá tiền từ định dạng có dấu phẩy sang số thực
    if (is_string($price)) {
        $price = (float) str_replace(',', '', $price);
    }

    // Tạo câu truy vấn SQL
    if ($describe != '') {
        $query = "INSERT INTO sanpham (sp_ten, sp_gia, sp_mota, sp_motachitiet, sp_soluong, loaisp_ten, loaisanpham, sp_img) 
                  VALUES ('$name', '$price', '$describe', '$describeDetail', '$quantity', '$typename', '$type', '$img')";
    } else {
        $query = "INSERT INTO sanpham (sp_ten, sp_gia, sp_mota, sp_motachitiet, sp_soluong, loaisp_ten, loaisanpham) 
                  VALUES ('$name', '$price', NULL, '$describeDetail', '$quantity', '$typename', '$type')";
    }

    // Kiểm tra xem ảnh đã tồn tại chưa
    if (!IsAlreadyExists($target_img)) {
        if (move_uploaded_file($_FILES['sp_img']['tmp_name'], $target_img)) {
            // Chuyển hướng nếu không di chuyển được ảnh
            $error = "?error=Lỗi không di chuyển ảnh đến Assets.";
            header("location:../../Pages/ListProduct.php" . $error);
            exit();
        }
    }

    // Thực hiện truy vấn và kiểm tra kết quả
    if ($connect->query($query) === TRUE) {
        $connect->close();
        header("location:../../Pages/ListProduct.php?notifi=Thêm thành công");
        exit();
    } else {
        $connect->close();
        $error = "?error=Lỗi không thêm được sản phẩm: " . $connect->error;
        header("location:../../Pages/ListProduct.php" . $error);
        exit();
    }
} else {
    // Xử lý trường hợp không đủ thông tin
    $error = "?error=Vui lòng điền đầy đủ thông tin.";
    header("location:../../Pages/ListProduct.php" . $error);
    exit();
}
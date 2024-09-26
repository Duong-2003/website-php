<?php
include('../conn/connect.php');
include('./CheckImg.php');
session_start();
ob_start();

if (isset($_POST['submit']) && !empty($_POST['sp_ma'])) {
    $name = $_POST['sp_ten'];
    $price = $_POST['sp_gia'];
    $describe = (trim($_POST['sp_mota']) !== '') ? $_POST['sp_mota'] : null;
    $describeDetail = $_POST['sp_motachitiet'];
    $quantity = $_POST['sp_soluong'];
    $typename = $_POST['productTypeName'];
    $type = $_POST['productType'];
    $img = basename($_FILES['sp_img']['name']);
    $ma = $_POST['sp_ma'];

    $target_img = '../../../Assets/img/SanPham/' . $img; // Đảm bảo đường dẫn chính xác
    $error = '';

    // Kiểm tra và di chuyển tệp ảnh nếu có
    if (!empty($img)) {
        if (IsExceedingFileNameSize($img)) {
            $error = "?error=Tên ảnh quá dài không thể lưu trữ";
            header("location:../../Includes/BE/Edit_product.php?datakey=" . $ma . $error);
            exit();
        }

        if (!move_uploaded_file($_FILES['sp_img']['tmp_name'], $target_img)) {
            $error = "?error=Lỗi không di chuyển ảnh đến Assets";
            header("location:../../Includes/BE/Edit_product.php?datakey=" . $ma . $error);
            exit();
        }
    }

    // Chuyển đổi giá tiền từ định dạng có dấu phẩy sang số thực
    if (is_string($price)) {
        $price = (float) str_replace(',', '', $price);
    }

    // Tạo câu truy vấn SQL
    $query = "UPDATE sanpham SET 
                sp_ten = '$name', 
                sp_gia = '$price', 
                sp_mota = '$describe', 
                sp_motachitiet = '$describeDetail', 
                sp_soluong = '$quantity', 
                loaisanpham = '$type', 
                loaisp_ten = '$typename'";

    // Chỉ cập nhật hình ảnh nếu có
    if (!empty($img)) {
        $query .= ", sp_img = '$img'";
    }

    $query .= " WHERE sp_ma = $ma";

    // Thực hiện truy vấn và kiểm tra kết quả
    if ($connect->query($query) === TRUE) {
        $connect->close();
        header("location:../../Pages/ListProduct.php?notifi=Sửa thành công");
        exit();
    } else {
        $error = "?error=Lỗi không sửa được sản phẩm: " . $connect->error;
        header("location:../../Includes/BE/Edit_product.php?datakey=" . $ma . $error);
        exit();
    }
} else {
    $error = "?error=Chưa nhập toàn bộ thông tin";
    header("location:../../Includes/BE/Edit_product.php?datakey=" . $_POST['sp_ma'] . $error);
    exit();
}
?>
<?php
include("../linkAdmin.php");
include($linkconnIncludes);
include('./CheckImg.php');
session_start();
ob_start();
if (isset($_POST['submit']) && $_POST['sp_ma'] != '') {
    $name = $_POST['sp_ten'];
    $price = $_POST['sp_gia'];
    $describe = (trim($_POST['sp_mota']) !== '') ? $_POST['sp_mota'] : null;
    $describeDetail = $_POST['sp_motachitiet'];
    $quantity = $_POST['sp_soluong'];
    $typename = $_POST['productTypeName'];
    $type = $_POST['productType'];
    $img = basename($_FILES['sp_img']['name']);
    $ma = $_POST['sp_ma'];

    $target_img = '../../../Assets/img/SanPham/' . $img;
    $error = '';
    if (!IsAlreadyExists($target_img) && $img != '') {
        if(IsExceedingFileNameSize($img)){
            $error = "?error=Tên ảnh quá dài không thể lưu trữ";
            header("location:" . $linkPages . "Edit_product.php?datakey=" . $_POST['sp_ma'] . $error);
        }
        if (!move_uploaded_file($_FILES['sp_img']['tmp_name'], $target_img)) {
            $error = "?error=Lỗi không di chuyển ảnh đến Assets";
            header("location:" . $linkPages . "Edit_product.php?datakey=" . $_POST['sp_ma'] . $error);
        }
    }
    if (is_string($price)) {
        $price = (float) str_replace(',', '', $price);
    }
    $query = "UPDATE sanpham 
                SET sp_ten='$name', sp_gia='$price',sp_mota ='$describe',sp_motachitiet ='$describeDetail',sp_soluong='$quantity',loaisp_ten='$typename',loaisp_ten='$type'sp_img='$img'  
                WHERE sp_ma=$ma";
    if ($img != '') {
        $query = "UPDATE sanpham 
                SET sp_ten='$name', sp_gia='$price',sp_mota ='$describe',sp_motachitiet ='$describeDetail',sp_soluong='$quantity',loaisp_ten='$typename',loaisp_ten='$type'sp_img='$img'  
                WHERE sp_ma=$ma";
    } else {
        $query = "UPDATE sanpham 
                SET sp_ten='$name', sp_gia='$price',sp_mota ='$describe',sp_motachitiet ='$describeDetail',sp_soluong='$quantity',loaisp_ten='$typename',loaisp_ten='$type'  
                WHERE sp_ma=$ma";
    }
    if ($connect->query($query) === TRUE) {
        $connect->close();
        header("location:" . $linkPages . "ListProduct.php?notifi = Sửa thành công");
    } else {
        $connect->rollback();
        $error = "&&error=Lỗi không sửa được sản phẩm ." . $connect->error;
        header("location:" . $linkPages . "Edit_product.php?datakey=" . $_POST['sp_ma'] . $error);
    }
} else {
    $connect->close();
    $error = "&&error=Chưa nhập toàn bộ ";
    header("location:" . $linkPages . "Edit_product.php?datakey=" . $_POST['sp_ma'] . $error);
}

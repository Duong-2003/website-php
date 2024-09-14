<?php
include("../linkAdmin.php");
include($linkconnIncludes);
include('./CheckImg.php');
session_start();
ob_start();
if (isset($_POST['submit']) && $_FILES['sp_img'] != null && $_POST['sp_motachitiet'] != '' && $_POST['sp_ten'] != '' && $_POST['sp_gia'] != '' && $_POST['sp_soluong'] != '') {
    $name = $_POST['sp_ten'];
    $price = $_POST['sp_gia'];
    $describe = $_POST['sp_mota'];
    $describeDetail = $_POST['sp_motachitiet'];
    $quantity = $_POST['sp_soluong'];
    $type = $_POST['productType'];
    $img = basename($_FILES['sp_img']['name']);

    $target_img = '../../../Assets/img/SanPham/'.$img ;
    $error ='';
    if (is_string($price)) {
        $price = (float) str_replace(',', '', $price);
    }
    if ($describe != '') {
        $query = "INSERT INTO sanpham (sp_ten, sp_gia, sp_mota,sp_motachitiet, sp_soluong,loaisp_ten,sp_img) 
        VALUES ('$name', '$price','$describe','$describeDetail','$quantity','$type','$img')";
    } else {
        $query = "INSERT INTO sanpham (sp_ten, sp_gia, sp_mota,sp_motachitiet, sp_soluong,loaisp_ten,sp_img) 
        VALUES ('$name', '$price',NULL,'$describeDetail','$quantity','$type','$img')";
    }
    if(!IsAlreadyExists($target_img)){
        if(move_uploaded_file($_FILES['sp_img']['tmp_name'],$target_img)){
            $error ="?error=Lỗi không di chuyển ảnh đến Assets.";
            header("location:" . $linkPages . "ListProduct.php".$error);
        }
    }
    if ($connect->query($query) === TRUE) {
        $connect->close();
        header("location:" . $linkPages . "ListProduct.php?notifi=Thêm thành công");
    } else {
        $connect->close();
        $error ="?error=Lỗi không thêm được sản phẩm ." . $connect->error;
        header("location:" . $linkPages . "ListProduct.php".$error);
    }
    
} else {
  
}



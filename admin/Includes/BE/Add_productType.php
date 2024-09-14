<?php
include("../linkAdmin.php");
include('../connect.php');
session_start();
ob_start();
if(isset($_POST['submit']) && $_POST['loaisp'] != ''){
    $type = $_POST['loaisp'];

    $queryCheck = "SELECT * FROM loaisp WHERE loaisp_ten = '$type'";
    if ($connect->query($queryCheck)->num_rows > 0) {
        $connect->close();  
        echo "Lỗi: Giá trị đã tồn tại trong cơ sở dữ liệu.";
        exit();
    }
    $queryAdd = "INSERT INTO loaisp (loaisp_ten) VALUES ('$type')";
    
    if ($connect->query($queryAdd) === TRUE) {
        header("location:".$linkPages."ListProductType.php");
    }else {
        echo "Lỗi không thêm được sản phẩm: " . $connect->error;
    }
    $connect->close();
}
else{
    $connect->close();
    // header("location:./adminIndex.php");
    echo ("chưa nhập toàn bộ ");
    exit(); 
}
?>
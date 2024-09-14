<?php
include('../linkFile.php');
session_start();
session_destroy(); // Xóa phiên đăng nhập
header('Location:'.$linkWebsite.'website.php'); // Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính
exit;
?>
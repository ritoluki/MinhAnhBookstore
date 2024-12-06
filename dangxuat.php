<?php
session_start(); // Khởi động phiên

$_SESSION["ma"] = null; // Đặt phiên 'ma' thành null
$_SESSION["manv"] = null; // Đặt phiên 'manv' thành null

session_destroy(); 

// Chuyển hướng về trang đăng nhập
header("Location: dangnhap.php");
exit(); // Đảm bảo không có mã nào khác được thực thi sau khi điều hướng
?>

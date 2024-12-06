<?php
session_start();
require_once("classsach.php");
require_once("classdanhgia.php");

// Lấy ngày hiện tại
$time = date("Y-m-d");

// Lấy các tham số từ URL, nếu có
$masach = isset($_GET['masach']) ? $_GET['masach'] : '';
$makh = isset($_GET['makh']) ? $_GET['makh'] : '';
$diemdanhgia = isset($_GET['diemdanhgia']) ? intval($_GET['diemdanhgia']) : '';
$noidung = isset($_GET['noidung']) ? ($_GET['noidung']) : '';

// Thêm đánh giá
$review = Danhgia::AddReview($masach, $makh, $diemdanhgia, $noidung, $time);
$sach = sach::Get($masach);  // Nếu phương thức trả về đối tượng duy nhất

// Quay lại trang trước đó
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>

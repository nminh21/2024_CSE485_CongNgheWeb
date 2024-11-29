<?php
session_start();

// Kiểm tra nếu có index được gửi đến
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    
    // Kiểm tra index có hợp lệ không
    if (isset($_SESSION['products'][$index])) {
        // Xóa sản phẩm tại vị trí index
        array_splice($_SESSION['products'], $index, 1);
    }
}

// Chuyển hướng về trang danh sách
header("Location: index.php");
exit();
?>
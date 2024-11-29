<?php
$servername = "localhost"; // Địa chỉ máy chủ
$username = "root"; // Tên người dùng mặc định là root
$password = ""; // Mật khẩu mặc định là trống
$dbname = "flower_db"; // Tên cơ sở dữ liệu mà bạn đã tạo

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công!";
?>
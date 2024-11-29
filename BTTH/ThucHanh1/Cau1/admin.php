<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

// Kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Địa chỉ máy chủ
$username = "root"; // Tên người dùng
$password = ""; // Mật khẩu
$dbname = "flower_db"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy danh sách hoa từ cơ sở dữ liệu
$result = $conn->query("SELECT * FROM flowers");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh sách hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-custom {
            width: 100px; /* Đặt chiều rộng cố định cho nút */
            font-size: 14px; /* Thay đổi kích thước chữ */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Quản lý danh sách hoa</h1>
        <div class="text-end mb-4">
            <a href="add.php" class="btn btn-success">Thêm hoa mới</a>
            <a href="logout.php" class="btn btn-danger">Đăng xuất</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Tên hoa</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($flower = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($flower['name']); ?></td>
                    <td><?php echo htmlspecialchars($flower['description']); ?></td>
                    <td ><img src="<?php echo htmlspecialchars($flower['image']); ?>" alt="<?php echo htmlspecialchars($flower['name']); ?>" style="width: 100px;"></td>
                    <td>
                        <a href="edit.php?id=<?php echo $flower['id']; ?>" class="btn btn-primary btn-custom">Chỉnh sửa</a>
                        <a href="delete.php?id=<?php echo $flower['id']; ?>" class="btn btn-danger btn-custom" onclick="return confirm('Bạn có chắc chắn muốn xóa hoa này không?');">Xóa</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$conn->close(); // Đóng kết nối
?>
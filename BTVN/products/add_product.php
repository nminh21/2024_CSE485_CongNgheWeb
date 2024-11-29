<?php
session_start();

// Khởi tạo mảng products trong session nếu chưa có
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['name' => 'Sản phẩm 1', 'price' => '1000'],
        ['name' => 'Sản phẩm 2', 'price' => '2000'],
        ['name' => 'Sản phẩm 3', 'price' => '3000'],
    ];
}

// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    
    // Thêm sản phẩm mới vào mảng
    $_SESSION['products'][] = [
        'name' => $name,
        'price' => $price
    ];
    
    // Chuyển hướng về trang danh sách
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icon/bootstrap-icons.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Administration</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Trang ngoài</a></li>
                        <li class="nav-item"><a class="nav-link active" href="#">Thể loại</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Tác giả</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Bài viết</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
        <h2 class="text-center mb-4">Thêm sản phẩm mới</h2>

        <form method="POST" class="w-50 mx-auto">
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá sản phẩm:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                <a href="index.php" class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </main>

    <footer class="d-flex justify-content-center align-items-center py-3 my-4 border-top">
        <h3>TLU's PRODUCTS</h3>
    </footer>
</body>
</html>
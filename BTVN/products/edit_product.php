<?php
session_start();

// Kiểm tra có index được gửi đến không
if (!isset($_GET['index'])) {
    header("Location: index.php");
    exit();
}

$index = $_GET['index'];

// Kiểm tra index có hợp lệ không
if (!isset($_SESSION['products'][$index])) {
    header("Location: index.php");
    exit();
}

$product = $_SESSION['products'][$index];

// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    
    // Cập nhật sản phẩm
    $_SESSION['products'][$index] = [
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
    <title>Sửa sản phẩm</title>
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
        <h2 class="text-center mb-4">Sửa sản phẩm</h2>

        <form method="POST" class="w-50 mx-auto">
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="<?= htmlspecialchars($product['name']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá sản phẩm:</label>
                <input type="number" class="form-control" id="price" name="price" 
                       value="<?= htmlspecialchars($product['price']) ?>" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="index.php" class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </main>

    <footer class="d-flex justify-content-center align-items-center py-3 my-4 border-top">
        <h3>TLU's PRODUCTS</h3>
    </footer>
</body>
</html>
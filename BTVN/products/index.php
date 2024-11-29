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

$products = $_SESSION['products'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang sản phẩm</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icon/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <main>
        <div class="d-flex flex-column align-items-center mb-3">
            <h3>Danh sách sản phẩm</h3>
        </div>
        <div class="container">
            <button class="btn btn-success" onclick="window.location.href='add_product.php'">Thêm mới</button>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá thành</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)) : ?>
                        <tr>
                            <td colspan="4" class="text-center">Không có sản phẩm nào.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($products as $index => $product): ?>
                            <tr>
                                <td><?= htmlspecialchars($product['name']) ?></td>
                                <td><?= htmlspecialchars($product['price']) ?> VND</td>
                                <td>
                                    <a href="edit_product.php?index=<?= $index ?>" class="text-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-danger" onclick="confirmDelete(<?= $index ?>)">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="d-flex justify-content-center align-items-center py-3 my-4 border-top">
        <h3>TLU's PRODUCTS</h3>
    </footer>

    <script>
    function confirmDelete(index) {
        Swal.fire({
            title: 'Xác nhận xóa?',
            text: "Bạn có chắc chắn muốn xóa sản phẩm này không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `delete_product.php?index=${index}`;
            }
        });
        return false;
    }
    </script>
</body>
</html>
<?php
$db = new database();

$sql = "SELECT sanpham.MaSP, sanpham.TenSP, sanpham.img, sanpham.dongia, danhmucsp.IDLoaiSP 
        FROM sanpham 
        JOIN danhmucsp ON sanpham.IDLoaiSP = danhmucsp.IDLoaiSP";

$products = $db->xuatdulieu($sql);

?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $products = $_POST['products'];

    foreach ($products as $product_id) {
        $sql = "INSERT INTO chitietdontiec (MaSP) VALUES ('$product_id')";
        $db->dangky($sql);
    }

    // Hiển thị thông báo alert sau khi đặt hàng thành công
    echo "<script>
            alert('Đặt tiệc thành công!');
            window.location.href = 'index.php?page=tien_coc';
          </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn Sản Phẩm</title>
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center mb-4">Chọn Sản Phẩm</h3>
        <form action="" method="post">
            <div class="row">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="card h-100">
                                <?php
                                $filePath = "./assets/images/" . $product['img'];
                                if (file_exists($filePath)): ?>
                                    <img src="<?php echo $filePath; ?>" class="card-img-top" alt="<?php echo $product['TenSP']; ?>">
                                <?php else: ?>
                                    <div class="card-img-top bg-secondary text-white d-flex align-items-center justify-content-center"
                                        style="height: 200px;">
                                        Hình ảnh không tồn tại
                                    </div>
                                <?php endif; ?>
                                <div class="card-body text-center">
                                    <h6 class="card-title"><?php echo $product['TenSP']; ?></h6>
                                    <p class="card-text text-danger fw-bold"><?php echo number_format($product['dongia']); ?>
                                        VND</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="products[]"
                                            value="<?php echo $product['MaSP']; ?>"
                                            id="product_<?php echo $product['MaSP']; ?>">
                                        <label class="form-check-label"
                                            for="product_<?php echo $product['MaSP']; ?>">Chọn</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">Không có sản phẩm nào để hiển thị.</p>
                <?php endif; ?>
            </div>
            <div class="text-center px-2">
                <button type="button" class="btn btn-primary" onclick="history.back()">Quay Lại</button>
                <button type="submit" class="btn btn-success">Xác Nhận Đặt Hàng</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
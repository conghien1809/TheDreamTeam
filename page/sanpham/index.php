<!DOCTYPE html>
<html>
<head>
    <title>Tìm kiếm sản phẩm</title>
    <link rel="stylesheet" href="assets/css/sanpham.css"/>
</head>
<body>
    <table class="search-form" align="center" cellpadding="5">
        <tr>
            <td>
                <form action="" method="get">

                    <input type="text" name="search" placeholder="Nhập từ khóa cần tìm" value="<?php echo  $_GET['search'];  ?>">
                    <input type="submit" value="Tìm">
                    <input type="hidden" name="page" value="sanpham">
                </form>
            </td>
        </tr>
    </table>
</body>
</html>
<?php
$obj = new database();
$loaisp = $obj->xuatdulieu("SELECT * FROM danhmucsp");

if ($loaisp) {
    echo '<ul class="category-list">';
    for ($i = 0; $i < count($loaisp); $i++) {
        echo '<li><a href="index.php?page=sanpham&cate=' . $loaisp[$i]['IDLoaiSP'] . '">' . $loaisp[$i]['TenLoaiSP'] . '</a></li>';
    }
    echo '</ul>';
}

$obj = new database();
$search = isset($_GET['search']) ? $_GET['search'] : '';
if($cate)
    $sql = "SELECT * FROM sanpham WHERE IDLoaiSP='$cate'";
else
    $sql = "SELECT * FROM sanpham";
if (!empty($search)) {
    $sql .= " WHERE tensp LIKE '%$search%'";
}
$sanpham = $obj->xuatdulieu($sql);

if($sanpham) {
    echo '<div class="product-container">'; // Thêm lớp container để áp dụng CSS flex
    for($i = 0; $i < count($sanpham); $i++) { // Hiển thị tất cả dữ liệu
        echo '
        <div class="sanpham">
            <div class="tensp">
                <a href="index.php?page=chitietsanpham&cate=' . $sanpham[$i]["MaSP"] . '">' . $sanpham[$i]["TenSP"] . '</a>
            </div>
            <div class="hinh">
                <img src="assets/images/' . $sanpham[$i]["img"] . '" width="200" />
            </div>
            <div class="gia">
                Giá: ' . number_format($sanpham[$i]["dongia"]) . ' VNĐ
            </div>
        </div>';
    }
    echo '</div>'; // Kết thúc container
} else {
    echo "Hiện tại chưa có sản phẩm nào";
}
?>


<div style="clear:both"></div>
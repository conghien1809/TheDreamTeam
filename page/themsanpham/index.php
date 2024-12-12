<head>
<link rel="stylesheet" href="assets/css/themsanpham.css">
</head>
<?php
include("class/classxuly.php");
$obj = new xuly();
include("page/themsanpham/xuly.php");
?>
<h3 align="center">THÊM SẢN PHẨM </h3>
<form method="post" enctype="multipart/form-data">
<table width="80%" style="border-collapse:collapse">
    <tr>
        <td width="30%">Tên sản phẩm</td>
        <td><input type="text" name="TenSP" required /></td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td><input type="text" name="MotaSP" required /></td>
    </tr>
    <tr>
        <td>Giá</td>
        <td><input type="number" name="dongia" required /></td>
    </tr>
    <tr>
        <td>Hình</td>
        <td><input type="file" name="img" required /></td>
    </tr>
    <tr>
        <td>Thuộc loại sản phẩm</td>
        <td>
            <select name="IDLoaiSP" required>
                <?php echo $obj->selectcongty(); ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="btThem" value="Thêm sản phẩm" /></td>
    </tr>

</table></form>
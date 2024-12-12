<?php
include("class/classxuly.php");
$obj = new xuly();
include("page/suasanpham/xuly.php");
$sanpham=$obj->danhsachsanpham($cate);
?>
<h3 align="center">Chinh sua san pham</h3>
<form method="post" enctype="multipart/form-data">
<table width="80%" style="border-collapse:collapse">
    <tr>
        <td width="30%">Ten san pham</td>
        <td><input type="text" name="TenSP" required value="<?=$sanpham[0]['TenSP']?>" /></td>
    </tr>
    <tr>
        <td>Mo ta</td>
        <td><input type="text" name="MotaSP" required value="<?=$sanpham[0]['MotaSP']?>" /></td>
    </tr>
    <tr>
        <td>Don gia</td>
        <td><input type="number" name="dongia" required value="<?=$sanpham[0]['dongia']?>" /></td>
    </tr>
    <tr>
        <td>Hinh</td>
        <td><input type="file" name="img" /></td>
    </tr>
    <tr>
        <td>Thuoc loai san pham</td>
        <td>
            <select name="IDLoaiSP" required>
                <option value="">- Chon loai san pham-</option>
                <?php echo $obj->selectcongty($sanpham[0]['IDLoaiSP']); ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="btnSua" value="Sua SP" /></td>
    </tr>

</table></form>
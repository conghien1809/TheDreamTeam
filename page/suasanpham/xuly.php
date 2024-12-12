<?php
if (isset($_POST['btnSua'])) {
    $TenSP = $_POST['TenSP'];
    $MotaSP = $_POST['MotaSP'];
    $dongia = $_POST['dongia'];
    $IDLoaiSP = $_POST['IDLoaiSP'];
    $img = $_FILES['img']['name'];

    // Upload hình ảnh (nếu có)
    if (!empty($img)) {
        $targetDir = "assets/images/";
        $targetFile = $targetDir . basename($img);
        move_uploaded_file($_FILES['img']['tmp_name'], $targetFile);
    } else {
        $img = $sanpham[0]['img']; // Giữ nguyên hình ảnh cũ nếu không tải lên mới
    }

    // Cập nhật thông tin sản phẩm
    $sql = "UPDATE sanpham SET 
                TenSP = '$TenSP', 
                MotaSP = '$MotaSP', 
                dongia = $dongia, 
                IDLoaiSP = $IDLoaiSP, 
                img = '$img' 
            WHERE MaSP = '$cate'";
    $obj->suasanpham($sql);

    // Thông báo và chuyển hướng
    echo "<script>alert('Cập nhật sản phẩm thành công!'); window.location.href='index.php?page=quanlysanpham';</script>";
}
?>

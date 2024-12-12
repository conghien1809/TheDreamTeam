<?php
    if(isset($_POST['btnSua'])){
        $tennv=$_POST['tennv'];
        $diachi=$_POST['diachi'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $position=$_POST['position'];
                $sql="update nhanvien set TenNV='$tennv',DiaChi='$diachi',Username='$username',Password='$password', SDT='$sdt', Email='$email', MaLoai='$position' where MaNV='$cate'";
                if($obj->suanhanvien($sql)){
                    echo '<script>alert("Cập nhật thành công!");</script>';
                }
                else {
                    echo 'Update fail';
                }
            }
?>
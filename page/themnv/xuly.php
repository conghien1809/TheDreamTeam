<?php
    if(isset($_POST['btnThem'])){
        $tennv=$_POST['tennv'];
        $diachi=$_POST['diachi'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $position=$_POST['position'];   

            
        $sqlMaxID = "select MAX(MaNV) as MaxID FROM nhanvien";
        $result = $obj->xuatdulieu($sqlMaxID);

        $newMaNV = $result[0]['MaxID'] + 1; 
        $username = 'nv' . $newMaNV;  
        $password= '123';

        $sql = "insert into nhanvien (TenNV, Username, Password, DiaChi, MaLoai, SDT, Email) 
                values ('$tennv', '$username', '$password', '$diachi', '$position', '$sdt', '$email')";

        $nhanvien = $obj->themnhanvien($sql);
        if($nhanvien){
            echo '<script>alert("Thêm nhân viên thành công! Username: '.$username.' và Password: 123");</script>';
        } else {
            echo "Thêm nhân viên thất bại";
        }
    }
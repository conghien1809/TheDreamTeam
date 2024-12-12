<?php
if(isset($_POST["btThem"]))
{
    $tensp=$_POST["TenSP"];
    $mota=$_POST["MotaSP"];
    $gia=$_POST["dongia"];
    $idcty=$_POST["IDLoaiSP"];
    $filename_new=rand(111,999)."_".$_FILES["img"]["name"];
    if(move_uploaded_file($_FILES["img"]["tmp_name"],"assets/images/".$filename_new))
    {
        $sql="insert into sanpham(TenSP,MotaSP,dongia,img,IDLoaiSP) values ('$tensp','$mota','$gia','$filename_new','$idcty')";
        if($obj->themsanpham($sql))
            echo "Them thanh cong";
        else
            echo "Them that bai";
    }
    else
        echo "upload that bait";


}



?>
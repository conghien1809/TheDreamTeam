<?php
if(isset($_POST["btXoa"]))
{
    $idsp=$_POST["btXoa"];
    if($obj->xoasanpham($idsp))
        echo "xoa thanh cong";
    else
        echo "xoa that bai";


}



?>
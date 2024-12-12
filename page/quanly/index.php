<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                        <a class="nav-link" href="#">Quản Lý Nhân Viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=calam">Quản Lý Ca Làm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=quanlysanpham">Quản Lý Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=restaurant">Quản Lý Nguyên Vật Liệu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<section>
        <div class="container mt-5">
            <h2 class="text-center">QUẢN LÝ NHÂN VIÊN</h2> 
            <a href="index.php?page=themnv" class="btn btn-success mb-3">Thêm Nhân Viên</a>
<?php
    include("class/classxuly.php");
    $obj=new xuly();
    include("page/quanly/xuly.php");
    $nhanvien=$obj->danhsachnhanvien();
    if($nhanvien){
          echo '<form method="post" action="">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Nhân Viên</th>
                        <th>Tên Nhân Viên</th>
                        <th>Số Điện Thoại</th>
                        <th>Chức Vụ</th>
                        <th>Email</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>';
        for($i=0;$i<count($nhanvien);$i++){
            echo '<tr>
            <td>'.($i+1).'</td>
            <td>'.$nhanvien[$i]['MaNV'].'</td>
            <td>'.$nhanvien[$i]['TenNV'].'</td>
            <td>'.$nhanvien[$i]['SDT'].'</td>
            <td>'.$nhanvien[$i]['TenLoai'].'</td>
            <td>'.$nhanvien[$i]['Email'].'</td>
            <td>
                <a href="index.php?page=suanv&cate='.$nhanvien[$i]['MaNV'].'" class="btn btn-warning btn-sm">Sửa</a>
                <button type="submit" name="btnXoa" value="'.$nhanvien[$i]['MaNV'].'" class="btn btn-danger btn-sm"  onclick="return confirm(\'Bạn có chắc chắn muốn xóa nhân viên này?\');");">Xóa</button>
            </td>
        </tr>';
        }
        echo '</table>
        </form>';
    }
?>
    </div>
</section>
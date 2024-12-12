<?php
    include("class/classxuly.php");
    $obj=new xuly();
    $khachhang=$obj->danhsachkhachhang($cate);
?>
<section>
        <div class="container mt-5">
            <h2 class="text-center">Thông Tin Khách Hàng</h2>
    
            <!-- Form thêm nhân viên -->
            <div class="card mb-4">
                <div class="card-body">
                    <form  method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="employeeName">Tên Khách Hàng</label>
                            <input type="text" class="form-control" disabled name="tennv" value="<?=$khachhang[0]['TenKH'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" class="form-control"  name="diachi" value="<?=$khachhang[0]['DiaChi'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="phone">Username</label>
                            <input type="text" class="form-control" name="username" value="<?=$khachhang[0]['Username'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="phone">Password</label>
                            <input type="password" class="form-control"name="password" value="<?=$khachhang[0]['Password'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số Điện Thoại</label>
                            <input type="tel" class="form-control" name="sdt" value="<?=$khachhang[0]['SDT'] ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label for="phone">Email</label>
                            <input type="text" class="form-control" name="email" value="<?=$khachhang[0]['Email'] ?>" disabled>
                        </div>
                        <a href="index.php?page=quanlykhachhang" class="btn btn-secondary">Quay Lại</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
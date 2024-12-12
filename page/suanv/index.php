<?php
    include("class/classxuly.php");
    $obj=new xuly();
    include("page/suanv/xuly.php");
    $nhanvien=$obj->danhsachnhanvien($cate);
?>
<section>
        <div class="container mt-5">
            <h2 class="text-center">Cập Nhật Nhân Viên</h2>
    
            <!-- Form thêm nhân viên -->
            <div class="card mb-4">
                <div class="card-body">
                    <form id="employeeForm" method="post" enctype="multipart/form-data" onsubmit="return validateRegistrationForm()">
                        <div class="form-group">
                            <label for="employeeName">Tên Nhân Viên</label>
                            <input type="text" class="form-control" name="tennv" value="<?=$nhanvien[0]['TenNV'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" class="form-control"  name="diachi" value="<?=$nhanvien[0]['DiaChi'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Username</label>
                            <input type="text" class="form-control" name="username" value="<?=$nhanvien[0]['Username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Password</label>
                            <input type="text" class="form-control"name="password" value="<?=$nhanvien[0]['Password'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số Điện Thoại</label>
                            <input type="tel" class="form-control" name="sdt" value="<?=$nhanvien[0]['SDT'] ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="position">Chức Vụ</label>
                            <select class="form-control" name="position" required>
                                <option value="">Chọn chức vụ</option>
                                <?php echo $obj->selectchucvu($nhanvien[0]['MaLoai']); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="phone">Email</label>
                            <input type="text" class="form-control" name="email" value="<?=$nhanvien[0]['Email'] ?>">
                        </div>
                        <button type="submit" name="btnSua" class="btn btn-primary">Sửa</button>
                        <a href="index.php?page=quanly" class="btn btn-secondary">Quay Lại</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
    function validateRegistrationForm() {
        var sdt = document.forms["employeeForm"]["sdt"].value;
        var rbsdt = /^(03|05|07|08|09)[0-9]{8}$/; 
        var tennv = document.forms["employeeForm"]["tennv"].value;
        var rbtennv = /^[a-zA-Z\s]+$/;

        if (!tennv.match(rbtennv)) {
            alert("Tên nhân viên không hợp lệ. Tên chỉ được chứa chữ cái và khoảng trắng.");
            return false;
        }

        if (!sdt.match(rbsdt)) {
            alert("Số điện thoại không hợp lệ. Số điện thoại phải bắt đầu bằng 03, 05, 07, 08 hoặc 09 và có 10 chữ số.");
            return false; 
        }
        return true;
    }
</script>
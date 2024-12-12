<?php
    $obj=new database();
    if(isset($_POST['btnDangNhap'])){
        $tk=$_POST['tk'];
        $mk=$_POST['mk'];

        $tkmk = $obj->dangnhap($tk, $mk);       
        $tkmkql = $obj->dangnhap($tk, $mk, 1); 
        $tkmknv = $obj->dangnhap($tk, $mk, 2);
        $nvbep = $obj->dangnhap($tk, $mk, 3);
          
        if ($tkmk || $tkmkql || $tkmknv || $nvbep) {
            if ($tkmk) {
                $_SESSION['dangnhap'] = $tkmk;
                $_SESSION['username'] = $tk;
                header("location:index.php?page=trangchu");
            } elseif ($tkmkql) {
                $_SESSION['dangnhapql'] = $tkmkql;
                $_SESSION['username'] = $tk;
                header("location:index.php?page=quanly");
            } elseif ($tkmknv) {
                $_SESSION['dangnhapnv'] = $tkmknv;
                $_SESSION['username'] = $tk;
                header("location:index.php?page=trangchu");
            } elseif ($nvbep) {
                $_SESSION['dangnhapbep'] = $nvbep;
                $_SESSION['username'] = $tk;
                header("location:index.php?page=trangchu");
            }
            exit;
        }
        
        echo '<script>alert("Đăng nhập không thành công!");</script>';
    }

?>
<section>
        <div class="row justify-content-center">
            <div class="col-md-7 pb-5">
                <div class="form-container">
                    <h3 class="text-center form-title"><strong>ĐĂNG NHẬP</strong></h3>
                    <form id="loginForm" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="tendn"><b>Tên đăng nhập</b></label>
                            <input type="text" class="form-control" id="tendn" name="tk" placeholder="Nhập tên đăng nhập" required>
                            <span class="text-danger" id="errortk"></span>
                        </div>
                        <div class="form-group">
                            <label for="matkhau"><b>Mật khẩu</b></label>
                            <input type="password" class="form-control" id="matkhau" name="mk" placeholder="Nhập mật khẩu" required>
                            <span class="text-danger" id="errormk"></span>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="btnDangNhap" class="btn btn-primary mt-3">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <style>
        .form-container {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}
.form-title {
    margin-bottom: 30px;
}
.form-control {
    border-radius: 30px;
}
.btn-custom {
    border-radius: 30px;
    width: 100%;
}
.back-btn {
    border-radius: 30px;
    width: 200px;
}
.error {
    font-size: 0.9em;
    color: red;
}
    </style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Thông tin cá nhân</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Đổi mật khẩu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=xemca">Xem ca làm</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?page=quanlykhachhang">Quản lý khách hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quản lý đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=quanlydondattiec">Quản lý đơn đặt tiệc</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section>
    <div class="container mt-5">
        <h2 class="text-center">DANH SÁCH KHÁCH HÀNG ĐẶT TIỆC</h2>
        <?php
        include("class/classxuly.php");
        $obj = new xuly();
        include("page/quanly/xuly.php");
        $khachhang = $obj->danhsachdonhang();
        if ($khachhang) {
            echo '<form method="post" action="">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn</th>
                        <th>Họ Tên</th>
                        <th>Số Điện Thoại</th>
                        <th>Email</th>
                        <th>Số Lượng Khách</th>
                        <th>Ngày đặt</th>
                        <th>Ngày Ghi chú</th>
                    </tr>
                </thead>';
            for ($i = 0; $i < count($khachhang); $i++) {
                echo '<tr>
            <td>' . ($i + 1) . '</td>
            <td>' . $khachhang[$i]['MaDon'] . '</td>
            <td>' . $khachhang[$i]['HoTen'] . '</td>
            <td>' . $khachhang[$i]['SoDienThoai'] . '</td>
            <td>' . $khachhang[$i]['Email'] . '</td>
            <td>' . $khachhang[$i]['SoLuongKhach'] . '</td>
            <td>' . $khachhang[$i]['NgayDat'] . '</td>
            <td>' . $khachhang[$i]['GhiChu'] . '</td>
        </tr>';
            }
            echo '</table>
        </form>';
        }
        ?>
    </div>
</section>
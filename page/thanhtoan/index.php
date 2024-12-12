<?php
if (!(!empty($_GET) && isset($_GET['MaHD']))) {
    header('Location: ' . 'index.php?page=giohang');
    exit();
}

function ketnoi()
{
    $conn = new mysqli("localhost", "root", "", "thedreamteam");
    if ($conn->connect_error) {
        echo "Kết nối thất bại!";
        exit();
    } else {
        return $conn;
    }
}

// Hàm lấy tổng tiền của hóa đơn
function getTotalHoaDon($MaHD)
{
    $conn = ketnoi();
    $sql = "
        SELECT SUM(ct.soluong * s.dongia) AS tong_tien
        FROM hoadon h
        JOIN chitiethoadon ct ON h.MaHD = ct.MaHD
        JOIN sanpham s ON ct.MaSP = s.MaSP
        WHERE h.MaHD = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $MaHD); // Bảo vệ khỏi SQL Injection
    $stmt->execute();
    $stmt->bind_result($tong_tien);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
    return $tong_tien;
}

// Cập nhật trạng thái hóa đơn khi người dùng nhấn "Tôi đã thanh toán"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['MaHD'])) {
        $MaHD = $_POST['MaHD'];
        $conn = ketnoi();

        // Cập nhật trạng thái hóa đơn
        $sql = "UPDATE hoadon SET status = 1 WHERE MaHD = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $MaHD);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['message'] = "Thanh toán thành công!";
        } else {
            $_SESSION['message'] = "Cập nhật trạng thái thất bại!";
        }

        $stmt->close();
        $conn->close();

        // Điều hướng lại trang sau khi cập nhật
        header('Location: ' . 'index.php?page=thanhtoan&MaHD=' . $MaHD);
        exit();
    }
}

// Lấy mã hóa đơn từ URL
$MaHD = $_GET['MaHD'];

// Lấy tổng tiền của hóa đơn
$tongTien = getTotalHoaDon($MaHD);
?>

<style>
    .box {
        padding: 15px;
        margin-bottom: 15px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        overflow: hidden;
    }

    .sub-title {
        font-weight: 700;
        margin-bottom: 10px;
    }

    .box-space {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
    }
</style>

<section class="container py-3">
    <h2 class="sub-title text-center">Thanh toán</h2>
    <div class="box">
        <h4 class="sub-title">Thông tin hóa đơn</h4>
        <div class="box-space">
            <span>Mã hóa đơn: </span><span style="font-weight: 700;"><?= htmlspecialchars($MaHD) ?></span>
        </div>
        <div class="box-space">
            <span>Tổng tiền: </span><span style="font-weight: 700;"><?= number_format($tongTien) ?> VND</span>
        </div>
    </div>

    <div class="box">
        <h4 class="sub-title">Thông tin tài khoản ngân hàng</h4>
        <div class="box-space">
            <span>Ngân hàng: </span><span style="font-weight: 700;">Vietcombank</span>
        </div>
        <div class="box-space">
            <span>Chủ tài khoản: </span><span style="font-weight: 700;">Nguyễn Văn A</span>
        </div>
        <div class="box-space">
            <span>Số tài khoản: </span><span style="font-weight: 700;">07977626</span>
        </div>
        <div class="box-space">
            <span>Chi Nhánh: </span><span style="font-weight: 700;">TP.HCM</span>
        </div>
    </div>

    <h4 class="sub-title">Hướng dẫn chuyển khoản</h4>
    <p>1. Vui lòng chuyển khoản đúng số tiên điền tài khoản trên</p>
    <p>2. Nội dung chuyển khoản. Thanh toán + Mã đơn hàng</p>
    <p>3. Giữ lại biên lại sau khi chuyển khoản để đối chiều nêu cần thiết.</p>
    <p>4. Sau khi chuyển khoản thành công, đơn hàng của bạn sẽ được xử lý trong vòng vài phút</p>

    <form method="post" class="mb-3">
        <input type="hidden" name="MaHD" value="<?= $MaHD ?>">
        <button type="submit" class="btn btn-outline-success  w-100">Tôi đã thanh toán</button>
    </form>
    <!-- Hiển thị thông báo nếu có -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-info">
            <?= $_SESSION['message'] ?>
        </div>
    <?php endif; ?>
</section>
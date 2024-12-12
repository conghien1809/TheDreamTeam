<?php
$cartTotal = [];
if (isset($_SESSION['cartTotal'])) {
    $cartTotal = $_SESSION['cartTotal'];
}

function changeCartTotal($data, $sp, $IsAdd = false): array
{ {
        if ($IsAdd) {
            $data[] = $sp; // Thêm sản phẩm nếu `$IsAdd = true`
        } else {
            $data = array_filter($data, function ($item) use ($sp) {
                return $item['MaSP'] !== $sp['MaSP'];
            });
        }
        return $data;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET) && isset($_GET['MaSP'])) {
        $MaSP = $_GET['MaSP'];
        $cart = $_SESSION['cart'] ?? [];
        $results = [];

        foreach ($cart as $item) {
            if ($item['MaSP'] === $MaSP) {
                // Cập nhật số lượng
                if (isset($_GET['quantity'])) {
                    $item['quantity'] = max(1, (int)$_GET['quantity']);
                }

                // Xử lý chọn sản phẩm
                if (isset($_GET['check'])) {
                    $isChecked = filter_var($_GET['check'], FILTER_VALIDATE_BOOLEAN);
                    $cartTotal = changeCartTotal($cartTotal, $item, $isChecked);
                    $_SESSION['checked'][$MaSP] = $isChecked;
                }

                // Xóa sản phẩm
                if (isset($_GET['delete'])) {
                    unset($_SESSION['checked'][$MaSP]);
                    continue;
                }
            }
            $results[] = $item;
        }

        $_SESSION['cart'] = $results;
        $_SESSION['cartTotal'] = $cartTotal;
        header('Location: ' . 'index.php?page=giohang');
        exit();
    }
}

$cart = [];
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

$totalPros = count($cart);
$total = 0;
$checkedItems = $_SESSION['checked'] ?? [];

if (!empty($cartTotal)) {
    foreach ($cartTotal as $item) {
        $total += $item['dongia'] * $item['quantity'];
    }
}

function ketnoi()
{
    $conn = new mysqli("localhost", "root", "", "thedreamteam" );
    if ($conn->connect_error) {
        echo "Kết nối thất bại!";
        exit();
    } else {
        return $conn;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tạo mã hóa đơn
    $MaHD = uniqid('HD');
    if (!empty($_POST)) {
        if (count($cartTotal) > 0) {
            $obj = ketnoi();

            $MaKH = $_SESSION['dangnhap'];
            $status = 0;

            // Thêm hóa đơn
            $sqlHD = "INSERT INTO hoadon (MaHD, MaKH, status) VALUES ('$MaHD', '$MaKH', $status)";
            $resultHD = $obj->query($sqlHD);

            if ($resultHD) {
                $success = true;

                foreach ($cartTotal as $item) {
                    $MaSP = $item['MaSP'];
                    $soLuong = (int)$item['quantity'];

                    // Thêm chi tiết hóa đơn
                    $sqlCTHD = "INSERT INTO chitiethoadon (MaHD, MaSP, soluong) 
                                VALUES ('$MaHD', '$MaSP', $soLuong)";
                    if (!$obj->query($sqlCTHD)) {
                        $success = false;
                        break;
                    }
                }

                if ($success) {
                    // Xóa giỏ hàng
                    unset($_SESSION['checked']);
                    $results = [];
                    foreach ($cart as $item) {
                        foreach ($cartTotal as $ct) {
                            if ($item['MaSP'] !== $ct['MaSP']) {
                                $results[] = $item;
                            }
                        }
                    }
                    $_SESSION['cart'] = $results;
                    unset($_SESSION['cartTotal']);
                    echo "<script>alert('Thanh toán thành công!')</script>";
                } else {
                    echo "<script>alert('Có lỗi xảy ra khi thêm chi tiết hóa đơn.')</script>";
                }
            } else {
                echo "<script>alert('Không thể tạo hóa đơn. Vui lòng thử lại.')</script>";
            }
        } else {
            echo "<script>alert('Giỏ hàng trống. Không thể thanh toán.')</script>";
        }
    }

    header('Location: ' . 'index.php?page=thanhtoan&MaHD=' . $MaHD);
    exit();
}

?>

<style>
    .product-cart {
        display: flex;
        gap: 10px;
    }

    .product-cart img {
        width: 150px;
        height: auto;
        object-fit: cover;
    }

    .product-cart__title {
        font-weight: 700;
        display: -webkit-box;
        max-width: 100%;
        margin: 0 auto;
        line-height: 1;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .product-cart p {
        display: -webkit-box;
        max-width: 100%;
        margin: 0 auto;
        line-height: 1;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .product-cart__delete {
        color: red;
        font-weight: 700;
        cursor: pointer;
    }
</style>

<section class="container">
    <h1 class="pt-3">
        Giỏ hàng (<?= $totalPros ?>)
    </h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($cart)) {
                foreach ($cart as $item) {
                    $isChecked = isset($checkedItems[$item['MaSP']]) && $checkedItems[$item['MaSP']];
                    echo '
                        <tr>
                            <td>
                                <input 
                                    type="checkbox" 
                                    name="check" 
                                    onchange="changeStatus(' . $item["MaSP"] . ', this.checked)" ' . ($isChecked ? 'checked' : '') . '>
                            </td>
                            <td style="width: 40%;">
                                <div class="product-cart">
                                    <img src="assets/images/' . $item['Image'] . '" alt="">
                                    <div>
                                        <span class="product-cart__title">
                                            ' . $item['TenSP'] . '
                                        </span>
                                        <p>
                                            ' . $item['MotaSP'] . '
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                               ' . number_format($item["dongia"]) . ' VND
                            </td>
                            <td>
                                <input 
                                type="number" 
                                name="quantity" 
                                value="' . $item["quantity"] . '" 
                                min="1"
                                onchange="updateQuantity(' . $item["MaSP"] . ', this.value)">
                            </td>
                            <td>
                                ' . number_format($item["dongia"] * $item["quantity"]) . ' VND
                            </td>
                            <td>
                                <span class="product-cart__delete" onclick="deleteProduct(' . $item["MaSP"] . ')">
                                    x
                                </span>
                            </td>
                        </tr>
                        ';
                }
            }
            ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-between align-items-center py-4">
        <span style="font-weight: 700;">
            Tổng tiền: <span id="total"><?= number_format($total) ?></span> VND
        </span>
        <form method="post">
            <input type="hidden" name="MaKH" value="<?= $_SESSION['dangnhap'] ?>">
            <button type="submit" class="btn btn-success">
                Thanh toán
            </button>
        </form>
    </div>
    <script>
        const href = location.origin + location.pathname + '?page=giohang'

        function updateQuantity(MaSP, quantity) {
            location.href = href + `&MaSP=${MaSP}&quantity=${quantity}`
        }

        function deleteProduct(MaSP) {
            const check = confirm("Bạn muốn xóa sản phẩm này?")
            if (check)
                location.href = href + `&MaSP=${MaSP}&delete=1`
        }

        function changeStatus(MaSP, value) {
            location.href = href + `&MaSP=${MaSP}&check=${value}`
        }
    </script>
</section>
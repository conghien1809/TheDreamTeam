<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'inventory_db';

// Establish database connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch ingredients data
$sql = "SELECT ingredient_ID, name, price, unit FROM ingredients";
$result = $conn->query($sql);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link" href="index.php?page=quanly">Quản Lý Nhân Viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=calam">Quản Lý Ca Làm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=quanlysanpham">Quản Lý Sản Phẩm</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?page=restaurant">Quản Lý Nguyên Vật Liệu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng nguyên vật liệu</title>
    <link rel="stylesheet" href="assets/css/qlnvl.css">
    <style>
        .table-container {
            margin: 20px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
        }

        .input-date {
            padding: 5px;
            font-size: 16px;
        }

        .total-price,
        .total-amount {
            text-align: right;
        }
    </style>
</head>

<body>
    <main>
        <header class="menu-header">
            <h1 class="menu-title">Đặt hàng nguyên vật liệu</h1>
        </header>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Mã nguyên liệu</th>
                        <th>Tên nguyên liệu</th>
                        <th>Giá</th>
                        <th>Đơn vị</th>
                        <th>Số lượng nhập</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['ingredient_ID'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . number_format($row['price'], 0, ',', '.') . " VND</td>";
                            echo "<td>" . $row['unit'] . "</td>";
                            echo "<td><input type='number' class='input-quantity' name='quantity[" . $row['ingredient_ID'] . "]' min='0' value='0' data-price='" . $row['price'] . "'></td>";
                            echo "<td class='total-price'>0 VND</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <label for="order-date">Ngày đặt hàng:</label>
            <input type="date" id="order-date" class="input-date" required>
        </div>

        <div class="form-group">
            <span class="total">Tổng cộng: <span id="total-amount" class="total-amount">0 VND</span></span>
        </div>

        <div class="button-group">
            <button type="button" id="submit-button" class="action-button">Đặt hàng</button>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const quantities = document.querySelectorAll('.input-quantity');
            const totalAmountEl = document.getElementById('total-amount');

            // Function to update the total price for a row and calculate the grand total
            function updateTotal() {
                let grandTotal = 0;

                quantities.forEach(quantityInput => {
                    const row = quantityInput.closest('tr');
                    const price = parseFloat(quantityInput.getAttribute('data-price'));
                    const quantity = parseInt(quantityInput.value) || 0;
                    const totalPriceCell = row.querySelector('.total-price');
                    const totalPrice = price * quantity;

                    // Update the total price for the row
                    totalPriceCell.textContent = totalPrice.toLocaleString('vi-VN') + ' VND';

                    // Add to grand total
                    grandTotal += totalPrice;
                });

                // Update the grand total display
                totalAmountEl.textContent = grandTotal.toLocaleString('vi-VN') + ' VND';
            }

            // Attach input event listeners to each quantity field
            quantities.forEach(quantityInput => {
                quantityInput.addEventListener('input', updateTotal);
            });

            // Handle form submission
            document.getElementById('submit-button').addEventListener('click', function () {
                const orderDate = document.getElementById('order-date').value;
                if (!orderDate) {
                    alert('Vui lòng nhập ngày đặt hàng.');
                    return;
                }

                const data = [];
                document.querySelectorAll('.input-quantity').forEach(input => {
                    const ingredientID = input.name.match(/\[(.*?)\]/)[1];
                    const quantity = parseInt(input.value, 10);
                    if (quantity > 0) {
                        data.push({
                            ingredient_ID: ingredientID,
                            quantity: quantity
                        });
                    }
                });

                if (data.length === 0) {
                    alert('Vui lòng nhập ít nhất một số lượng.');
                    return;
                }

                // Generate a unique order ID
                const orderID = 'DH' + Math.floor(1000 + Math.random() * 9000);

                // Prepare the data to send to the server
                const orderData = {
                    order_ID: orderID,
                    order_date: orderDate,
                    status: 'Chờ xử lý',
                    completion_date: null,
                    items: data
                };

                fetch('page/order-form/xuly.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(orderData)
                }).then(response => {
                    if (response.ok) {
                        alert('Đặt hàng thành công!');
                        window.location.href = 'index.php?page=order';;
                    } else {
                        response.text().then(text => alert(`Có lỗi xảy ra: ${text}`));
                    }
                }).catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra, vui lòng thử lại.');
                });

                // Handle form submission
                document.getElementById('submit-button').addEventListener('click', function () {
                    const orderDate = document.getElementById('order-date').value;

                    // Get today's date in the yyyy-mm-dd format
                    const today = new Date().toISOString().split('T')[0];

                    // Check if the order date is earlier than today
                    if (orderDate < today) {
                        alert('Ngày đặt hàng không thể sớm hơn hôm nay.');
                        return;
                    }

                    if (!orderDate) {
                        alert('Vui lòng nhập ngày đặt hàng.');
                        return;
                    }

                    const data = [];
                    document.querySelectorAll('.input-quantity').forEach(input => {
                        const ingredientID = input.name.match(/\[(.*?)\]/)[1];
                        const quantity = parseInt(input.value, 10);
                        if (quantity > 0) {
                            data.push({
                                ingredient_ID: ingredientID,
                                quantity: quantity
                            });
                        }
                    });

                    if (data.length === 0) {
                        alert('Vui lòng nhập ít nhất một số lượng.');
                        return;
                    }

                    // Generate a unique order ID
                    const orderID = 'DH' + Math.floor(1000 + Math.random() * 9000);

                    // Prepare the data to send to the server
                    const orderData = {
                        order_ID: orderID,
                        order_date: orderDate,
                        status: 'Chờ xử lý',
                        completion_date: null,
                        items: data
                    };

                    fetch('page/order-form/xuly.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(orderData)
                    }).then(response => {
                        if (response.ok) {
                            alert('Đặt hàng thành công!');
                            window.location.href = 'index.php?page=order';
                        } else {
                            response.text().then(text => alert(`Có lỗi xảy ra: ${text}`));
                        }
                    }).catch(error => {
                        console.error('Error:', error);
                        alert('Có lỗi xảy ra, vui lòng thử lại.');
                    });
                });

            });
        });
    </script>
</body>

</html>
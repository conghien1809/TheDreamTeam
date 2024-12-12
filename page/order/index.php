<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'inventory_db';


$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT order_ID, order_date, status, completion_date FROM orders";
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
    <title>Order Management</title>
    <link rel="stylesheet" href="assets/css/qlnvl.css">
</head>

<body>
    <main>
        <header class="menu-header">
            <div class="menu-container">
                <h1 class="menu-title">Quản lý đơn hàng</h1>
                <div class="menu-content">
                    <nav class="menu-nav">
                        <button class="menu-button" onclick="window.location.href='index.php?page=restaurant'">Danh sách
                            nguyên vật liệu</button>
                        <button class="menu-button" onclick="window.location.href='index.php?page=stock'">Danh
                            sách tồn kho</button>
                        <button class="menu-button active" onclick="window.location.href='index.php?page=order'">Danh
                            sách đơn đặt hàng</button>
                    </nav>
                    <div class="button-group">
                        <button class="action-button" onclick="window.location.href='index.php?page=ingredient-form'">
                            Thêm nguyên vật liệu</button>
                        <button class="action-button" onclick="window.location.href='index.php?page=order-form'">Đặt
                            hàng nguyên liệu</button>
                    </div>
                </div>
            </div>
        </header>

        <input type="text" class="search-bar" placeholder="Tìm đơn hàng...">

        <div class="filter-section">
            <label><input type="checkbox" class="filter-checkbox" value="Hoàn thành" checked> Hoàn thành</label>
            <label><input type="checkbox" class="filter-checkbox" value="Đang giao hàng" checked> Đang giao hàng</label>
            <label><input type="checkbox" class="filter-checkbox" value="Chờ xử lý" checked> Chờ xử lý</label>
        </div>

        <div class="table-container">
            <table id="orders-table">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Ngày hoàn thành</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $status_class = '';
                            if ($row['status'] === 'Hoàn thành') {
                                $status_class = 'completed';
                            } elseif ($row['status'] === 'Đang giao hàng') {
                                $status_class = 'processing';
                            } elseif ($row['status'] === 'Chờ xử lý') {
                                $status_class = 'pending';
                            }

                            echo "<tr data-status='{$row['status']}'>";
                            echo "<td>" . $row['order_ID'] . "</td>";
                            echo "<td>{$row['order_date']}</td>";
                            echo "<td><span class='status {$status_class}'>" . htmlspecialchars($row['status']) . "</span></td>";
                            echo "<td>" . (!empty($row['completion_date']) ? $row['completion_date'] : '-') . "</td>";
                            echo "<td><button class='view-button' data-order-id='{$row['order_ID']}'>Cật nhật</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No orders available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchBar = document.querySelector('.search-bar');
            const checkboxes = document.querySelectorAll('.filter-checkbox');

            function filterAndSearch() {
                const searchValue = searchBar.value.toLowerCase();
                const selectedStatuses = Array.from(checkboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.value);

                document.querySelectorAll('.table-container tbody tr').forEach(row => {
                    const rowStatus = row.getAttribute('data-status');
                    const cells = row.querySelectorAll('td');
                    let rowMatchesSearch = false;

                    cells.forEach(cell => {
                        const cellText = cell.textContent.toLowerCase();
                        if (cellText.includes(searchValue)) {
                            rowMatchesSearch = true;
                        }
                    });

                    if (selectedStatuses.includes(rowStatus) && rowMatchesSearch) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            searchBar.addEventListener('input', filterAndSearch);
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', filterAndSearch);
            });

            // Add event listeners to "Xem" buttons
            document.querySelectorAll('.view-button').forEach(button => {
                button.addEventListener('click', function () {
                    const orderId = this.getAttribute('data-order-id');

                    // Trigger the PHP script to update the order status via a fetch request
                    fetch('page/order/xuly.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ order_ID: orderId })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert(data.message); // Show success message
                                // Optionally, update the table row or status in the UI
                                // For example, if the order's status was updated successfully, refresh or highlight the row
                                const row = button.closest('tr');
                                row.querySelector('.status').textContent = data.new_status; // Update status in the row
                                location.reload();
                            } else {
                                alert(data.message); // Show failure message
                            }
                        })
                        .catch(error => {
                            console.error('Error updating order:', error);
                            alert('Có lỗi xảy ra trong quá trình cập nhật.');
                        });
                });
            });
        });
    </script>

</body>

</html>
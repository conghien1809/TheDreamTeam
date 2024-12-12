<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'inventory_db';


$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT ingredient_ID, name, stock, expiry_date FROM stock";
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
    <title>Danh sách tồn kho</title>
    <link rel="stylesheet" href="assets/css/qlnvl.css">
</head>

<body>
    <main>
        <header class="menu-header">
            <div class="menu-container">
                <h1 class="menu-title">Quản lý nguyên vật liệu</h1>
                <div class="menu-content">
                    <nav class="menu-nav">
                        <button class="menu-button" onclick="window.location.href='index.php?page=restaurant'">Danh sách
                            nguyên vật liệu</button>
                        <button class="menu-button active" onclick="window.location.href='index.php?page=stock'">Danh
                            sách tồn kho</button>
                        <button class="menu-button" onclick="window.location.href='index.php?page=order'">Danh sách đơn
                            đặt hàng</button>
                    </nav>
                    <div class="button-group">
                        <button class="action-button" onclick="window.location.href='index.php?page=ingredient-form'">
                            Thêm nguyên vật liệu</button>
                        <button class="action-button" onclick="window.location.href='index.php?page=order-form'">Đặt hàng nguyên liệu</button>
                    </div>
                </div>
            </div>
        </header>

        <input type="text" class="search-bar" placeholder="Tìm nguyên vật liệu...">

        <div class="filter-section">
            <label><input type="checkbox" class="filter-checkbox" value="Còn hạn" checked> Còn hạn</label>
            <label><input type="checkbox" class="filter-checkbox" value="Hết hạn" checked> Hết hạn</label>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Mã NVL</th>
                        <th>Tên NVL</th>
                        <th>Tồn kho</th>
                        <th>Hạn sử dụng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            
                            $expiry_date = !empty($row['expiry_date']) ? new DateTime($row['expiry_date']) : null;
                            $current_date = new DateTime();
                            $is_expired = $expiry_date && $expiry_date < $current_date;

                            
                            $status = $is_expired ? "Hết hạn" : "Còn hạn";

                            echo "<tr data-status='{$status}'>";
                            echo "<td>" . $row['ingredient_ID'] . "</td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['stock']}</td>";
                            echo "<td>";
                            echo "{$row['expiry_date']}";
                            echo "<br>";
                            echo "<span class='expiry-status " . ($is_expired ? "expired" : "valid") . "'>";
                            echo $is_expired ? "Hết hạn" : "Còn hạn";
                            echo "</span>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No stock data available</td></tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </main>
    <script>
        
        function filterTable() {
            const searchValue = document.querySelector('.search-bar').value.toLowerCase();
            const selectedStatuses = Array.from(document.querySelectorAll('.filter-checkbox:checked')).map(cb => cb.value);

            
            document.querySelectorAll('.table-container tbody tr').forEach(row => {
                const rowText = row.textContent.toLowerCase(); 
                const rowStatus = row.getAttribute('data-status'); 

                
                const matchesSearch = rowText.includes(searchValue);
                const matchesFilter = selectedStatuses.includes(rowStatus);

                
                row.style.display = matchesSearch && matchesFilter ? '' : 'none';
            });
        }

        
        document.querySelector('.search-bar').addEventListener('input', filterTable);

        
        document.querySelectorAll('.filter-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', filterTable);
        });

    </script>
</body>

</html>

<?php
$conn->close();
?>
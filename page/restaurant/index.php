<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'inventory_db';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ingredient_ID, name, price, unit, shelf_life, image_path FROM ingredients";
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
    <title>Danh sách nguyên vật liệu</title>
    <link rel="stylesheet" href="assets/css/qlnvl.css">
</head>

<body>
    <main>
        <header class="menu-header">
            <div class="menu-container">
                <h1 class="menu-title">Quản lý nguyên vật liệu</h1>
                <div class="menu-content">
                    <nav class="menu-nav">
                        <button class="menu-button active"
                            onclick="window.location.href='index.php?page=restaurant'">Danh sách nguyên vật
                            liệu</button>
                        <button class="menu-button" onclick="window.location.href='index.php?page=stock'">Danh sách tồn
                            kho</button>
                        <button class="menu-button" onclick="window.location.href='index.php?page=order'">Danh sách đơn
                            đặt hàng</button>
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

        <input type="text" class="search-bar" placeholder="Tìm nguyên vật liệu...">

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th class="checkbox-column">
                            <input type="checkbox" id="select-all-checkbox">
                        </th>
                        <th>Ảnh</th>
                        <th>Mã NVL</th>
                        <th>Tên NVL</th>
                        <th>Giá</th>
                        <th>Đơn vị</th>
                        <th>Hạn sử dụng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr data-ingredient-id='" . $row['ingredient_ID'] . "'>";
                            echo "<td class='checkbox-column'>";
                            echo "<input type='checkbox' class='ingredient-checkbox' value='" . $row['ingredient_ID'] . "'>";
                            echo "</td>";
                            echo "<td>";
                            if ($row['image_path']) {
                                echo "<img src='" . $row['image_path'] . "' alt='" . $row['name'] . "' class='item-image'>";
                            } else {
                                echo "<span>Chưa có ảnh</span>";
                            }
                            echo "</td>";
                            echo "<td>" . $row['ingredient_ID'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . number_format($row['price'], 0, ',', '.') . " VND</td>";
                            echo "<td>" . $row['unit'] . "</td>";
                            echo "<td>" . $row['shelf_life'] . " ngày</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="button-group">
            <button class="action-button" id="delete-button"
                style="background-color: #ff3333; margin-top: 10px">Xóa</button>
        </div>

    </main>
    <script>
        // Existing search functionality
        document.querySelector('.search-bar').addEventListener('input', function () {
            const searchValue = this.value.toLowerCase();

            document.querySelectorAll('.table-container tbody tr').forEach(row => {
                const rowText = row.textContent.toLowerCase();
                row.style.display = rowText.includes(searchValue) ? '' : 'none';
            });
        });

        // Select all checkbox functionality
        const selectAllCheckbox = document.getElementById('select-all-checkbox');
        const ingredientCheckboxes = document.querySelectorAll('.ingredient-checkbox');

        // When the "Select All" checkbox is changed
        selectAllCheckbox.addEventListener('change', function () {
            ingredientCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Add event listeners to all individual checkboxes
        ingredientCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                // If any checkbox is unchecked, uncheck the "Select All" checkbox
                if (!this.checked) {
                    selectAllCheckbox.checked = false;
                } else {
                    // If all checkboxes are checked, check the "Select All" checkbox
                    const allChecked = Array.from(ingredientCheckboxes).every(cb => cb.checked);
                    selectAllCheckbox.checked = allChecked;
                }
            });
        });

        // Add Event Listener for "Xóa Nguyên Vật Liệu" Button
        document.getElementById('delete-button').addEventListener('click', function () {
            const selectedRows = document.querySelectorAll('.ingredient-checkbox:checked');

            if (selectedRows.length === 0) {
                alert('Vui lòng chọn ít nhất một nguyên vật liệu để xóa.');
                return;
            }

            const ingredientIDs = [];
            selectedRows.forEach(row => {
                ingredientIDs.push(row.value);
            });

            fetch('page/restaurant/xuly.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ delete_ingredients: ingredientIDs }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Nguyên vật liệu đã được xóa thành công!');
                        location.reload();
                    } else {
                        alert('Có lỗi xảy ra khi xóa nguyên vật liệu: ' + (data.error || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra, vui lòng thử lại.');
                });
        });
    </script>
</body>

</html>

<?php
$conn->close();
?>

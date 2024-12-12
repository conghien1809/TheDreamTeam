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

// Handle POST requests for inserting new data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Define the upload path
        $uploadDir = 'assets/images/ingredients/';
        $imageName = basename($_FILES['image']['name']);
        $imagePath = $uploadDir . $imageName;

        // Move the uploaded image to the desired directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            // File uploaded successfully
        } else {
            echo "Error uploading image.";
            exit;
        }
    } else {
        echo "No image uploaded or there was an error with the image.";
        exit;
    }

    // Extract form data
    $name = $_POST['material_name'];
    $price = $_POST['price'];
    $unit = $_POST['unit'];
    $shelf_life = $_POST['expiry'];

    // Generate a unique ingredient_ID
    do {
        $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $ingredient_ID = "NVL" . $randomNumber;

        // Check if ingredient_ID already exists
        $checkQuery = $conn->prepare("SELECT 1 FROM ingredients WHERE ingredient_ID = ?");
        $checkQuery->bind_param("s", $ingredient_ID);
        $checkQuery->execute();
        $checkQuery->store_result();
    } while ($checkQuery->num_rows > 0);

    $checkQuery->close();

    // Insert the new ingredient with image path
    $stmt = $conn->prepare("INSERT INTO ingredients (ingredient_ID, name, price, unit, shelf_life, image_path) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiss", $ingredient_ID, $name, $price, $unit, $shelf_life, $imagePath);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        http_response_code(500);
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit;
}
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Form Screen</title>
    <link rel="stylesheet" href="assets/css/qlnvl.css">
</head>

<body>
    <main>
        <div class="menu-header">
            <h1 class="menu-title">Thêm nguyên vật liệu</h1>
        </div>

        <form id="ingredient-form" enctype="multipart/form-data">
            <div class="table-container">
                <table>
                    <tbody>
                        <tr>
                            <td>Tên nguyên vật liệu</td>
                            <td><input type="text" name="material_name" id="material_name" placeholder="Nhập tên nguyên vật liệu" class="search-bar" required></td>
                        </tr>
                        <tr>
                            <td>Giá</td>
                            <td><input type="number" name="price" id="price" placeholder="Nhập giá" class="search-bar" required></td>
                        </tr>
                        <tr>
                            <td>Đơn vị tính</td>
                            <td><input type="text" name="unit" id="unit" placeholder="Nhập đơn vị tính" class="search-bar" required></td>
                        </tr>
                        <tr>
                            <td>Hạn sử dụng</td>
                            <td><input type="number" name="expiry" id="expiry" placeholder="Nhập hạn sử dụng" class="search-bar" required></td>
                        </tr>
                        <tr>
                            <td>Hình ảnh</td>
                            <td><input type="file" name="image" id="image" accept="image/*" class="search-bar" required></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="button-group">
                <button type="button" id="submit-button" class="action-button">Lưu</button>
            </div>
        </form>
    </main>

    <script>
        document.getElementById('submit-button').addEventListener('click', function () {
            const formData = new FormData(document.getElementById('ingredient-form'));

            fetch('index.php?page=ingredient-form', {
                method: 'POST',
                body: formData // No need to set Content-Type when using FormData
            }).then(response => {
                if (response.ok) {
                    alert('Nguyên vật liệu đã được lưu thành công!');
                    window.location.href = 'index.php?page=restaurant';
                } else {
                    response.text().then(text => alert(`Có lỗi xảy ra: ${text}`));
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra, vui lòng thử lại.');
            });
        });
    </script>
</body>

</html>

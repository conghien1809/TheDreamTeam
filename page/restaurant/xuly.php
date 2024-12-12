<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'inventory_db';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['delete_ingredients'])) {
    $ingredientIDs = $data['delete_ingredients'];

    // Prepare the SQL statement to delete multiple rows
    $placeholders = implode(',', array_fill(0, count($ingredientIDs), '?'));
    $sql = "DELETE FROM ingredients WHERE ingredient_ID IN ($placeholders)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param(str_repeat('s', count($ingredientIDs)), ...$ingredientIDs);
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
}

$conn->close();
?>

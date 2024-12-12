<?php
// Assuming you have the necessary database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'inventory_db';

// Establish database connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

$orderID = $data['order_ID'];
$orderDate = $data['order_date'];
$status = $data['status'];
$completionDate = $data['completion_date'];
$items = $data['items'];

// Insert order into the orders table
$orderQuery = "INSERT INTO orders (order_ID, order_date, status, completion_date) 
               VALUES ('$orderID', '$orderDate', '$status', NULL)";
if ($conn->query($orderQuery) === TRUE) {

    // Insert order items into the order_items table
    foreach ($items as $item) {
        $ingredientID = $item['ingredient_ID'];
        $quantity = $item['quantity'];

        // Fetch the ingredient name from the ingredients table
        $ingredientQuery = "SELECT name FROM ingredients WHERE ingredient_ID = '$ingredientID'";
        $ingredientResult = $conn->query($ingredientQuery);
        
        if ($ingredientResult->num_rows > 0) {
            // If ingredient exists, fetch the name
            $ingredient = $ingredientResult->fetch_assoc();
            $ingredientName = $ingredient['name'];

            // Insert into order_items table including ingredient name
            $insertItemQuery = "INSERT INTO order_items (order_ID, ingredient_ID, name, quantity) 
                                VALUES ('$orderID', '$ingredientID', '$ingredientName', $quantity)";
            if (!$conn->query($insertItemQuery)) {
                // Handle error inserting the order item
                echo "Error: " . $conn->error;
                exit;
            }
        } else {
            // If ingredient does not exist in the ingredients table, handle the error
            echo "Ingredient not found: $ingredientID";
            exit;
        }
    }
    
    // Send success response
    echo json_encode(['status' => 'success']);
} else {
    // If there is an error inserting the order
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
}

$conn->close();
?>

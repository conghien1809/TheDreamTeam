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
$orderId = $data['order_ID'];

if ($orderId) {
    // Check current status
    $sql = "SELECT status FROM orders WHERE order_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $orderId);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    $newStatus = '';
    $message = '';

    if ($order['status'] === 'Chờ xử lý') {
        $newStatus = 'Đang giao hàng';
        $message = 'Trạng thái đã được cập nhật thành công!';
    } elseif ($order['status'] === 'Đang giao hàng') {
        $newStatus = 'Hoàn thành';
        $message = 'Trạng thái "Hoàn thành" thành công!';
        
        // Set completion date to today
        $completionDate = date('Y-m-d'); // Get current date in Y-m-d format
        $updateCompletionDateSql = "UPDATE orders SET completion_date = ? WHERE order_ID = ?";
        $stmt = $conn->prepare($updateCompletionDateSql);
        $stmt->bind_param('ss', $completionDate, $orderId);
        $stmt->execute();
    } else {
        $message = 'Trạng thái không thể cập nhật.';
    }

    if ($newStatus) {
        // Update the order status
        $sql = "UPDATE orders SET status = ? WHERE order_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $newStatus, $orderId);
        $stmt->execute();
        $stmt->close();

        // Return success response
        echo json_encode(['success' => true, 'message' => $message, 'new_status' => $newStatus]);
    } else {
        // Return failure response
        echo json_encode(['success' => false, 'message' => $message]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid order ID']);
}

$conn->close();
?>

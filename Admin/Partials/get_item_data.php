<?php
require_once 'db_conn.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $itemId = $_GET['id'];

    // Fetch item data from the Inventory table
    $sql = "SELECT * FROM Inventory WHERE id = $itemId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'Item not found'));
    }
} else {
    echo json_encode(array('error' => 'Invalid item ID'));
}

$conn->close();
?>

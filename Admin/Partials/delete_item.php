<?php
require_once 'db_conn.php';

// Check if POST data is set and not empty
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Sanitize input data
    $itemId = $_POST['id'];

    // Delete item from the database
    $sql = "DELETE FROM Inventory WHERE id = $itemId";
    if ($conn->query($sql) === TRUE) {
        echo "Item deleted successfully";
    } else {
        echo "Error deleting item: " . $conn->error;
    }
} else {
    echo "Invalid input data";
}

// Close database connection
$conn->close();
?>

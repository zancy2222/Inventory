<?php
require_once 'db_conn.php';

// Check if POST data is set and not empty
if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['qty']) && !empty($_POST['qty']) && isset($_POST['desc']) && !empty($_POST['desc'])) {
    // Sanitize input data
    $toolId = $_POST['id'];
    $toolName = $_POST['name'];
    $toolQty = $_POST['qty'];
    $toolDesc = $_POST['desc'];

    // Update tool data in database
    $sql = "UPDATE Tools SET Tools_name = '$toolName', Tools_qty = '$toolQty', Tools_descriptions = '$toolDesc' WHERE Id = $toolId";
    if ($conn->query($sql) === TRUE) {
        echo "Tool updated successfully";
    } else {
        echo "Error updating tool: " . $conn->error;
    }
} else {
    echo "Invalid input data";
}

// Close database connection
$conn->close();
?>

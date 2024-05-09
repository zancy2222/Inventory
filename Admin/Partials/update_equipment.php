<?php
require_once 'db_conn.php';

// Check if POST data is set and not empty
if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['qty']) && !empty($_POST['qty']) && isset($_POST['desc']) && !empty($_POST['desc'])) {
    // Sanitize input data
    $equipmentId = $_POST['id'];
    $equipmentName = $_POST['name'];
    $equipmentQty = $_POST['qty'];
    $equipmentDesc = $_POST['desc'];

    // Update equipment data in the database
    $sql = "UPDATE Equipment SET Equipment_name = '$equipmentName', Equipment_qty = '$equipmentQty', Equipment_descriptions = '$equipmentDesc' WHERE Id = $equipmentId";
    if ($conn->query($sql) === TRUE) {
        echo "Equipment updated successfully";
    } else {
        echo "Error updating equipment: " . $conn->error;
    }
} else {
    echo "Invalid input data";
}

// Close database connection
$conn->close();
?>

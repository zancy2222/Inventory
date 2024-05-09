<?php
require_once 'db_conn.php';

// Check if POST data is set and not empty
if (isset($_POST['equipmentName']) && !empty($_POST['equipmentName']) && isset($_POST['equipmentQty']) && !empty($_POST['equipmentQty']) && isset($_POST['equipmentDesc']) && !empty($_POST['equipmentDesc'])) {
    // Sanitize input data
    $equipmentName = $_POST['equipmentName'];
    $equipmentQty = $_POST['equipmentQty'];
    $equipmentDesc = $_POST['equipmentDesc'];

    // Insert equipment data into the database
    $sql = "INSERT INTO Equipment (Equipment_name, Equipment_qty, Equipment_descriptions) VALUES ('$equipmentName', '$equipmentQty', '$equipmentDesc')";
    if ($conn->query($sql) === TRUE) {
        echo "Equipment added successfully";
    } else {
        echo "Error adding equipment: " . $conn->error;
    }
} else {
    echo "Invalid input data";
}

// Close database connection
$conn->close();
?>

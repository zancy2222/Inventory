<?php
require_once 'db_conn.php';

// Check if POST data is set and not empty
if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['qty']) && !empty($_POST['qty']) && isset($_POST['desc']) && !empty($_POST['desc'])) {
    // Sanitize input data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $desc = $_POST['desc'];

    // Update medical item data in the database
    $sql = "UPDATE Medical_Items SET Medical_item_name='$name', Medical_item_qty='$qty', Medical_item_descriptions='$desc' WHERE Id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Medical item updated successfully";
    } else {
        echo "Error updating medical item: " . $conn->error;
    }
} else {
    echo "Invalid input data";
}

// Close database connection
$conn->close();
?>

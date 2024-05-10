<?php
require_once 'db_conn.php';

// Check if POST data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $itemCode = $_POST['itemCode'];
    $itemName = $_POST['itemName'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $uom = $_POST['uom'];
    $dateAdded = $_POST['dateAdded'];

    // Insert data into the Inventory table
    $sql = "INSERT INTO Inventory (Item_Code, Item_Name, Category, Quantity, UOM, Date_Added) 
            VALUES ('$itemCode', '$itemName', '$category', '$quantity', '$uom', '$dateAdded')";
    if ($conn->query($sql) === TRUE) {
        echo "Item added successfully";
    } else {
        echo "Error adding item: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

// Close database connection
$conn->close();
?>

<?php
require_once 'db_conn.php';

if(isset($_POST['id']) && !empty($_POST['id']) &&
   isset($_POST['itemCode']) && !empty($_POST['itemCode']) &&
   isset($_POST['itemName']) && !empty($_POST['itemName']) &&
   isset($_POST['category']) && !empty($_POST['category']) &&
   isset($_POST['quantity']) && !empty($_POST['quantity']) &&
   isset($_POST['uom']) && !empty($_POST['uom']) &&
   isset($_POST['dateAdded']) && !empty($_POST['dateAdded'])) {

    // Sanitize input data
    $itemId = $_POST['id'];
    $itemCode = $_POST['itemCode'];
    $itemName = $_POST['itemName'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $uom = $_POST['uom'];
    $dateAdded = $_POST['dateAdded'];

    // Update item data in the Inventory table
    $sql = "UPDATE Inventory SET Item_Code = '$itemCode', Item_Name = '$itemName', Category = '$category', Quantity = '$quantity', UOM = '$uom', Date_Added = '$dateAdded' WHERE id = $itemId";

    if ($conn->query($sql) === TRUE) {
        echo "window.location.href = '../All_Items.php";
    } else {
        echo "Error updating item: " . $conn->error;
    }
} else {
    echo "Invalid input data";
}

$conn->close();
?>

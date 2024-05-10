<?php
// Include the database connection file
require_once 'db_conn.php';

// Check if the item ID and user ID are provided
if (isset($_POST['itemId']) && isset($_POST['userId'])) {
    // Get item ID and user ID from the POST data
    $itemId = $_POST['itemId'];
    $userId = $_POST['userId'];

    // Fetch item details from the Inventory table
    $itemQuery = "SELECT * FROM Inventory WHERE id = $itemId";
    $itemResult = $conn->query($itemQuery);

    if ($itemResult->num_rows > 0) {
        $itemData = $itemResult->fetch_assoc();
        $itemName = $itemData['Item_Name'];
        $itemQuantity = $itemData['Quantity'];

        // Check if there are enough items available to borrow
        if ($itemQuantity > 0) {
            // Decrement the quantity of the borrowed item in the Inventory table
            $newQuantity = $itemQuantity - 1;
            $updateQuery = "UPDATE Inventory SET Quantity = $newQuantity WHERE id = $itemId";

            if ($conn->query($updateQuery) === TRUE) {
                // Insert a record into the BorrowedInventory table
                $insertQuery = "INSERT INTO BorrowedInventory (Inventory_Id, User_id, Date_Borrowed) VALUES ($itemId, $userId, NOW())";
                if ($conn->query($insertQuery) === TRUE) {
                    echo "Item '$itemName' borrowed successfully on " . date('Y-m-d H:i:s');
                } else {
                    echo "Error: " . $conn->error;
                }
                
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Sorry, the item '$itemName' is out of stock!";
        }
    } else {
        echo "Item not found!";
    }
} else {
    echo "Item ID and user ID not provided!";
}

// Close database connection
$conn->close();
?>

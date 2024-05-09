<?php
require_once 'db_conn.php';

// Check if POST data is set and not empty
if (isset($_POST['medicalItemName']) && !empty($_POST['medicalItemName']) && isset($_POST['medicalItemQty']) && !empty($_POST['medicalItemQty']) && isset($_POST['medicalItemDesc']) && !empty($_POST['medicalItemDesc'])) {
    // Sanitize input data
    $medicalItemName = $_POST['medicalItemName'];
    $medicalItemQty = $_POST['medicalItemQty'];
    $medicalItemDesc = $_POST['medicalItemDesc'];

    // Insert medical item data into the database
    $sql = "INSERT INTO Medical_Items (Medical_item_name, Medical_item_qty, Medical_item_descriptions) VALUES ('$medicalItemName', '$medicalItemQty', '$medicalItemDesc')";
    if ($conn->query($sql) === TRUE) {
        // Insert into Available_MedItem table
        $medicalItemId = $conn->insert_id;
        $sql = "INSERT INTO Available_MedItem (Medical_Item_Id, Status) VALUES ('$medicalItemId', 'Available')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Medical item added successfully');</script>";
            echo "<script>window.location.href = '../MedicItems.php';</script>";
            exit();
        } else {
            echo "Error adding medical item: " . $conn->error;
        }
    } else {
        echo "Error adding medical item: " . $conn->error;
    }
} else {
    echo "Invalid input data";
}

// Close database connection
$conn->close();
?>

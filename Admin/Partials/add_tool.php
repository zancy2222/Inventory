<?php
require_once 'db_conn.php';

// Check if POST data is set and not empty
if (isset($_POST['toolName']) && !empty($_POST['toolName']) && isset($_POST['toolQty']) && !empty($_POST['toolQty']) && isset($_POST['toolDesc']) && !empty($_POST['toolDesc'])) {
    // Sanitize input data
    $toolName = $_POST['toolName'];
    $toolQty = $_POST['toolQty'];
    $toolDesc = $_POST['toolDesc'];

    // Insert tool data into the database
    $sql = "INSERT INTO Tools (Tools_name, Tools_qty, Tools_descriptions) VALUES ('$toolName', '$toolQty', '$toolDesc')";
    if ($conn->query($sql) === TRUE) {
        // Insert into Available_Tools table
        $toolId = $conn->insert_id;
        $sql = "INSERT INTO Available_Tools (Tool_Id, Status) VALUES ('$toolId', 'Available')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Tools added successfully');</script>";
            echo "<script>window.location.href = '../Tools.php';</script>";
            exit();
        } else {
            echo "Error adding tool: " . $conn->error;
        }
    } else {
        echo "Error adding tool: " . $conn->error;
    }
} else {
    echo "Invalid input data";
}

// Close database connection
$conn->close();
?>

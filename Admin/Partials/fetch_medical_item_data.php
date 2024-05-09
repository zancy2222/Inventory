<?php
require_once 'db_conn.php';

// Check if GET data is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize input data
    $id = $_GET['id'];

    // Fetch medical item data from the database
    $sql = "SELECT * FROM Medical_Items WHERE Id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Return medical item data as JSON
        echo json_encode($row);
    } else {
        echo "Medical item not found";
    }
} else {
    echo "Invalid input data";
}

// Close database connection
$conn->close();
?>

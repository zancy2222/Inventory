<?php
// Include the database connection file
require_once 'db_conn.php';

// Check if equipment ID is provided and not empty
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Sanitize the equipment ID
    $equipmentId = $_POST['id'];

    // Prepare and execute SQL statement to delete the equipment
    $sql = "DELETE FROM Equipment WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $equipmentId);

    if ($stmt->execute()) {
        // Deletion successful
        echo "Equipment deleted successfully";
    } else {
        // Error occurred during deletion
        echo "Error deleting equipment: " . $conn->error;
    }

    // Close prepared statement
    $stmt->close();
} else {
    // If equipment ID is not provided or empty
    echo "Invalid equipment ID";
}

// Close database connection
$conn->close();
?>

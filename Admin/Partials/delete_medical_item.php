<?php
// Include the database connection file
require_once 'db_conn.php';

// Check if medical item ID is provided and not empty
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Sanitize the medical item ID
    $medicalItemId = $_POST['id'];

    // Prepare and execute SQL statement to delete the medical item
    $sql = "DELETE FROM Medical_Items WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $medicalItemId);

    if ($stmt->execute()) {
        // Deletion successful
        echo "Medical item deleted successfully";
    } else {
        // Error occurred during deletion
        echo "Error deleting medical item: " . $conn->error;
    }

    // Close prepared statement
    $stmt->close();
} else {
    // If medical item ID is not provided or empty
    echo "Invalid medical item ID";
}

// Close database connection
$conn->close();
?>

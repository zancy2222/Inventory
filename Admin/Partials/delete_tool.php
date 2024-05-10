<?php
// Include the database connection file
require_once 'db_conn.php';

// Check if tool ID is provided and not empty
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Sanitize the tool ID
    $toolId = $_POST['id'];

    // Prepare and execute SQL statement to delete the tool
    $sql = "DELETE FROM Tools WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $toolId);

    if ($stmt->execute()) {
        // Deletion successful
        echo "Tool deleted successfully";
    } else {
        // Error occurred during deletion
        echo "Error deleting tool: " . $conn->error;
    }

    // Close prepared statement
    $stmt->close();
} else {
    // If tool ID is not provided or empty
    echo "Invalid tool ID";
}

// Close database connection
$conn->close();
?>

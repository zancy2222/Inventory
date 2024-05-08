<?php
require_once 'db_conn.php';

// Check if tool ID is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $toolId = $_GET['id'];
    
    // Fetch tool data from database
    $sql = "SELECT * FROM Tools WHERE Id = $toolId";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Return tool data as JSON
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Tool not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid tool ID']);
}

// Close database connection
$conn->close();
?>

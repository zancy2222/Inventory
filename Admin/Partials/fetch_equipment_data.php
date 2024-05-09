<?php
require_once 'db_conn.php';

if(isset($_GET['id'])) {
    $equipmentId = $_GET['id'];

    // Fetch equipment data based on equipmentId
    $sql = "SELECT * FROM Equipment WHERE Id = $equipmentId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetching the first row of the result
        $row = $result->fetch_assoc();
        // Encode data as JSON and output
        echo json_encode($row);
    } else {
        echo json_encode(array()); // Return empty array if no data found
    }
} else {
    echo json_encode(array()); // Return empty array if equipmentId parameter is not set
}

// Close database connection
$conn->close();
?>

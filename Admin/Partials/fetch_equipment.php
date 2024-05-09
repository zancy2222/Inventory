<?php
require_once 'db_conn.php';

// Fetch data from the Equipment table
$sql = "SELECT * FROM Equipment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize an empty array to store equipment data
    $equipmentData = array();

    // Loop through each row of the result set
    while ($row = $result->fetch_assoc()) {
        // Add each row to the equipment data array
        $equipmentData[] = $row;
    }

    // Output equipment data as JSON
    echo json_encode($equipmentData);
} else {
    echo "No equipment found";
}

// Close database connection
$conn->close();
?>

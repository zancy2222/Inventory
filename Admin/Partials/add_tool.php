<?php
// Include the database connection file
require_once 'db_conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $toolName = $_POST['toolName'];
    $toolQty = $_POST['toolQty'];
    $toolDesc = $_POST['toolDesc'];

    // SQL query to insert data into Tools table
    $sql = "INSERT INTO Tools (Tools_name, Tools_qty, Tools_descriptions) 
            VALUES ('$toolName', '$toolQty', '$toolDesc')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Tool added successfully');</script>";
        echo "<script>window.location.href = '../Tools.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>

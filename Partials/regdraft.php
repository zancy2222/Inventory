<?php
// Include the database connection file
require_once 'db_conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to insert data into Users table
    $sql = "INSERT INTO Users (First_name, Middle_name, Last_name, Address, Gender, Contact, Username, Email, Password) 
            VALUES ('$first_name', '$middle_name', '$last_name', '$address', '$gender', '$contact', '$username', '$email', '$password')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Register successfully');</script>";
        echo "<script>window.location.href = '../Register.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>

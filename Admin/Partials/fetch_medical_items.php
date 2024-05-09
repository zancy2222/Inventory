<?php
// Include the database connection file
require_once 'db_conn.php';

// Fetch data from the Medical_Items table
$sql = "SELECT * FROM Medical_Items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Medical_item_name'] . "</td>";
        echo "<td>" . $row['Medical_item_qty'] . "</td>";
        echo "<td>" . $row['Medical_item_descriptions'] . "</td>";
        echo "<td>
                <button class='edit-btn' data-id='" . $row['Id'] . "' onclick='openEditModalMedical(" . $row['Id'] . ")'>Edit</button>
                <button class='delete-btn' data-id='" . $row['Id'] . "'>Delete</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No medical items found</td></tr>";
}

// Close database connection
$conn->close();
?>

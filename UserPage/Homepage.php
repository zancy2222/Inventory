<?php
// Include the database connection file
require_once 'Partials/db_conn.php';

// Check if the user ID is provided in the URL
if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // SQL query to fetch user data based on ID
    $sql = "SELECT * FROM Users WHERE Id = $user_id";
    $result = $conn->query($sql);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #9c2989;
        }

        .navbar {
            background-color: #fca6ffbe;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #FFF;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            margin-left: 20px;
            display: flex;
            align-items: center;
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #f1f1f1;
        }

        .navbar-nav {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .nav-item {
            margin-left: 20px;
        }

        .nav-link {
            color: #FFF;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #f1f1f1;
        }

        .nav-icon {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }

        .nav-link:hover .nav-icon {
            transform: scale(1.1);
        }

        .inventory-section {
            margin: 20px;
        }

        .inventory-section h2 {
            color: #fca6ffbe;
        }

        .inventory-section table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .inventory-section th,
        .inventory-section td {
            border: 1px solid #fca6ffbe;
            padding: 8px;
            text-align: center;
            /* Centering text in table cells */
        }

        .inventory-section th {
            background-color: #fca6ffbe;
            color: #FFF;
        }

        .inventory-section td {
            background-color: #F8EDE3;
        }

        .inventory-section .borrowed-btn {
            padding: 5px 10px;
            background-color: #fca6ffbe;
            color: #FFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .inventory-section .borrowed-btn:hover {
            background-color: #BDD2B6;
        }

        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar-nav {
                margin-top: 10px;
            }

            .nav-item {
                margin-left: 0;
                margin-bottom: 10px;
            }
        }
        .logo-img {
            width: 200px;
            height: auto;
            display: block;
            margin: 0 auto;
            margin-top: 3%;
            margin-bottom: 10px; /* Add some bottom margin for spacing */
        }
        .navbar-brand img {
            width: 150px; /* Adjust the size as needed */
            height: auto;
            margin-right: 10px; /* Add some spacing between the logo and text */
        }
    </style>
</head>

<body>
    <nav class="navbar">
    <a href="#" class="navbar-brand"><img src="../Assets/CMLSLOGO.png" alt="Logo"></a>
        <ul class="navbar-nav">
        <li class="nav-item"><a href="Homepage.php?id=<?php echo $user_id; ?>" class="nav-link"><i class="fas fa-home nav-icon"></i>Home</a></li>
            <li class="nav-item"><a href="index.php?id=<?php echo $user_id; ?>" class="nav-link"><i class="fas fa-user-friends nav-icon"></i>Borrower</a></li>
            <li class="nav-item"><a href="ProfilePage.php?id=<?php echo $user_id; ?>" class="nav-link"><i class="fas fa-user nav-icon"></i>Profile</a></li>
            <li class="nav-item"><a href="../Home.php" class="nav-link"><i class="fas fa-sign-in-alt nav-icon"></i>Log-out</a></li>
        </ul>
    </nav>
    <img src="../Assets/COMBINED.png" alt="Logo" class="logo-img">

    <div class="inventory-section">
    <h2>Inventory History</h2>
    <table>
        <thead>
            <tr>
                <th>Borrower</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Category</th>
                <th>Unit of Measurement (UOM)</th>
                <th>Date Borrowed</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch data from the BorrowedInventory table
            $sql = "SELECT BI.*, U.First_name, U.Last_name, I.Item_Code, I.Item_Name, I.Category, I.UOM 
                    FROM BorrowedInventory BI
                    INNER JOIN Users U ON BI.User_id = U.Id
                    INNER JOIN Inventory I ON BI.Inventory_Id = I.id
                    ORDER BY BI.Date_Borrowed DESC"; // Assuming you want to display the most recent borrowings first
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['First_name'] . " " . $row['Last_name'] . "</td>";
                    echo "<td>" . $row['Item_Code'] . "</td>";
                    echo "<td>" . $row['Item_Name'] . "</td>";
                    echo "<td>" . $row['Category'] . "</td>";
                    echo "<td>" . $row['UOM'] . "</td>";
                    echo "<td>" . $row['Date_Borrowed'] . "</td>";
                   
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No items found in inventory history</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</body>

</html>

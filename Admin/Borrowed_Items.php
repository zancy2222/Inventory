<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="Assets/Style.css">
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="Assets/script.js" defer></script>
  </head>
  <body>
    <nav class="sidebar locked">
      <div class="logo_items flex">
        <span class="nav_image">
          <img src="Assets/Flogo.jpg" alt="logo_img" />
        </span>
        <span class="logo_name">Admin</span>
        <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
        <i class="bx bx-x" id="sidebar-close"></i>
      </div>

      <div class="menu_container">
        <div class="menu_items">
          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Dashboard</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="User.php" class="link flex">
                <i class='bx bx-user-circle'></i>
                <span>Users</span>
              </a>
            </li>
            <li class="item">
              <a href="All_Items.php" class="link flex">
                <i class='bx bxs-package'></i>
                <span>All Items</span>
              </a>
            </li>
          </ul>


          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Status</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="Borrowed_Items.php" class="link flex">
                <i class='bx bx-repeat'></i>
                <span>Borrowed Items</span>
              </a>
            </li>

          
          </ul>
        </div>

        <div class="sidebar_profile flex">
          <span class="nav_image">
            <img src="Assets/Flogo.jpg" alt="logo_img" />
          </span>
          <div class="data_text">
            <span class="name">ADMIN</span>
            <span class="email">admin@gmail.com</span>
          </div>
        </div>
      </div>
    </nav>

<!-- Table -->
<div class="table-container">
  <div class="table-header">
    <button class="add-btn">Add</button>
    <div class="search-box">
      <input type="text" placeholder="Search...">
      <button><i class='bx bx-search'></i></button>
    </div>
  </div>
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
            include 'Partials/db_conn.php';
            // Fetch data from the BorrowedInventory table
            $sql = "SELECT BI.*, U.First_name, U.Last_name, I.Item_Code, I.Item_Name, I.Category, I.UOM 
                    FROM BorrowedInventory BI
                    INNER JOIN Users U ON BI.User_id = U.Id
                    INNER JOIN Inventory I ON BI.Inventory_Id = I.id
                    ORDER BY BI.Date_Borrowed DESC"; 
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


  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="Assets/Style.css">
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <style>
      :root {
        --primary-color: #798777;
        --secondary-color: #A2B29F;
        --tertiary-color: #BDD2B6;
        --bg-color: #F8EDE3;
      }
  
/* Modal styles for adding medical item */
#myModalMedical {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

#myModalMedical .modal-content {
  background-color: white;
  margin: 10% auto;
  padding: 20px;
  border-radius: 10px;
  width: 60%;
  max-width: 400px;
}

/* Close button style */
#myModalMedical .close {
  color: var(--primary-color);
  float: right;
  font-size: 28px;
  font-weight: bold;
}

#myModalMedical .close:hover,
#myModalMedical .close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Button styles */
#myModalMedical .button-container {
  text-align: center;
}

#myModalMedical .add-btn {
  padding: 10px 20px;
  background-color: var(--primary-color);
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

/* Input styles */
#myModalMedical .input-group {
  margin-bottom: 20px;
}

#myModalMedical label {
  display: block;
  font-weight: bold;
  color: var(--primary-color);
  margin-bottom: 5px;
}

#myModalMedical input[type="number"],
#myModalMedical input[type="text"] {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid var(--secondary-color);
  box-sizing: border-box;
}

/* Icon styles */
#myModalMedical .icon {
  color: var(--primary-color);
  margin-right: 10px;
}

      </style>
    <script src="Assets/script.js" defer></script>
  </head>
  <body>
    <nav class="sidebar locked">
      <div class="logo_items flex">
        <span class="nav_image">
          <img src="Assets/Main.jpg" alt="logo_img" />
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
              <span class="title">Stocks</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="Tools.php" class="link flex">
                <i class='bx bxs-wrench'></i>
                <span>Tools</span>
              </a>
            </li>
            <li class="item">
              <a href="Equipment.php" class="link flex">
                <i class='bx bxs-briefcase'></i>
                <span>Equipment</span>
              </a>
            </li>
            <li class="item">
              <a href="MedicItems.php" class="link flex">
                <i class='bx bxs-injection'></i>
                <span>Medical Items</span>
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
            <li class="item">
              <a href="Available_Items.php" class="link flex">
                <i class='bx bx-task'></i>
                <span>Available Items</span>
              </a>
            </li>
            <li class="item">
              <a href="#" class="link flex">
                <i class='bx bx-receipt'></i>
                <span>History</span>
              </a>
            </li>
          </ul>
        </div>

        <div class="sidebar_profile flex">
          <span class="nav_image">
            <img src="Assets/Main.jpg" alt="logo_img" />
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
    <button class="add-btn" onclick="openModalMedical()">Add</button>
    <div class="search-box">
      <input type="text" placeholder="Search...">
      <button><i class='bx bx-search'></i></button>
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th>Medical Item Name</th>
        <th>Medical Item Qty</th>
        <th>Medical Item Descriptions</th>
        <th>Actions</th> <!-- Added Actions column -->
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>Male</td>
        <td>
          <button class="edit-btn">Edit</button>
          <button class="delete-btn">Delete</button>
        </td>
      </tr>
      <tr>
        <td>Jane</td>
        <td>Doe</td>
        <td>Female</td>
        <td>
          <button class="edit-btn">Edit</button>
          <button class="delete-btn">Delete</button>
        </td>
      </tr>
      <tr>
        <td>Jack</td>
        <td>Doe</td>
        <td>Male</td>
        <td>
          <button class="edit-btn">Edit</button>
          <button class="delete-btn">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
  
</div>

<!-- Modal for adding medical item -->
<div id="myModalMedical" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModalMedical()">&times;</span>
    <h2>Add New Medical Item</h2>
    <div class="input-group">
      <label for="medicalItemName">Medical Item Name:</label>
      <input type="text" id="medicalItemName" name="medicalItemName" placeholder="Enter medical item name...">
    </div>
    <div class="input-group">
      <label for="medicalItemQty">Medical Item Quantity:</label>
      <input type="number" id="medicalItemQty" name="medicalItemQty" placeholder="Enter medical item quantity..." min="1">
    </div>
    <div class="input-group">
      <label for="medicalItemDesc">Medical Item Description:</label>
      <input type="text" id="medicalItemDesc" name="medicalItemDesc" placeholder="Enter medical item description...">
    </div>
    <div class="button-container">
      <button class="add-btn">Add Medical Item</button>
    </div>
  </div>
</div>

<script>
  // Function to open the medical item modal
  function openModalMedical() {
    document.getElementById("myModalMedical").style.display = "block";
  }

  // Function to close the medical item modal
  function closeModalMedical() {
    document.getElementById("myModalMedical").style.display = "none";
  }
</script>


  </body>
</html>

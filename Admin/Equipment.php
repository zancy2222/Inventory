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

    #myModalEquipment {
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

    #myModalEquipment .modal-content {
      background-color: white;
      margin: 10% auto;
      padding: 20px;
      border-radius: 10px;
      width: 60%;
      max-width: 400px;
    }

    /* Close button style */
    #myModalEquipment .close {
      color: var(--primary-color);
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    #myModalEquipment .close:hover,
    #myModalEquipment .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    /* Button styles */
    #myModalEquipment .button-container {
      text-align: center;
    }

    #myModalEquipment .add-btn {
      padding: 10px 20px;
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    /* Input styles */
    #myModalEquipment .input-group {
      margin-bottom: 20px;
    }

    #myModalEquipment label {
      display: block;
      font-weight: bold;
      color: var(--primary-color);
      margin-bottom: 5px;
    }

    #myModalEquipment input[type="number"],
    #myModalEquipment input[type="text"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid var(--secondary-color);
      box-sizing: border-box;
    }

    /* Icon styles */
    #myModalEquipment .icon {
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
      <button class="add-btn" onclick="openModalEquipment()">Add</button>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <button><i class='bx bx-search'></i></button>
      </div>
    </div>
    <table>
      <thead>
        <tr>
          <th>Equipment Name</th>
          <th>Equipment Qty</th>
          <th>Equipment Descriptions</th>
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

  <!-- Modal for adding equipment -->
  <div id="myModalEquipment" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModalEquipment()">&times;</span>
      <h2>Add New Equipment</h2>
      <div class="input-group">
        <label for="equipmentName">Equipment Name:</label>
        <input type="text" id="equipmentName" name="equipmentName" placeholder="Enter equipment name...">
      </div>
      <div class="input-group">
        <label for="equipmentQty">Equipment Quantity:</label>
        <input type="number" id="equipmentQty" name="equipmentQty" placeholder="Enter equipment quantity..." min="1">
      </div>
      <div class="input-group">
        <label for="equipmentDesc">Equipment Description:</label>
        <input type="text" id="equipmentDesc" name="equipmentDesc" placeholder="Enter equipment description...">
      </div>
      <div class="button-container">
        <button class="add-btn">Add Equipment</button>
      </div>
    </div>
  </div>

  <script>
    // Function to open the equipment modal
    function openModalEquipment() {
      document.getElementById("myModalEquipment").style.display = "block";
    }

    // Function to close the equipment modal
    function closeModalEquipment() {
      document.getElementById("myModalEquipment").style.display = "none";
    }
  </script>


</body>

</html>
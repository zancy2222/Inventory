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
/* Edit equipment modal styles */
#editModalEquipment {
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

#editModalEquipment .modal-content {
  background-color: white;
  margin: 10% auto;
  padding: 20px;
  border-radius: 10px;
  width: 60%;
  max-width: 400px;
}

/* Close button style */
#editModalEquipment .close {
  color: var(--primary-color);
  float: right;
  font-size: 28px;
  font-weight: bold;
}

#editModalEquipment .close:hover,
#editModalEquipment .close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Button styles */
#editModalEquipment .button-container {
  text-align: center;
}

#editModalEquipment .save-edit-btn {
  padding: 10px 20px;
  background-color: var(--primary-color);
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

/* Input styles */
#editModalEquipment .input-group {
  margin-bottom: 20px;
}

#editModalEquipment label {
  display: block;
  font-weight: bold;
  color: var(--primary-color);
  margin-bottom: 5px;
}

#editModalEquipment input[type="number"],
#editModalEquipment input[type="text"] {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid var(--secondary-color);
  box-sizing: border-box;
}

/* Icon styles */
#editModalEquipment .icon {
  color: var(--primary-color);
  margin-right: 10px;
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
      <?php
    // Include the database connection file
    require_once 'Partials/db_conn.php';

    // Fetch data from the Equipment table
    $sql = "SELECT * FROM Equipment";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Equipment_name'] . "</td>";
        echo "<td>" . $row['Equipment_qty'] . "</td>";
        echo "<td>" . $row['Equipment_descriptions'] . "</td>";
        echo "<td>
                <button class='edit-btn' data-id='" . $row['Id'] . "'>Edit</button>
                <button class='delete-btn' data-id='" . $row['Id'] . "'>Delete</button>
              </td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='4'>No equipment found</td></tr>";
    }

    // Close database connection
    $conn->close();
  ?>
      </tbody>
    </table>

  </div>

 <!-- Modal for adding equipment -->
 <div id="myModalEquipment" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModalEquipment()">&times;</span>
      <h2>Add New Equipment</h2>
      <form id="addEquipmentForm">
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
          <button type="button" class="add-btn" onclick="addEquipment()">Add Equipment</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal for editing equipment -->
  <div id="editModalEquipment" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeEditModalEquipment()">&times;</span>
      <h2>Edit Equipment</h2>
      <form id="editEquipmentForm">
        <input type="hidden" id="editEquipmentId" name="editEquipmentId">
        <div class="input-group">
          <label for="editEquipmentName">Equipment Name:</label>
          <input type="text" id="editEquipmentName" name="editEquipmentName">
        </div>
        <div class="input-group">
          <label for="editEquipmentQty">Equipment Quantity:</label>
          <input type="number" id="editEquipmentQty" name="editEquipmentQty" min="1">
        </div>
        <div class="input-group">
          <label for="editEquipmentDesc">Equipment Description:</label>
          <input type="text" id="editEquipmentDesc" name="editEquipmentDesc">
        </div>
        <div class="button-container">
          <button type="button" class="save-edit-btn" onclick="updateEquipment()">Save</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    // Function to open the equipment modal
    function openModalEquipment() {
      document.getElementById("myModalEquipment").style.display = "block";
    }

    // Function to close the equipment modal
    function closeModalEquipment() {
      document.getElementById("myModalEquipment").style.display = "none";
    }

    // Function to open the edit equipment modal
    function openEditModalEquipment(equipmentId) {
      document.getElementById("editModalEquipment").style.display = "block";
      fetchEquipmentData(equipmentId);
    }

    // Function to close the edit equipment modal
    function closeEditModalEquipment() {
      document.getElementById("editModalEquipment").style.display = "none";
    }

    // Function to add new equipment using AJAX
    function addEquipment() {
  var equipmentName = $('#equipmentName').val();
  var equipmentQty = $('#equipmentQty').val();
  var equipmentDesc = $('#equipmentDesc').val();

  $.ajax({
    type: 'POST',
    url: 'Partials/add_equipment.php',
    data: {
      equipmentName: equipmentName,
      equipmentQty: equipmentQty,
      equipmentDesc: equipmentDesc
    },
    success: function(response) {
      closeModalEquipment();
      window.location.reload();

    },
    error: function(xhr, status, error) {
      console.error('Error adding equipment:', error);
    }
  });
}

    // Function to fetch equipment using AJAX
    function fetchEquipment() {
      $.ajax({
        type: 'GET',
        url: 'Partials/fetch_equipment.php',
        success: function(response) {
          $('#equipmentTableBody').html(response);
          
        },
        error: function(xhr, status, error) {
          console.error('Error fetching equipment:', error);
        }
      });
    }

// Function to fetch equipment data for editing
function fetchEquipmentData(equipmentId) {
  $.ajax({
    type: 'GET',
    url: 'Partials/fetch_equipment_data.php?id=' + equipmentId,
    success: function(data) {
      var equipmentData = JSON.parse(data);
      $('#editEquipmentId').val(equipmentData.Id);
      $('#editEquipmentName').val(equipmentData.Equipment_name);
      $('#editEquipmentQty').val(equipmentData.Equipment_qty);
      $('#editEquipmentDesc').val(equipmentData.Equipment_descriptions);
    },
    error: function(xhr, status, error) {
      console.error('Error fetching equipment data:', error);
    }
  });
}


    // Function to update equipment using AJAX
    function updateEquipment() {
      var equipmentId = $('#editEquipmentId').val();
      var equipmentName = $('#editEquipmentName').val();
      var equipmentQty = $('#editEquipmentQty').val();
      var equipmentDesc = $('#editEquipmentDesc').val();

      $.ajax({
        type: 'POST',
        url: 'Partials/update_equipment.php',
        data: {
          id: equipmentId,
          name: equipmentName,
          qty: equipmentQty,
          desc: equipmentDesc
        },
        success: function(response) {
          closeEditModalEquipment();
          window.location.reload();

        },
        error: function(xhr, status, error) {
          console.error('Error updating equipment:', error);
        }
      });
    }
// Event listener for Edit button click
$(document).ready(function() {
    $(document).on('click', '.edit-btn', function() {
      var equipmentId = $(this).data('id');
      openEditModalEquipment(equipmentId);
    });
  });
    // Initial call to fetch equipment when the page loads
    fetchEquipment();
  </script>


</body>

</html>
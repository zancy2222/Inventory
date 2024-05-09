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
#editModalMedical {
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

#editModalMedical .modal-content {
  background-color: white;
  margin: 10% auto;
  padding: 20px;
  border-radius: 10px;
  width: 60%;
  max-width: 400px;
}

/* Close button style */
#editModalMedical .close {
  color: var(--primary-color);
  float: right;
  font-size: 28px;
  font-weight: bold;
}

#editModalMedical .close:hover,
#editModalMedical .close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Button styles */
#editModalMedical .button-container {
  text-align: center;
}

#editModalMedical .save-edit-btn {
  padding: 10px 20px;
  background-color: var(--primary-color);
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

/* Input styles */
#editModalMedical .input-group {
  margin-bottom: 20px;
}

#editModalMedical label {
  display: block;
  font-weight: bold;
  color: var(--primary-color);
  margin-bottom: 5px;
}

#editModalMedical input[type="number"],
#editModalMedical input[type="text"] {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid var(--secondary-color);
  box-sizing: border-box;
}

/* Icon styles */
#editModalMedical .icon {
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
    <tbody id="medicalItemsTableBody"></tbody> <!-- Populated dynamically -->
  </table>

</div>

<!-- Modal for adding medical item -->
<div id="myModalMedical" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModalMedical()">&times;</span>
    <h2>Add New Medical Item</h2>
    <form id="addMedicalItemForm">
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
        <button type="button" class="add-btn" onclick="addMedicalItem()">Add Medical Item</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal for editing medical item -->
<div id="editModalMedical" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeEditModalMedical()">&times;</span>
    <h2>Edit Medical Item</h2>
    <form id="editMedicalItemForm">
      <input type="hidden" id="editMedicalItemId" name="editMedicalItemId">
      <div class="input-group">
        <label for="editMedicalItemName">Medical Item Name:</label>
        <input type="text" id="editMedicalItemName" name="editMedicalItemName">
      </div>
      <div class="input-group">
        <label for="editMedicalItemQty">Medical Item Quantity:</label>
        <input type="number" id="editMedicalItemQty" name="editMedicalItemQty" min="1">
      </div>
      <div class="input-group">
        <label for="editMedicalItemDesc">Medical Item Description:</label>
        <input type="text" id="editMedicalItemDesc" name="editMedicalItemDesc">
      </div>
      <div class="button-container">
        <button type="button" class="save-edit-btn" onclick="updateMedicalItem()">Save</button>
      </div>
    </form>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  // Function to handle deletion of a tool
  function deleteTool(toolId) {
    // Confirm with the user before deleting
    if (confirm("Are you sure you want to delete this tool?")) {
      // Send AJAX request to delete the tool
      $.ajax({
        type: 'POST',
        url: 'Partials/delete_medical_item.php',
        data: {
          id: toolId
        },
        success: function(response) {
          // If deletion is successful, remove the corresponding row from the table
          $('#row_' + toolId).remove();
          window.location.reload();
        },
        error: function(xhr, status, error) {
          console.error('Error deleting tool:', error);
        }
      });
    }
  }

  // Event listener for delete buttons
  $(document).on('click', '.delete-btn', function() {
    var toolId = $(this).data('id');
    deleteTool(toolId);
  });
</script>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  // Function to open the edit medical item modal
  function openEditModalMedical(medicalItemId) {
    document.getElementById("editModalMedical").style.display = "block";
    fetchMedicalItemData(medicalItemId);
  }

  // Function to close the edit medical item modal
  function closeEditModalMedical() {
    document.getElementById("editModalMedical").style.display = "none";
  }

  // Function to add new medical item using AJAX
  function addMedicalItem() {
    var medicalItemName = $('#medicalItemName').val();
    var medicalItemQty = $('#medicalItemQty').val();
    var medicalItemDesc = $('#medicalItemDesc').val();

    $.ajax({
      type: 'POST',
      url: 'Partials/add_medical_item.php',
      data: {
        medicalItemName: medicalItemName,
        medicalItemQty: medicalItemQty,
        medicalItemDesc: medicalItemDesc
      },
      success: function(response) {
        closeModalMedical();
        fetchMedicalItems(); // Refresh medical items table after adding new medical item
      },
      error: function(xhr, status, error) {
        console.error('Error adding medical item:', error);
      }
    });
  }

  // Function to fetch medical items using AJAX
  function fetchMedicalItems() {
    $.ajax({
      type: 'GET',
      url: 'Partials/fetch_medical_items.php',
      success: function(response) {
        $('#medicalItemsTableBody').html(response);
      },
      error: function(xhr, status, error) {
        console.error('Error fetching medical items:', error);
      }
    });
  }

  // Function to fetch medical item data for editing
  function fetchMedicalItemData(medicalItemId) {
    $.ajax({
      type: 'GET',
      url: 'Partials/fetch_medical_item_data.php?id=' + medicalItemId,
      success: function(data) {
        var medicalItemData = JSON.parse(data);
        $('#editMedicalItemId').val(medicalItemData.Id);
        $('#editMedicalItemName').val(medicalItemData.Medical_item_name);
        $('#editMedicalItemQty').val(medicalItemData.Medical_item_qty);
        $('#editMedicalItemDesc').val(medicalItemData.Medical_item_descriptions);
      },
      error: function(xhr, status, error) {
        console.error('Error fetching medical item data:', error);
      }
    });
  }

  // Function to update medical item using AJAX
  function updateMedicalItem() {
    var medicalItemId = $('#editMedicalItemId').val();
    var medicalItemName = $('#editMedicalItemName').val();
    var medicalItemQty = $('#editMedicalItemQty').val();
    var medicalItemDesc = $('#editMedicalItemDesc').val();

    $.ajax({
      type: 'POST',
      url: 'Partials/update_medical_item.php',
      data: {
        id: medicalItemId,
        name: medicalItemName,
        qty: medicalItemQty,
        desc: medicalItemDesc
      },
      success: function(response) {
        closeEditModalMedical();
        fetchMedicalItems(); // Refresh medical items table after updating medical item
      },
      error: function(xhr, status, error) {
        console.error('Error updating medical item:', error);
      }
    });
  }

  // Initial call to fetch medical items when the page loads
  fetchMedicalItems();
</script>

  </body>
</html>

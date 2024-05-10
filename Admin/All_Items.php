<?php
// Include the database connection file
require_once 'Partials/db_conn.php';

// Define the default sorting column and order
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'Item_Name'; // Default sorting column is Item Name
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'ASC'; // Default sorting order is ascending

// Fetch data from the Inventory table with sorting
$sql = "SELECT * FROM Inventory ORDER BY $sortColumn $sortOrder";
$result = $conn->query($sql);

// Define sorting parameters for the table headers
$sortParams = [
    'Item_Code' => 'Item Code',
    'Item_Name' => 'Item Name',
    'Category' => 'Category',
    'Quantity' => 'Quantity',
    'UOM' => 'UOM',
    'Date_Added' => 'Date Added'
];

?>
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
      --primary-color: #9c2989;
      --secondary-color: #9c2989;
      --tertiary-color: #9c2989;
      --bg-color: #9c2989;
    }

    .modal {
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

    .modal-content {
      background-color: white;
      margin: 10% auto;
      padding: 20px;
      border-radius: 10px;
      width: 60%;
      max-width: 400px;
    }

    /* Close button style */
    .close {
      color: var(--primary-color);
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    /* Button styles */
    .button-container {
      text-align: center;
    }

    .save-edit-btn {
      padding: 10px 20px;
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    /* Input styles */
    .input-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      color: var(--primary-color);
      margin-bottom: 5px;
    }

    input[type="number"],
    input[type="date"],
    input[type="text"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid var(--secondary-color);
      box-sizing: border-box;
    }
  </style>
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
    <button class="add-btn" onclick="openAddForm()">Add</button>
    <div class="search-box">
      <input type="text" placeholder="Search...">
      <button><i class='bx bx-search'></i></button>
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <!-- Table headers with sorting links -->
        <?php foreach ($sortParams as $column => $label) : ?>
          <th>
            <a style="text-decoration: none; color:#9c2989;" href="?sort=<?php echo $column ?>&order=<?php echo ($sortColumn == $column && $sortOrder == 'ASC') ? 'DESC' : 'ASC' ?>">
              <?php echo $label ?>
              <?php if ($sortColumn == $column) : ?>
                <!-- Display sorting arrow -->
                <?php echo ($sortOrder == 'ASC') ? '<i class="bx bx-sort-up"></i>' : '<i class="bx bx-sort-down"></i>' ?>
              <?php endif; ?>
            </a>
          </th>
        <?php endforeach; ?>
        <!-- Added Actions column -->
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        // Output table rows
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['Item_Code'] . "</td>";
          echo "<td>" . $row['Item_Name'] . "</td>";
          echo "<td>" . $row['Category'] . "</td>";
          echo "<td>" . $row['Quantity'] . "</td>";
          echo "<td>" . $row['UOM'] . "</td>";
          echo "<td>" . $row['Date_Added'] . "</td>";
          // Edit button
          echo "<td><button class='edit-btn' onclick='openEditForm(" . $row['id'] . ")'>Edit</button>
          <button class='delete-btn' data-id='" . $row['id'] . "'>Delete</button>
          </td>";
          echo "</tr>";
        }
      } else {
        // Output message if no records found
        echo "<tr><td colspan='8'>No items found in inventory</td></tr>";
      }

      // Close database connection
      $conn->close();
      ?>
    </tbody>
  </table>
</div>


<!-- Pop-up form for adding items -->
<div id="addFormModal" class="modal">
  <div class="modal-content" id="editModalMedical">
    <span class="close" onclick="closeAddForm()">&times;</span>
    <h2>Add Item to Inventory</h2>
    <form id="addItemForm" onsubmit="addItem(event)">
      <div class="input-group">
        <label for="itemCode">Item Code:</label>
        <input type="text" id="itemCode" name="itemCode" required>
      </div>
      <div class="input-group">
        <label for="itemName">Item Name:</label>
        <input type="text" id="itemName" name="itemName" required>
      </div>
      <div class="input-group">
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>
      </div>
      <div class="input-group">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
      </div>
      <div class="input-group">
        <label for="uom">Unit of Measurement (UOM):</label>
        <input type="text" id="uom" name="uom" required>
      </div>
      <div class="input-group">
        <label for="dateAdded">Date Added:</label>
        <input type="date" id="dateAdded" name="dateAdded" required>
      </div>
      <div class="button-container">
        <button type="submit" class="save-edit-btn">Add Item</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal for editing item in inventory -->
<div id="editFormModal" class="modal">
  <div class="modal-content" id="editModalMedical">
    <span class="close" onclick="closeEditForm()">&times;</span>
    <h2>Edit Item in Inventory</h2>
    <form id="editItemForm">
      <input type="hidden" id="editItemId" name="editItemId">
      <div class="input-group">
        <label for="editItemCode">Item Code:</label>
        <input type="text" id="editItemCode" name="editItemCode" required>
      </div>
      <div class="input-group">
        <label for="editItemName">Item Name:</label>
        <input type="text" id="editItemName" name="editItemName" required>
      </div>
      <div class="input-group">
        <label for="editCategory">Category:</label>
        <input type="text" id="editCategory" name="editCategory" required>
      </div>
      <div class="input-group">
        <label for="editQuantity">Quantity:</label>
        <input type="number" id="editQuantity" name="editQuantity" required>
      </div>
      <div class="input-group">
        <label for="editUOM">Unit of Measurement (UOM):</label>
        <input type="text" id="editUOM" name="editUOM" required>
      </div>
      <div class="input-group">
        <label for="editDateAdded">Date Added:</label>
        <input type="date" id="editDateAdded" name="editDateAdded" required>
      </div>
      <div class="button-container">
        <button type="button" class="save-edit-btn" onclick="updateItem()">Update Item</button>
      </div>
    </form>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  // Function to open the add item form
  function openAddForm() {
    document.getElementById("addFormModal").style.display = "block";
  }

  // Function to close the add item form
  function closeAddForm() {
    document.getElementById("addFormModal").style.display = "none";
  }

  // Function to add item
  function addItem(event) {
    event.preventDefault(); // Prevent form submission
    var formData = new FormData(document.getElementById("addItemForm")); // Get form data
    // Send form data to PHP script using AJAX
    $.ajax({
      type: "POST",
      url: "Partials/add_item.php", // Path to PHP script
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        alert(response); // Show success message
        closeAddForm(); // Close the form
        window.location.reload();

      },
      error: function(xhr, status, error) {
        console.error("Error adding item:", error); // Log error message
      }
    });
  }
  
</script>
<script>
  // Function to open the edit item modal
  function openEditForm(itemId) {
    document.getElementById("editFormModal").style.display = "block";
    fetchItemData(itemId);
  }

  // Function to close the edit item modal
  function closeEditForm() {
    document.getElementById("editFormModal").style.display = "none";
  }

  // Function to fetch item data for editing
  function fetchItemData(itemId) {
    $.ajax({
      type: 'GET',
      url: 'Partials/get_item_data.php?id=' + itemId,
      success: function(data) {
        var itemData = JSON.parse(data);
        $('#editItemId').val(itemData.id);
        $('#editItemCode').val(itemData.Item_Code);
        $('#editItemName').val(itemData.Item_Name);
        $('#editCategory').val(itemData.Category);
        $('#editQuantity').val(itemData.Quantity);
        $('#editUOM').val(itemData.UOM);
        $('#editDateAdded').val(itemData.Date_Added);
      },
      error: function(xhr, status, error) {
        console.error('Error fetching item data:', error);
      }
    });
  }

  // Function to update item in inventory using AJAX
  function updateItem() {
    var itemId = $('#editItemId').val();
    var itemCode = $('#editItemCode').val();
    var itemName = $('#editItemName').val();
    var category = $('#editCategory').val();
    var quantity = $('#editQuantity').val();
    var uom = $('#editUOM').val();
    var dateAdded = $('#editDateAdded').val();

    $.ajax({
      type: 'POST',
      url: 'Partials/update_item.php',
      data: {
        id: itemId,
        itemCode: itemCode,
        itemName: itemName,
        category: category,
        quantity: quantity,
        uom: uom,
        dateAdded: dateAdded
      },
      success: function(response) {
        closeEditForm();
        window.location.reload();
      },
      error: function(xhr, status, error) {
        console.error('Error updating item:', error);
      }
    });
  }

  // Event listener for Delete button click
$(document).on('click', '.delete-btn', function() {
  // Get the ID of the item to be deleted from the data-id attribute of the button
  var itemId = $(this).data('id');

  // Confirm deletion with the user
  var confirmDelete = confirm("Are you sure you want to delete this item?");
  if (confirmDelete) {
    // Send AJAX request to delete_item.php
    $.ajax({
      type: 'POST',
      url: 'Partials/delete_item.php',
      data: {
        id: itemId
      },
      success: function(response) {
        window.location.reload();

      },
      error: function(xhr, status, error) {
        console.error('Error deleting item:', error);
      }
    });
  }
});

</script>

</body>

</html>
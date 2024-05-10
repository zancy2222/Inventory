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
    <style>
    /* Colors */
    :root {
      --primary-color: #798777;
      --secondary-color: #A2B29F;
      --tertiary-color: #BDD2B6;
      --bg-color: #F8EDE3;
    }
/* Styles for the edit modal */
#editModal {
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

#editModal .modal-content {
    background-color: white;
    margin: 10% auto;
    padding: 20px;
    border-radius: 10px;
    width: 60%;
    max-width: 400px;
}

/* Close button style */
#editModal .close {
    color: var(--primary-color);
    float: right;
    font-size: 28px;
    font-weight: bold;
}

#editModal .close:hover,
#editModal .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Button styles */
#editModal .button-container {
    text-align: center;
}

#editModal .save-edit-btn {
    padding: 10px 20px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

/* Input styles */
#editModal .input-group {
    margin-bottom: 20px;
}

#editModal label {
    display: block;
    font-weight: bold;
    color: var(--primary-color);
    margin-bottom: 5px;
}

#editModal input[type="number"],
#editModal input[type="text"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid var(--secondary-color);
    box-sizing: border-box;
}


    /* Styles for the modal */
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

    .add-btn {
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
    input[type="text"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid var(--secondary-color);
      box-sizing: border-box;
    }

    /* Icon styles */
    .icon {
      color: var(--primary-color);
      margin-right: 10px;
    }
    </style>
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
    <button class="add-btn" onclick="openAddModal()">Add</button>
    <div class="search-box">
      <input type="text" placeholder="Search...">
      <button><i class='bx bx-search'></i></button>
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th>Tools Name</th>
        <th>Tools Qty</th>
        <th>Tools Descriptions</th>
        <th>Actions</th> <!-- Added Actions column -->
      </tr>
    </thead>
    <tbody>
    <?php
// Include the database connection file
require_once 'Partials/db_conn.php';

            // Fetch data from the Tools table
            $sql = "SELECT * FROM Tools";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Tools_name'] . "</td>";
                    echo "<td>" . $row['Tools_qty'] . "</td>";
                    echo "<td>" . $row['Tools_descriptions'] . "</td>";
                    echo "<td>
                            <button class='edit-btn' data-id='" . $row['Id'] . "'>Edit</button>
                            <button class='delete-btn' data-id='" . $row['Id'] . "'>Delete</button>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No tools found</td></tr>";
            }

            // Close database connection
            $conn->close();
            ?>

    </tbody>
  </table>
  
</div>



<div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddModal()">&times;</span>
            <h2>Add New Tool</h2>
            <form id="addToolForm" action="Partials/add_tool.php" method="POST">
                <div class="input-group">
                    <label for="toolName">Tool Name:</label>
                    <input type="text" id="toolName" name="toolName" placeholder="Enter tool name...">
                </div>
                <div class="input-group">
                    <label for="toolQty">Tool Quantity:</label>
                    <input type="number" id="toolQty" name="toolQty" placeholder="Enter tool quantity..." min="1">
                </div>
                <div class="input-group">
                    <label for="toolDesc">Tool Description:</label>
                    <input type="text" id="toolDesc" name="toolDesc" placeholder="Enter tool description...">
                </div>
                <div class="button-container">
                    <button type="submit" class="add-btn">Add Tool</button>
                </div>
            </form>
        </div>
    </div>

    <div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        <h2>Edit Tool</h2>
        <!-- Add a hidden input field to store the tool ID -->
        <input type="hidden" id="editToolId" name="editToolId">
        <div class="input-group">
            <label for="editToolName">Tool Name:</label>
            <input type="text" id="editToolName" name="editToolName">
        </div>
        <div class="input-group">
            <label for="editToolQty">Tool Quantity:</label>
            <input type="number" id="editToolQty" name="editToolQty" min="1">
        </div>
        <div class="input-group">
            <label for="editToolDesc">Tool Description:</label>
            <input type="text" id="editToolDesc" name="editToolDesc">
        </div>
        <div class="button-container">
            <button class="save-edit-btn">Save</button>
        </div>
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
        url: 'Partials/delete_tool.php',
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
    // Event listener for Save button click
    $(document).on('click', '.save-edit-btn', function() {
    var toolId = $(this).closest('.modal-content').find('#editToolId').val(); // Get the tool ID from a hidden input field
    var toolName = $('#editToolName').val();
    var toolQty = $('#editToolQty').val();
    var toolDesc = $('#editToolDesc').val();

    $.ajax({
        type: 'POST',
        url: 'Partials/update_tool.php',
        data: {
            id: toolId,
            name: toolName,
            qty: toolQty,
            desc: toolDesc
        },
        success: function(response) {
            // Close the modal
            closeEditModal();
            // Reload the window
            window.location.reload();
        },
        error: function(xhr, status, error) {
            console.error('Error updating tool:', error);
        }
    });
});


// Function to fetch tool data using AJAX
function fetchToolData(toolId) {
    $.ajax({
        type: 'GET',
        url: 'Partials/fetch_tool.php?id=' + toolId,
        success: function(data) {
            // Parse the JSON response
            var toolData = JSON.parse(data);
            // Set the values in the edit modal input fields
            $('#editToolId').val(toolData.Id);
            $('#editToolName').val(toolData.Tools_name);
            $('#editToolQty').val(toolData.Tools_qty);
            $('#editToolDesc').val(toolData.Tools_descriptions);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching tool data:', error);
        }
    });
}

</script>


<script>
        // Function to open and close the modal
        function openAddModal() {
            document.getElementById("addModal").style.display = "block";
        }

        // Function to close the add modal
        function closeAddModal() {
            document.getElementById("addModal").style.display = "none";
        }

        // Function to open the edit modal
        function openEditModal(toolId) {
            document.getElementById("editModal").style.display = "block";
            fetchToolData(toolId);
        }

        // Function to close the edit modal
        function closeEditModal() {
            document.getElementById("editModal").style.display = "none";
        }

        // Event listener for Edit button click
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('edit-btn')) {
                var toolId = e.target.getAttribute('data-id');
                openEditModal(toolId);
            }
        });
        
    </script>
  </body>
</html>

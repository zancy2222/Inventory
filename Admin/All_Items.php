
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
    <button class="add-btn">Add</button>
    <div class="search-box">
      <input type="text" placeholder="Search...">
      <button><i class='bx bx-search'></i></button>
    </div>
  </div>
  <table>
    <thead>

    </thead>
    <tbody>

    </tbody>
  </table>
</div>


  </body>
</html>

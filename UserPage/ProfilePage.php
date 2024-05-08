<?php
// Include the database connection file
require_once '../Partials/db_conn.php';

// Check if the user ID is provided in the URL
if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // SQL query to fetch user data based on ID
    $sql = "SELECT * FROM Users WHERE Id = $user_id";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        // Fetch user data
        $user_data = $result->fetch_assoc();

        // Assign user data to variables
        $first_name = $user_data['First_name'];
        $middle_name = $user_data['Middle_name'];
        $last_name = $user_data['Last_name'];
        $address = $user_data['Address'];
        $gender = $user_data['Gender'];
        $contact = $user_data['Contact'];
        $username = $user_data['Username'];
        $email = $user_data['Email'];
        $password = $user_data['Password'];
    }
}

// Check if the form is submitted for updating profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to update user data in the database
    $sql = "UPDATE Users SET 
            First_name = '$first_name',
            Middle_name = '$middle_name',
            Last_name = '$last_name',
            Address = '$address',
            Gender = '$gender',
            Contact = '$contact',
            Username = '$username',
            Email = '$email',
            Password = '$password'
            WHERE Id = $user_id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Profile updated successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #F8EDE3;
    }
    
    .navbar {
        background-color: #798777;
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
    
    .profile-section {
        background-color: #A2B29F;
        padding: 20px;
        margin: 20px auto;
        border-radius: 10px;
        width: 80%;
        max-width: 600px;
    }
    
    .profile-section h2 {
        color: #FFF;
        text-align: center;
        margin-bottom: 20px;
    }
    
    .profile-info {
        background-color: #BDD2B6;
        padding: 20px;
        border-radius: 10px;
    }
    
    .input-group {
        margin-bottom: 20px;
    }
    
    .input-group label {
        display: block;
        font-weight: bold;
        color: #798777;
        margin-bottom: 5px;
    }
    
    .input-group input,
    .input-group select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #798777;
        box-sizing: border-box;
    }
    
    .input-group select {
        background-color: #FFF;
    }
    
    .save-btn {
        padding: 10px 20px;
        background-color: #798777;
        color: #FFF;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }
    
    .save-btn:hover {
        background-color: #A2B29F;
    }
    
   </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-brand"><i class="fas fa-cube nav-icon"></i>Stock & Inventory Management System</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-home nav-icon"></i>Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-user-friends nav-icon"></i>Borrower</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-user nav-icon"></i>Profile</a></li>
            <li class="nav-item"><a href="../Login.php" class="nav-link"><i class="fas fa-sign-in-alt nav-icon"></i>Log out</a></li>
        </ul>
    </nav>

    <div class="profile-section">
    <h2>Profile</h2>
    <div class="profile-info">
        <form method="POST">
            <div class="input-group">
                <label for="first_name"><i class="fas fa-user nav-icon"></i>First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
            </div>
            <div class="input-group">
                <label for="middle_name"><i class="fas fa-user nav-icon"></i>Middle Name:</label>
                <input type="text" id="middle_name" name="middle_name" value="<?php echo $middle_name; ?>">
            </div>
            <div class="input-group">
                <label for="last_name"><i class="fas fa-user nav-icon"></i>Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
            </div>
            <div class="input-group">
                <label for="address"><i class="fas fa-address-card nav-icon"></i>Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $address; ?>">
            </div>
            <div class="input-group">
                <label for="gender"><i class="fas fa-venus-mars nav-icon"></i>Gender:</label>
                <select id="gender" name="gender">
                    <option value="male" <?php if($gender == 'male') echo 'selected'; ?>>Male</option>
                    <option value="female" <?php if($gender == 'female') echo 'selected'; ?>>Female</option>
                    <option value="other" <?php if($gender == 'other') echo 'selected'; ?>>Other</option>
                </select>
            </div>
            <div class="input-group">
                <label for="contact"><i class="fas fa-phone nav-icon"></i>Contact:</label>
                <input type="tel" id="contact" name="contact" value="<?php echo $contact; ?>">
            </div>
            <div class="input-group">
                <label for="username"><i class="fas fa-user nav-icon"></i>Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
                <label for="email"><i class="fas fa-envelope nav-icon"></i>Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <label for="password"><i class="fas fa-lock nav-icon"></i>Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $password; ?>">
            </div>
            <button type="submit" class="save-btn"><i class="fas fa-save nav-icon"></i>Save</button>
        </form>
    </div>
</div>
</body>
</html>

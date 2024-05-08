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
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-brand"><i class="fas fa-cube nav-icon"></i>Stock & Inventory Management System</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-home nav-icon"></i>Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-user-friends nav-icon"></i>Borrower</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-user nav-icon"></i>Profile</a></li>
            <li class="nav-item"><a href="../Home.php" class="nav-link"><i class="fas fa-sign-in-alt nav-icon"></i>Log-out</a></li>
        </ul>
    </nav>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Stock and Inventory Management System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #F8EDE3;
        }

        .container {
            width: 400px;
            margin: 100px auto;
            background-color: #FFF;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #798777;
            margin-bottom: 30px;
            font-size: 24px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
            width: 100%;
        }

        .input-group i {
            position: absolute;
            left: 40px;
            top: 50%;
            transform: translateY(-50%);
            color: #A2B29F;
        }

        input {
            width: calc(100% - 40px);
            padding: 15px;
            padding-left: 40px;
            border: none;
            border-radius: 30px;
            background-color: #F8EDE3;
            font-size: 16px;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
        }

        button {
            width: calc(100% - 40px);
            padding: 15px;
            border: none;
            border-radius: 30px;
            background-color: #798777;
            color: #FFF;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-sizing: border-box;
        }

        button:hover {
            background-color: #596D60;
        }

        p {
            margin-top: 20px;
            color: #798777;
            font-size: 14px;
        }

        a {
            color: #798777;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Login Here</h1>
        <form action="Partials/login_process.php" method="POST" class="login-form">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="Register.php">Register here</a></p>
    </div>
</body>

</html>
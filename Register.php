<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Stock and Inventory Management System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #9c2989;
        }

        .container {
            width: 800px;
            margin: 100px auto;
            background-color: #FFF;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color:#9c2989;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .register-form {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }

        .input-group {
            position: relative;
            width: 100%;
        }

        .input-group i {
            position: absolute;
            left: 40px;
            top: 50%;
            transform: translateY(-50%);
            color: #9c2989;
        }

        input,
        select {
            width: calc(100% - 40px);
            padding: 20px;
            padding-left: 50px;
            border: none;
            border-radius: 40px;
            background-color: #fca6ffbe;
            font-size: 18px;
            box-sizing: border-box;
        }

        input:focus,
        select:focus {
            outline: none;
        }

        button {
            grid-column: span 3;
            padding: 20px;
            border: none;
            border-radius: 40px;
            background-color:#9c2989;
            color: #FFF;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-sizing: border-box;
        }

        button:hover {
            background-color: #fca6ffbe;
        }

        p {
            grid-column: span 3;
            margin-top: 20px;
            color:#9c2989;
            font-size: 16px;
        }

        a {
            color:#9c2989;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Style the dropdown */
        select {
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23A2B29F" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6z"/><path fill="none" d="M0 0h24v24H0z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 20px center;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Register Here</h1>
        <form action="Partials/reg_process.php" method="POST" class="register-form">
    <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="first_name" placeholder="First Name" required>
    </div>
    <div class="input-group">
        <i class="fas fa-address-card"></i>
        <input type="text" name="address" placeholder="Address" required>
    </div>
    <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="username" placeholder="Username" required>
    </div>
    <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="middle_name" placeholder="Middle Name" required>
    </div>
    <div class="input-group">
        <i class="fas fa-venus-mars"></i>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
    <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required>
    </div>
    <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="last_name" placeholder="Last Name" required>
    </div>
    <div class="input-group">
        <i class="fas fa-phone"></i>
        <input type="tel" name="contact" placeholder="Contact Number" required>
    </div>
    <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required>
    </div>
    <button type="submit">Register</button>
</form>

        <p>Already have an account? <a href="Login.php">Login here</a></p>
    </div>
</body>

</html>
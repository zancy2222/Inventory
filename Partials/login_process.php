<?php
// Include the database connection file
require_once 'db_conn.php';

// Include PHPMailer files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Check if the default admin account is used
    if ($username === 'admin' && $email === 'admin@gmail.com' && $password === 'admin') {
        // Redirect to the admin page
        header("Location: ../Admin/User.php");
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format, display error message
        echo "<script>alert('Invalid email format');</script>";
        echo "<script>window.location.href = '../Login.php';</script>";
        exit();
    }

    // Check if email has the required domain
    $domain = '@student.fatima.edu.ph';
    if (substr($email, -strlen($domain)) !== $domain) {
        // Email does not have the required domain, display error message
        echo "<script>alert('Email must be from @student.fatima.edu.ph domain');</script>";
        echo "<script>window.location.href = '../Login.php';</script>";
        exit();
    }

    // Check if the user exists
    $sql = "SELECT * FROM Users WHERE Username='$username' AND Password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, send email notification
        $user_data = $result->fetch_assoc();
        $user_id = $user_data['Id'];
        $user_email = $user_data['Email'];

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'danielzanbaltazar.forwork@gmail.com'; // SMTP username
            $mail->Password   = 'kouv dwab exlo vxxh'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('danielzanbaltazar.forwork@gmail.com', 'LOGIN CONFIRMATION');
            $mail->addAddress($user_email); // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Login Notification';
            $mail->Body = 'You have successfully logged in. Click <a href="http://localhost/Inventory/UserPage/ProfilePage.php?id=' . $user_id . '">here</a> to view your profile.';
            $mail->AltBody = 'You have successfully logged in.';

            // Send email
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        echo "<script>alert('Check your gmail to proceed');</script>";
        echo "<script>window.location.href = '../Login.php';</script>";
        exit();
    } else {
        // User does not exist
        echo "<script>alert('You must need to registered first');</script>";
        echo "<script>window.location.href = '../Login.php';</script>";

    }

    // Close database connection
    $conn->close();
}
?>

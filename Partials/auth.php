<?php
// Start session
session_start();

// Include the database connection file
require_once 'db_conn.php';

// Include PHPMailer files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

// Function to handle user login
function login($username, $password) {
    global $conn;

    // Check if the user exists
    $sql = "SELECT * FROM Users WHERE Username='$username' AND Password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, set session variables
        $user_data = $result->fetch_assoc();
        $_SESSION['user_id'] = $user_data['Id'];
        $_SESSION['username'] = $user_data['Username'];
        return true;
    } else {
        // User does not exist
        return false;
    }
}

// Function to check if user is logged in
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Function to get user ID
function get_user_id() {
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
}

// Function to logout user
function logout() {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header('Location: ../Login.php');
    exit();
}

// Function to send email notification
function send_email_notification($user_id, $user_email) {
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
}
?>

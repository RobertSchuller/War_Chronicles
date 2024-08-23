<?php
session_start();
// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || !$_SESSION['is_admin']) {
    header('Location: ../profile.php'); // Redirect to profile if not admin
    exit();
}

// Database connection
$servername = "127.0.0.1";  // or "localhost"
$username = "root";
$password = "";  // Default password for root is usually empty
$dbname = "user_registration";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    
    if ($action === 'add') {
        // Add user
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;

        $stmt = $mysqli->prepare("INSERT INTO users (name, username, email, password, is_admin) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $name, $username, $email, $password, $is_admin);

        if ($stmt->execute()) {
            $_SESSION['message'] = "User added successfully!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error adding user: " . $stmt->error;
            $_SESSION['message_type'] = "error";
        }
        $stmt->close();

    } elseif ($action === 'delete') {
        // Delete user
        $user_id = $_POST['user_id'];
        $stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            $_SESSION['message'] = "User deleted successfully!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error deleting user: " . $stmt->error;
            $_SESSION['message_type'] = "error";
        }
        $stmt->close();
    }

    header('Location: ../admin_dashboard.php');
    exit();
}
?>

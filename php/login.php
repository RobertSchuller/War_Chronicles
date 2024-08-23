<?php
session_start();

$servername = "127.0.0.1";  // or "localhost"
$username = "root";
$password = "";  // Default password for root is usually empty
$dbname = "user_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_admin'] = $user['is_admin']; // Set the is_admin value in the session
            $_SESSION['user_id'] = $user['id']; // Assuming you also want to store user id in the session
            $_SESSION['message'] = "Login successful";
            $_SESSION['message_type'] = "success";
            header("Location: ../profile.php");
            exit();
        } else {
            $_SESSION['message'] = "Invalid password";
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "No user found";
        $_SESSION['message_type'] = "error";
    }
    header("Location: ../login_register.php");
    exit();
}

$conn->close();
?>

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login_register.php'); // Redirect to login if not logged in
    exit();
}

// Database connection
$servername = "127.0.0.1";  // or "localhost"
$username = "root";
$password = "";  // Default password for root is usually empty
$dbname = "user_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle password update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // Verify the old password
    $sql = "SELECT password FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($old_password, $user['password'])) {
        // Update to new password
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password=? WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $new_password_hashed, $_SESSION['username']);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Password updated successfully";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error updating password: " . $stmt->error;
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "Old password is incorrect";
        $_SESSION['message_type'] = "error";
    }
}

// Get user information
$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Get quiz scores
$sql = "SELECT * FROM results_quiz WHERE username=? ORDER BY taken_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$scores_result = $stmt->get_result();

$conn->close();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="style/profile.css" />
</head>
<body>
    <nav>
        <a href="index.php" class="nav-logo">War Chronicles</a>
        <ul class="nav-links">
           <li><a href="index.php">Acasă</a></li>
            <li><a href="casualties.php">Statistici</a></li>
            <li><a href="history.php">Istorie</a></li>
            <li><a href="leaders.php">Lideri</a></li>
            <li><a href="quiz.php">Quiz</a></li>
            <li><a href="about.php">Despre</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="profile.php">Profil</a></li>
            <li><a href="php/logout.php">Logout</a></li>
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
            <?php endif; ?>
        </ul>
        <div class="burger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>

    <div class="profile-container">
        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="message ' . $_SESSION['message_type'] . '">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
        ?>
        <h2>User Profile</h2>
        <p><strong>Nume:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Rank:</strong> <?php echo isset($user['is_admin']) && $user['is_admin'] ? 'Admin' : 'User'; ?></p>
        
        <form action="profile.php" method="POST" class="profile-form">
            <label for="old_password">Old Password:</label>
            <input type="password" id="old_password" name="old_password" required>
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>
            <button type="submit" name="update_password">Update Password</button>
        </form>

        <h3>Quiz Scores</h3>
        <table class="quiz-scores">
            <thead>
                <tr>
                    <th>Data/Ora</th>
                    <th>Scor</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($score = $scores_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($score['taken_at']); ?></td>
                        <td><?php echo htmlspecialchars($score['score']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="script/burger.js"></script>
</body>
</html>

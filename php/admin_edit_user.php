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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_admin = isset($_POST['is_admin']) ? 1 : 0;

    if (!empty($password)) {
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $mysqli->prepare("UPDATE users SET name=?, username=?, email=?, password=?, is_admin=? WHERE id=?");
        $stmt->bind_param("sssiii", $name, $username, $email, $password_hashed, $is_admin, $user_id);
    } else {
        $stmt = $mysqli->prepare("UPDATE users SET name=?, username=?, email=?, is_admin=? WHERE id=?");
        $stmt->bind_param("sssii", $name, $username, $email, $is_admin, $user_id);
    }

    if ($stmt->execute()) {
        $_SESSION['message'] = "User updated successfully!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error updating user: " . $stmt->error;
        $_SESSION['message_type'] = "error";
    }
    $stmt->close();
    header('Location: ../admin_dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $user = $mysqli->query("SELECT * FROM users WHERE id = $user_id")->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin_dashboard.css">
    <title>Edit User</title>
</head>
<body>
    <nav>
        <a href="../index.php" class="nav-logo">War Chronicles</a>
        <ul class="nav-links">
            <li><a href="../index.php">Acasă</a></li>
            <li><a href="../casualties.php">Statistici</a></li>
            <li><a href="../history.php">Istorie</a></li>
            <li><a href="../leaders.php">Lideri</a></li>
            <li><a href="../quiz.php">Quiz</a></li>
            <li><a href="../about.php">Despre</a></li>
            <li><a href="../contact.php">Contact</a></li>
            <li><a href="../profile.php">Profil</a></li>
            <li><a href="../php/logout.php">Logout</a></li>
            <?php if (isset($_SESSION['username']) && $_SESSION['is_admin']): ?>
                <li><a href="../admin_dashboard.php">Admin Dashboard</a></li>
            <?php endif; ?>
        </ul>
        <div class="burger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>
    <div class="edit-user-container">
        <h2>Edit User</h2>
        <form method="POST" action="admin_edit_user.php">
            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            <label for="password">Password (leave blank to keep current password):</label>
            <input type="password" id="password" name="password">
            <label for="is_admin">
                <input type="checkbox" id="is_admin" name="is_admin" <?php echo $user['is_admin'] ? 'checked' : ''; ?>> Is Admin
            </label>
            <button type="submit">Update User</button>
        </form>
    </div>
    <script src="script/burger.js"></script>
</body>
</html>

<?php
session_start();
// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || !$_SESSION['is_admin']) {
    header('Location: profile.php'); // Redirect to profile if not admin
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

// Fetch user statistics for analytics
$user_stats = $mysqli->query("SELECT COUNT(*) as total_users, SUM(is_admin) as total_admins FROM users")->fetch_assoc();

// Fetch user creation dates for the graph
$creation_dates = $mysqli->query("SELECT DATE(created_at) as date, COUNT(*) as count FROM users GROUP BY DATE(created_at) ORDER BY date ASC");

$dates = [];
$counts = [];

while ($row = $creation_dates->fetch_assoc()) {
    $dates[] = $row['date'];
    $counts[] = $row['count'];
}

$dates = json_encode($dates);
$counts = json_encode($counts);

// Fetch all users for management
$users = $mysqli->query("SELECT * FROM users");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin_dashboard.css">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <?php if (isset($_SESSION['username']) && $_SESSION['is_admin']): ?>
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
        <h2>Admin Dashboard</h2>

        <!-- Message Section -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message <?php echo $_SESSION['message_type']; ?>">
                <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
                ?>
            </div>
        <?php endif; ?>
        
        <!-- User Statistics Section -->
        <div class="stats">
            <h3>User Statistics</h3>
            <p>Total Users: <?php echo $user_stats['total_users']; ?></p>
            <p>Total Admins: <?php echo $user_stats['total_admins']; ?></p>
        </div>
        
        <!-- User Growth Chart -->
        <div class="chart-container">
            <h3>User Growth Over Time</h3>
            <canvas id="userGrowthChart"></canvas>
            <div id="chartData" data-dates='<?php echo $dates; ?>' data-counts='<?php echo $counts; ?>'></div>
        </div>
        
        <!-- User Management Section -->
        <div class="user-management">
            <h3>User Management</h3>
            <form id="addUserForm" method="POST" action="php/admin_actions.php">
                <input type="hidden" name="action" value="add">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <label for="is_admin">Is Admin:</label>
                <input type="checkbox" id="is_admin" name="is_admin">
                <button type="submit">Add User</button>
            </form>
        </div>

        <!-- Question Management Section -->
        <div class="question-management">
            <h3>Question Management</h3>
            <div class="button-wrapper">
            <button onclick="window.location.href='php/add_questions.php'">Add Quiz Question</button>
            </div>
        </div>

        <!-- User List Section -->
        <div class="user-list">
            <h3>All Users</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                <?php while ($user = $users->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo $user['is_admin'] ? 'Admin' : 'User'; ?></td>
                        <td>
                            <form method="POST" action="php/admin_actions.php" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                            <form method="GET" action="php/admin_edit_user.php" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit">Edit</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>  
        </div>  
    </div>
    <script src="script/admin.js"></script>
    <script src="script/burger.js"></script>
</body>
</html>
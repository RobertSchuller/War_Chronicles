<?php
session_start();
$is_logged_in = isset($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="style/authh.css" />
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
            <li><a href="login_register.php">Login/Înregistrare</a></li>
        </ul>
        <div class="burger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>

    <div class="auth-container">
        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="message ' . $_SESSION['message_type'] . '">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
         ?>
        <div class="toggle-container">
            <button id="loginToggle" class="active">Login</button>
            <button id="registerToggle">Înregistrare</button>
        </div>

        <div id="loginForm" class="form-container active">
            <h2>Login</h2>
            <form action="php/login.php" method="POST">
                <label for="loginUsername">Username:</label>
                <input type="text" id="loginUsername" name="username" required>
                <label for="loginPassword">Password:</label>
                <input type="password" id="loginPassword" name="password" required>
                <button type="submit">Login</button>
                <p id="loginError" class="error-message"></p> <!-- Error message placeholder -->
            </form>
            <div class="forgot-password-link">
                <a href="forgot_password.php">Ai uitat parola?</a>
            </div>
        </div>

        <div id="registerForm" class="form-container">
            <h2>Înregistrare</h2>
            <form action="php/register.php" method="POST">
                <label for="registerName">Nume:</label>
                <input type="text" id="registerName" name="name" required>
                <label for="registerUsername">Username:</label>
                <input type="text" id="registerUsername" name="username" required>
                <label for="registerEmail">Email:</label>
                <input type="email" id="registerEmail" name="email" required>
                <label for="registerPassword">Password:</label>
                <input type="password" id="registerPassword" name="password" required>
                <div id="passwordStrength" class="strength"></div>
                <button type="submit">Înregistrare</button>
                <p id="registerError" class="error-message"></p> <!-- Error message placeholder -->
            </form>
        </div>
    </div>
    <script src="script/burger.js"></script>
    <script src="script/auth.js"></script>
</body>
</html>

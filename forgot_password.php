<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resetare Parolă</title>
    <link rel="stylesheet" href="style/authh.css" />
</head>
<body>
    <div class="auth-container">
        <h2>Resetare Parolă</h2>
        <form action="php/forgot_password.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Resetare Parolă</button>
        </form>
    </div>
</body>
</html>

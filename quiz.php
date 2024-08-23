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

// Fetch 10 random quiz questions
$sql = "SELECT * FROM quiz_questions ORDER BY RAND() LIMIT 10";
$result = $conn->query($sql);
$questions = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="style/quiz.css">
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

    <div class="main-content">
        <div class="quiz-box" id="intro">
            <h1>Quiz despre Al Doilea Război Mondial</h1>
            <p>Bun venit la quiz-ul nostru despre Al Doilea Război Mondial! Acest quiz este conceput pentru a-ți testa și îmbunătăți cunoștințele despre evenimentele, persoanele și locurile importante din timpul acestui conflict istoric. Vei avea la dispoziție 10 întrebări alese aleatoriu, fiecare cu patru opțiuni de răspuns. Răspunde cât mai corect la fiecare întrebare pentru a obține un scor cât mai mare. La finalul quiz-ului, vei putea vedea scorul obținut și vei primi sfaturi și detalii despre răspunsurile greșite. <strong>Nu uita, odată ales răspunsul, el nu mai poate fi modificat.</strong></p>
            <p>Apasă pe butonul de mai jos pentru a începe quiz-ul. Mult succes!</p>
            <button id="start-quiz">Începe Quiz-ul</button>
        </div>

        <div class="quiz-box" id="quiz" style="display: none;">
            <div id="question-container">
                <?php foreach ($questions as $index => $question): ?>
                    <div class="question" id="question-<?php echo $index; ?>" data-correct="<?php echo $question['correct_option']; ?>" data-explanation="<?php echo htmlspecialchars($question['explanation']); ?>">
                        <p><?php echo htmlspecialchars($question['question_text']); ?></p>
                        <label>
                            <input type="radio" name="question<?php echo $question['id']; ?>" value="A">
                            <?php echo htmlspecialchars($question['option_a']); ?>
                        </label>
                        <label>
                            <input type="radio" name="question<?php echo $question['id']; ?>" value="B">
                            <?php echo htmlspecialchars($question['option_b']); ?>
                        </label>
                        <label>
                            <input type="radio" name="question<?php echo $question['id']; ?>" value="C">
                            <?php echo htmlspecialchars($question['option_c']); ?>
                        </label>
                        <label>
                            <input type="radio" name="question<?php echo $question['id']; ?>" value="D">
                            <?php echo htmlspecialchars($question['option_d']); ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="button" id="next-question" style="display: none;">Întrebarea Următoare</button>
            <button type="button" id="submit-quiz" style="display: none;">Trimite Răspunsurile</button>
        </div>

        <div class="results-container" id="results" style="display: none;">
            <h2>Rezultatele Quiz-ului</h2>
            <p id="score">Scor: <span id="score-value">0</span> / 10</p>
            <div id="advice" class="advice-container"></div>
            <button id="restart-quiz">Restart Quiz</button>
        </div>
    </div>

    <script src="script/burger.js"></script>
    <script src="script/quiz.js"></script>
</body>
</html>

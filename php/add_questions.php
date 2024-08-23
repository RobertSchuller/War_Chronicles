<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || !$_SESSION['is_admin']) {
    header('Location: ../login_register.php');
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

// Handle form submission for adding questions
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_question'])) {
    $question_text = $_POST['question_text'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $correct_option = $_POST['correct_option'];
    $explanation = $_POST['explanation'];

    // Insert question into the database
    $stmt = $conn->prepare("INSERT INTO quiz_questions (question_text, option_a, option_b, option_c, option_d, correct_option, explanation) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $question_text, $option_a, $option_b, $option_c, $option_d, $correct_option, $explanation);
    if ($stmt->execute()) {
        $message = "Question added successfully!";
        $message_type = "success";
    } else {
        $message = "Error: " . $stmt->error;
        $message_type = "error";
    }
    $stmt->close();
}

// Handle deletion of questions
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM quiz_questions WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $message = "Question deleted successfully!";
        $message_type = "success";
    } else {
        $message = "Error: " . $stmt->error;
        $message_type = "error";
    }
    $stmt->close();
}

// Fetch all questions
$questions_result = $conn->query("SELECT * FROM quiz_questions");

$conn->close();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/questions.css">
    <title>Add Quiz Question</title>
</head>
<body>
    <div class="container">
        <?php
        if (isset($message)) {
            echo '<div class="message ' . $message_type . '">' . $message . '</div>';
        }
        ?>
        <div class="back-to-dashboard">
            <button onclick="window.location.href='../admin_dashboard.php'">Back to Dashboard</button>
        </div>
        <h2>Add Quiz Question</h2>
        <div class="add-question">
            <form action="add_questions.php" method="POST">
                <label for="question_text">Question:</label>
                <input type="text" id="question_text" name="question_text" required>
    
                <label for="option_a">Option A:</label>
                <input type="text" id="option_a" name="option_a" required>
    
                <label for="option_b">Option B:</label>
                <input type="text" id="option_b" name="option_b" required>
    
                <label for="option_c">Option C:</label>
                <input type="text" id="option_c" name="option_c" required>
    
                <label for="option_d">Option D:</label>
                <input type="text" id="option_d" name="option_d" required>
    
                <label for="correct_option">Correct Option:</label>
                <select id="correct_option" name="correct_option" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>

                <label for="explanation">Explanation:</label>
                <textarea id="explanation" name="explanation" rows="4" required></textarea>
    
                <button type="submit" name="add_question">Add Question</button>
            </form>
        </div>

        <div class="questions-box">
            <h3>All Questions</h3>
            <?php while ($question = $questions_result->fetch_assoc()): ?>
                <div class="question-card">
                    <h3><?php echo $question['question_text']; ?></h3>
                    <div class="options">
                        <span><strong>A:</strong> <?php echo $question['option_a']; ?></span>
                        <span><strong>B:</strong> <?php echo $question['option_b']; ?></span>
                        <span><strong>C:</strong> <?php echo $question['option_c']; ?></span>
                        <span><strong>D:</strong> <?php echo $question['option_d']; ?></span>
                    </div>
                    <div class="correct-option">Correct Option: <?php echo $question['correct_option']; ?></div>
                    <div class="explanation">Explanation: <?php echo $question['explanation']; ?></div>
                    <div class="actions">
                        <a href="add_questions.php?delete=<?php echo $question['id']; ?>" onclick="return confirm('Are you sure you want to delete this question?');">Delete</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="../script/quiz.js"></script>
    <script src="../script/burger.js"></script>
</body>
</html>

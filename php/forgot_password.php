<?php
session_start();
require '../vendor/autoload.php'; // Adjust the path as needed to include Composer's autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Generate a new password
        $new_password = bin2hex(random_bytes(4)); // Generates an 8-character random password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $email);

        if ($stmt->execute()) {
            // Send the new password to the user's email
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'website.wwii@gmail.com'; // Replace with your email address
                $mail->Password = 'obrt aluy dycs nadq';    // Replace with your Gmail App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('website.wwii@gmail.com', 'WarChronicles'); // Replace with your email address and name
                $mail->addAddress($email); // Send the email to the registered user

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Resetare Parola';
                $mail->Body    = '<p>Parola ta noua este: ' . $new_password . '</p>
                                  <p>Aceasta parola o puteti schimba in pagina profilulul.</p>
                                  <p><br>Cu respect,<br><strong>War Chronicles Team</strong></p>';

                $mail->send();
                $_SESSION['message'] = "O nouă parolă a fost trimisă la adresa de email.";
                $_SESSION['message_type'] = "success";
            } catch (Exception $e) {
                error_log("Mesajul nu a putut fi trimis. Eroare Mailer: {$mail->ErrorInfo}");
                $_SESSION['message'] = "A apărut o eroare la trimiterea emailului.";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Eroare la actualizarea parolei.";
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "Emailul nu a fost găsit.";
        $_SESSION['message_type'] = "error";
    }
    $stmt->close();
    header("Location: ../login_register.php");
    exit();
}

$conn->close();
?>

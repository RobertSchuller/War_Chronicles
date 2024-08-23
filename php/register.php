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
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $username, $email, $password);

    if ($stmt->execute() === TRUE) {
        $_SESSION['message'] = "Înregistrare reușită";
        $_SESSION['message_type'] = "success";

        // Send email confirmation
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
            $mail->Subject = 'Confirmare Inregistrare';
            $mail->Body    = '<p>Stimată/Stimate ' . $name . ',</p>
                              <p>Vă mulțumim pentru înregistrarea pe platforma noastră, War Chronicles. Contul dumneavoastră a fost creat cu succes.</p>
                              <p>Aici sunt detaliile contului dumneavoastră:</p>
                              <ul>
                                  <li><strong>Nume:</strong> ' . $name . '</li>
                                  <li><strong>Nume utilizator:</strong> ' . $username . '</li>
                                  <li><strong>Email:</strong> ' . $email . '</li>
                              </ul>
                              <p>Acum puteți accesa contul dumneavoastră folosind numele de utilizator și parola alese. Vă rugăm să păstrați aceste informații în siguranță.</p>
                              <p>Vă dorim o experiență plăcută și productivă pe site-ul nostru!</p>
                              <p>Pentru întrebări, sugestii sau contribuții, vă rugăm să ne contactați prin secțiunea de <strong>Contact</strong> de pe site.</p>
                              <p>Cu respect,<br><strong>War Chronicles Team</strong></p>';

            $mail->send();
        } catch (Exception $e) {
            error_log("Mesajul nu a putut fi trimis. Eroare Mailer: {$mail->ErrorInfo}");
        }
    } else {
        $_SESSION['message'] = "Eroare: " . $stmt->error;
        $_SESSION['message_type'] = "error";
    }
    $stmt->close();
    header("Location: ../login_register.php");
    exit();
}

$conn->close();
?>

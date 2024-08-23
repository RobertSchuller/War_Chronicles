<?php
session_start();
$is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style/about.css" />
    <title>About</title>
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
            <?php if (!$is_logged_in): ?>
                <li><a href="login_register.php">Login/Înregistrare</a></li>
            <?php else: ?>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            <?php endif; ?>
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

    <div class="about-wrapper">
        <div class="about-left">
            <div class="about-left-content">
                <div>
                    <div class="shadow">
                        <div class="about-img">
                            <img src="img/profil.jpg" alt="about image">
                        </div>
                    </div>
                    <h2>Schuller Robert</h2>
                    <h3>Student</h3>
                </div>

                <ul class="icons">
                    <li><a href="mailto:robert.srg02@gmail.com"><i class="fas fa-envelope"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/robert-schuller/"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="https://www.instagram.com/robi.schuller/"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="about-right">
            <h1>Salutari<span>!<span class="wave"> 👋 </span></span></h1>
            <h2>Aici o să găsiți informații despre site:</h2>

            <div class="about-para">
                <p>Bine ați venit pe <strong>War Chronicles</strong>, un site dedicat explorării fascinante și complexe a celui de-al Doilea Război Mondial. Acest proiect a fost creat ca parte a lucrării mele de licență la universitate și reprezintă un efort de a oferi informații detaliate, resurse educaționale și activități interactive despre unul dintre cele mai semnificative conflicte din istoria omenirii.</p>
                <p><strong>Ce veți găsi pe acest site:</strong></p>
                <ul>
                    <li><strong>Statistici:</strong> Secțiunea dedicată victimelor războiului, unde sunt prezentate date statistice și povești personale pentru a ilustra impactul devastator al conflictului.</li>
                    <li><strong>Istorie:</strong> O cronologie detaliată a evenimentelor majore din timpul războiului, împreună cu analize și context istoric.</li>
                    <li><strong>Lideri:</strong> Profiluri ale liderilor militari și politici care au jucat roluri cruciale în desfășurarea războiului.</li>
                    <li><strong>Quiz:</strong> Un quiz interactiv pentru a testa și îmbunătăți cunoștințele despre al Doilea Război Mondial într-un mod antrenant.</li>
                    <li><strong>Login/Înregistrare:</strong> O secțiune dedicată utilizatorilor înregistrați, care pot accesa resurse suplimentare și își pot gestiona profilurile.</li>
                    <li><strong>Despre:</strong> Informații despre scopul și realizarea acestui proiect, precum și despre mine, creatorul acestui site.</li>
                </ul>
                <p><strong>Despre mine:</strong></p>
                <p>Numele meu este Schuller Robert, sunt student și am creat acest site ca parte a proiectului meu de licență. Misiunea mea este să furnizez o resursă educațională accesibilă și cuprinzătoare pentru oricine este interesat de istoria celui de-al Doilea Război Mondial.</p>
                <p><strong>Resurse și Contribuții:</strong></p>
                <div class="about-btns">
                    <a href="https://gray-christi-56.tiiny.site" class="btn btn-pink">Resume / CV</a>
                    <a href="https://github.com/RobertSchuller" class="btn btn-white">GitHub</a>
                </div>
                <p>Acest site este rezultatul pasiunii mele pentru istorie și al angajamentului de a oferi informații precise și bine documentate. Sper ca vizita dumneavoastră pe <strong>War Chronicles</strong> să fie atât informativă, cât și plăcută.</p>
                <p><strong>Contact:</strong></p>
                <p>Pentru orice întrebări, sugestii sau contribuții, vă rog să nu ezitați să mă contactați prin secțiunea de <a href="contact.php">Contact</a>.</p>
            </div>
            <div class="credit">Made with <span style="color:tomato">❤</span> by me</div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 . All rights reserved.</p>
    </footer>
    <script src="script/burger.js"></script>
</body>
</html>

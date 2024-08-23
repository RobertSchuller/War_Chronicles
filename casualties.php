<?php
session_start();
$is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/casualties.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Statistici</title>
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
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>

    <section class="victims-section">
        <h1>Victimele Războiului</h1>
        <div class="victims-container">
            <div class="victim-card">
                <img src="img/anne_frank.jpg" alt="Anne Frank">
                <div class="victim-info">
                    <h2>Anne Frank</h2>
                    <p>Anne Frank, o tânără evreică, a murit în lagărul de concentrare Bergen-Belsen în 1945. Jurnalul ei, publicat postum, este unul dintre cele mai cunoscute relatări ale Holocaustului.</p>
                </div>
            </div>
            <div class="victim-card">
                <img src="img/witold_pilecki.jpg" alt="Witold Pilecki">
                <div class="victim-info">
                    <h2>Witold Pilecki</h2>
                    <p>Witold Pilecki, un soldat polonez și membru al rezistenței, s-a infiltrat voluntar în Auschwitz pentru a raporta despre atrocitățile comise acolo. A fost executat de comuniști în 1948.</p>
                </div>
            </div>
            <div class="victim-card">
                <img src="img/irena_sendler.jpg" alt="Irena Sendler">
                <div class="victim-info">
                    <h2>Irena Sendler</h2>
                    <p>Irena Sendler, o asistentă poloneză, a salvat aproximativ 2.500 de copii evrei din ghetoul Varșoviei, oferindu-le identități false și adăposturi sigure.</p>
                </div>
            </div>
            <div class="victim-card">
                <img src="img/raoul_wallenberg.jpg" alt="Raoul Wallenberg">
                <div class="victim-info">
                    <h2>Raoul Wallenberg</h2>
                    <p>Raoul Wallenberg, un diplomat suedez, a salvat zeci de mii de evrei maghiari de la deportare prin emiterea de pașapoarte protejate și oferindu-le adăposturi sigure.</p>
                </div>
            </div>
            <div class="victim-card">
                <img src="img/sophie_scholl.jpg" alt="Sophie Scholl">
                <div class="victim-info">
                    <h2>Sophie Scholl</h2>
                    <p>Sophie Scholl, membră a grupului de rezistență "Trandafirul Alb", a fost executată în 1943 pentru distribuirea de pamflete anti-naziste la Universitatea din München.</p>
                </div>
            </div>
        </div>
        <div class="statistics">
            <h2>Statistici</h2>
            <div class="statistics-grid">
                <p><i class="fas fa-skull-crossbones"></i> <strong>Total Victime:</strong> 70-85 milioane</p>
                <p><i class="fas fa-users"></i> <strong>Victime Civile:</strong> 50-55 milioane</p>
                <p><i class="fas fa-user-shield"></i> <strong>Victime Militare:</strong> 21-25 milioane</p>
                <p><i class="fas fa-globe"></i> <strong>Țări Afectate:</strong> 30</p>
                <p><i class="fas fa-people-arrows"></i> <strong>Refugiați:</strong> 60 milioane</p>
                <p><i class="fas fa-city"></i> <strong>Orașe Distruse:</strong> 1,000+</p>
                <p><i class="fas fa-star-of-david"></i> <strong>Victimele Holocaustului:</strong> 6 milioane</p>
                <p><i class="fas fa-child"></i> <strong>Orfani:</strong> 13 milioane</p>
                <p><i class="fas fa-procedures"></i> <strong>Soldați Răniți:</strong> 25 milioane</p>
                <p><i class="fas fa-bomb"></i> <strong>Bombe Aruncate:</strong> 1.2 milioane tone</p>
                <p><i class="fas fa-user-secret"></i> <strong>Prizonieri de Război:</strong> 8 milioane</p>
                <p><i class="fas fa-dollar-sign"></i> <strong>Costuri Economice:</strong> $1.5 trilioane USD</p>
                <p><i class="fas fa-plane-departure"></i> <strong>Deplasări de Persoane:</strong> 11 milioane</p>
                <p><i class="fas fa-ship"></i> <strong>Nave de Război Scufundate:</strong> 1,500</p>
                <p><i class="fas fa-fighter-jet"></i> <strong>Avioane Pierdute:</strong> 400,000</p>
            </div>
        </div>
    </section>

    <script src="script/burger.js"></script>
</body>

</html>

<?php
session_start();
$is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>War Chronicles</title>
    <link rel="stylesheet" href="style/style.css" />
</head>
<body>
    <header>
        <img src="img/header.jpg" alt="Imagine">
        <div class="centered-text">World War II - Al Doilea Război Mondial</div>
    </header>
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
    <section id="home">
        <h2>Bine ați venit pe platforma dedicată celui de-Al Doilea Război Mondial.</h2>
        <p>Aici puteți explora o gamă diversă de conținut care acoperă istoria acestui conflict mondial epic. 
            Descoperiți evenimentele cheie care au definit perioada războiului, 
            explorați biografiile liderilor de marcă din acea vreme și înțelegeți impactul devastator al 
            războiului asupra populației civile și a altor victime. De asemenea, vă invităm să vă testați cunoștințele 
            într-un quiz interactiv despre cel de-Al Doilea Război Mondial. Indiferent dacă sunteți pasionați de istorie sau doar curioși 
            să învățați mai multe, site-ul nostru vă oferă o experiență educativă și captivantă despre acest moment crucial din trecutul nostru.</p>
        <div class="slideshow-container" id="slideshow-container">
            <div class="slide active">
                <img src="img/slider1.jpg" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="img/slider2.jpg" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="img/slider3.jpg" alt="Slide 3">
            </div>
            <div class="slide">
                <img src="img/slider4.jpg" alt="Slide 4">
            </div>
            <div class="slide">
                <img src="img/slider5.jpg" alt="Slide 5">
            </div>
            <div class="slide">
                <img src="img/slider6.jpg" alt="Slide 6">
            </div>
            <div class="slide">
                <img src="img/slider7.jpg" alt="Slide 7">
            </div>
            <div class="slide">
                <img src="img/slider8.jpg" alt="Slide 8">
            </div>
            <div class="slide">
                <img src="img/slider9.jpg" alt="Slide 9">
            </div>
            <div class="slide">
                <img src="img/slider10.jpg" alt="Slide 10">
            </div>
        </div>
        <div class="dots-container">
            <span class="dot active" onclick="currentSlide(0)"></span>
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
            <span class="dot" onclick="currentSlide(6)"></span>
            <span class="dot" onclick="currentSlide(7)"></span>
            <span class="dot" onclick="currentSlide(8)"></span>
            <span class="dot" onclick="currentSlide(9)"></span>
        </div>
    </section>
    <section id="history">
        <h2><a href="history.php">Istorie</a></h2>
        <p>Al Doilea Război Mondial a fost un conflict militar global care a durat din 1939 până în 1945 și a implicat majoritatea națiunilor lumii, inclusiv toate marile puteri, organizate în două alianțe militare opuse: Aliații și Axele.</p>
        <img src="img/history.jpg" alt="History Image">
    </section>
    <section id="events">
        <h2>Evenimente Majore</h2>
        <div class="event">
            <h3>Invasia Poloniei</h3>
            <p>Invazia Poloniei în 1939 a marcat punctul culminant al tensiunilor din Europa și a deschis drumul către declanșarea celui de-Al Doilea Război Mondial.
                 Această invazie, inițiată de Germania Nazistă la 1 septembrie, a avut ca rezultat ocuparea rapidă a teritoriului polonez, 
                 fiind urmată de declanșarea războiului de către Franța și Marea Britanie împotriva Germaniei.</p>
            <img src="img/invasion_poland.jpg" alt="Invasia Poloniei">
        </div>
        <div class="event">
            <h3>Bătălia de la Stalingrad</h3>
            <p>Bătălia de la Stalingrad, care s-a desfășurat între vara anului 1942 și iarna anului 1943, 
               a fost un moment crucial al celui de-Al Doilea Război Mondial. 
               Acest conflict epic a avut loc pe Frontul de Est și a implicat lupte extrem de violente între Armata Germană și 
               Armata Roșie a Uniunii Sovietice. Victoria sovietică la Stalingrad a reprezentat un punct de cotitură major în război, 
               schimbând cursul conflictului și marcând începutul declinului puterii militare a Germaniei naziste.</p>
            <img src="img/stalingrad.jpg" alt="Bătălia de la Stalingrad">
        </div>
        <div class="event">
            <h3>Ziua Z</h3>
            <p>Ziua Z, cunoscută și ca Ziua Debarcării Normandiei, a fost o operațiune complexă și bine planificată, desfășurată de forțele aliate în timpul celui 
                de-Al Doilea Război Mondial. La 6 iunie 1944, trupele aliate au debarcat pe coasta normandă a Franței ocupate de germani, 
                marcând începutul sfârșitului pentru Germania nazistă în Europa. Această debarcare a deschis un nou front de luptă în Europa, 
                facilitând eliberarea teritoriilor ocupate și accelerând înfrângerea Germaniei naziste.</p>
            <img src="img/d_day.jpg" alt="Ziua Z">
        </div>
    </section>
    <section id="figures">
        <h2><a href="leaders.php">Figuri Cheie</a></h2>
        <div class="figure">
            <h3>Winston Churchill</h3>
            <p>Winston Churchill a fost prim-ministru al Regatului Unit în timpul războiului și a jucat un rol crucial în conducerea Aliaților spre victorie.</p>
            <img src="img/churchill.jpg" alt="Winston Churchill">
        </div>
        <div class="figure">
            <h3>Franklin D. Roosevelt</h3>
            <p>Franklin D. Roosevelt a fost președintele Statelor Unite în timpul războiului și a fost un lider important al Aliaților.</p>
            <img src="img/roosevelt.jpg" alt="Franklin D. Roosevelt">
        </div>
        <div class="figure">
            <h3>Adolf Hitler</h3>
            <p>Adolf Hitler a fost dictatorul Germaniei naziste și unul dintre principalii inițiatori ai conflictului.</p>
            <img src="img/hitler.jpg" alt="Adolf Hitler">
        </div>
    </section>
    <section id="casualties">
        <h2><a href="casualties.php">Victime</a></h2>
        <p>Al Doilea Război Mondial a avut un impact devastator, cu milioane de victime civile și militare. Estimările variază, dar se crede că numărul total al morților se ridică la peste 70 de milioane.</p>
        <img src="img/casualties.jpg" alt="Victime">
    </section>
    <footer>
        <p>&copy; 2024. All rights reserved.</p>
    </footer>
    <script src="script/burger.js"></script>
    <script src="script/slider.js"></script>
</body>
</html>

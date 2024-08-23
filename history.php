<?php
session_start();
$is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>
    <link rel="stylesheet" href="style/history.css" />
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

    <section class="timeline">
        <h1>O cronologie detaliată a evenimentelor majore din timpul războiului</h1>

        <div class="timeline-event">
            <button class="accordion">1939: Începutul Războiului</button>
            <div class="panel">
                <div class="event-detail">
                    <p><strong>1 Septembrie 1939:</strong> Germania invadează Polonia, marcând începutul celui de-Al Doilea Război Mondial.</p>
                    <img src="img/invasion_of_poland.jpg" alt="Invasion of Poland">
                </div>
                <div class="event-detail">
                    <p><strong>3 Septembrie 1939:</strong> Marea Britanie și Franța declară război Germaniei.</p>
                    <img src="img/britain_france_declare_war.jpg" alt="Britain and France Declare War">
                </div>
                <div class="event-detail">
                    <p><strong>17 Septembrie 1939:</strong> Uniunea Sovietică invadează Polonia din est.</p>
                    <img src="img/soviet_invasion_poland.jpg" alt="Soviet Invasion of Poland">
                </div>
                <div class="event-detail">
                    <p><strong>Noiembrie 1939:</strong> Uniunea Sovietică invadează Finlanda, începând Războiul de Iarnă.</p>
                    <img src="img/winter_war.jpg" alt="Winter War">
                </div>
            </div>
        </div>

        <div class="timeline-event">
            <button class="accordion">1940: Blitzkrieg și Expansiunea Germană</button>
            <div class="panel">
                <div class="event-detail">
                    <p><strong>10 Mai 1940:</strong> Germania lansează atacuri asupra Belgiei, Olandei și Franței folosind strategia Blitzkrieg.</p>
                    <img src="img/blitzkrieg.jpg" alt="Blitzkrieg">
                </div>
                <div class="event-detail">
                    <p><strong>14 Iunie 1940:</strong> Parisul cade în mâinile Germaniei.</p>
                    <img src="img/fall_of_paris.jpg" alt="Fall of Paris">
                </div>
                <div class="event-detail">
                    <p><strong>26 Mai - 4 Iunie 1940:</strong> Evacuarea Dunkerque - O operațiune masivă de evacuare a trupelor aliate din Franța.</p>
                    <img src="img/evacuation_of_dunkirk.jpg" alt="Evacuation of Dunkirk">
                </div>
                <div class="event-detail">
                    <p><strong>Iulie - Octombrie 1940:</strong> Bătălia pentru Britanie - Forțele aeriene britanice rezistă atacurilor aeriene germane.</p>
                    <img src="img/battle_of_britain.jpg" alt="Battle of Britain">
                </div>
                <div class="event-detail">
                    <p><strong>27 Septembrie 1940:</strong> Pactul Tripartit - Alianța între Germania, Italia și Japonia.</p>
                    <img src="img/tripartite_pact.jpg" alt="Tripartite Pact">
                </div>
            </div>
        </div>

        <div class="timeline-event">
            <button class="accordion">1941: Invazia Uniunii Sovietice și Pearl Harbor</button>
            <div class="panel">
                <div class="event-detail">
                    <p><strong>22 Iunie 1941:</strong> Operațiunea Barbarossa - Germania invadează Uniunea Sovietică.</p>
                    <img src="img/operation_barbarossa.jpg" alt="Operation Barbarossa">
                </div>
                <div class="event-detail">
                    <p><strong>7 Decembrie 1941:</strong> Atacul de la Pearl Harbor - Japonia atacă baza navală americană din Hawaii.</p>
                    <img src="img/pearl_harbor.jpg" alt="Pearl Harbor">
                </div>
                <div class="event-detail">
                    <p><strong>11 Decembrie 1941:</strong> Germania și Italia declară război Statelor Unite.</p>
                    <img src="img/us_war_declaration.jpg" alt="US War Declaration">
                </div>
                <div class="event-detail">
                    <p><strong>Decembrie 1941:</strong> Alianța între Statele Unite, Marea Britanie și Uniunea Sovietică se formează împotriva Puterilor Axei.</p>
                    <img src="img/alliance_us_uk_ussr.jpg" alt="Alliance of US, UK, USSR">
                </div>
            </div>
        </div>

        <div class="timeline-event">
            <button class="accordion">1942-1943: Puncte de cotitură</button>
            <div class="panel">
                <div class="event-detail">
                    <p><strong>Iunie 1942:</strong> Bătălia de la Midway - Victoria decisivă a Statelor Unite împotriva Japoniei.</p>
                    <img src="img/battle_of_midway.jpg" alt="Battle of Midway">
                </div>
                <div class="event-detail">
                    <p><strong>August 1942 - Februarie 1943:</strong> Bătălia de la Stalingrad - Uniunea Sovietică oprește avansul german.</p>
                    <img src="img/battle_of_stalingrad.jpg" alt="Battle of Stalingrad">
                </div>
                <div class="event-detail">
                    <p><strong>Noiembrie 1942:</strong> Operațiunea Torch - Debarcarea aliaților în Africa de Nord.</p>
                    <img src="img/operation_torch.jpg" alt="Operation Torch">
                </div>
                <div class="event-detail">
                    <p><strong>7 Mai 1943:</strong> Forțele Axei se predau în Africa de Nord.</p>
                    <img src="img/surrender_north_africa.jpg" alt="Surrender in North Africa">
                </div>
                <div class="event-detail">
                    <p><strong>Iulie 1943:</strong> Debarcarea în Sicilia - Începutul campaniei italiene.</p>
                    <img src="img/invasion_of_sicily.jpg" alt="Invasion of Sicily">
                </div>
            </div>
        </div>

        <div class="timeline-event">
            <button class="accordion">1944: Ziua Z și eliberarea Europei</button>
            <div class="panel">
                <div class="event-detail">
                    <p><strong>6 Iunie 1944:</strong> Ziua Z - Debarcarea aliaților în Normandia.</p>
                    <img src="img/d_day.jpg" alt="D-Day">
                </div>
                <div class="event-detail">
                    <p><strong>25 August 1944:</strong> Eliberarea Parisului de sub ocupația germană.</p>
                    <img src="img/liberation_of_paris.jpg" alt="Liberation of Paris">
                </div>
                <div class="event-detail">
                    <p><strong>Septembrie 1944:</strong> Operațiunea Market Garden - O încercare eșuată a aliaților de a traversa Rinul în Olanda.</p>
                    <img src="img/operation_market_garden.jpg" alt="Operation Market Garden">
                </div>
                <div class="event-detail">
                    <p><strong>16 Decembrie 1944:</strong> Bătălia de la Bulge - Ultima ofensivă majoră a Germaniei pe frontul de vest.</p>
                    <img src="img/battle_of_the_bulge.jpg" alt="Battle of the Bulge">
                </div>
            </div>
        </div>

        <div class="timeline-event">
            <button class="accordion">1945: Sfârșitul Războiului</button>
            <div class="panel">
                <div class="event-detail">
                    <p><strong>8 Mai 1945:</strong> Ziua Victoriei în Europa - Germania se predă necondiționat.</p>
                    <img src="img/ve_day.jpg" alt="VE Day">
                </div>
                <div class="event-detail">
                    <p><strong>6 și 9 August 1945:</strong> Bombele atomice sunt lansate asupra Hiroshimei și Nagasakiului.</p>
                    <img src="img/hiroshima_nagasaki.jpg" alt="Hiroshima and Nagasaki">
                </div>
                <div class="event-detail">
                    <p><strong>2 Septembrie 1945:</strong> Ziua Victoriei asupra Japoniei - Japonia se predă, marcând sfârșitul oficial al războiului.</p>
                    <img src="img/vj_day.jpg" alt="VJ Day">
                </div>
                <div class="event-detail">
                    <p><strong>20 Noiembrie 1945:</strong> Începerea Proceselor de la Nürnberg - Judecarea criminalilor de război naziști.</p>
                    <img src="img/nuremberg_trials.jpg" alt="Nuremberg Trials">
                </div>
            </div>
        </div>
    </section>
    <script src="script/burger.js"></script>
    <script src="script/accordion.js"></script>
</body>
</html>

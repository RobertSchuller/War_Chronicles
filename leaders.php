<?php
session_start();
$is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/leaders.css" />
    <title>Lideri</title>
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

    <main>
        <section class="leader-profiles">
            <h2>Profiluri ale liderilor militari și politici</h2>
            <div class="leader">
                <img src="img/churchill.jpg" alt="Winston Churchill">
                <h3>Winston Churchill</h3>
                <div class="rank">Prim-ministru al Regatului Unit</div>
                <p>Churchill a fost cunoscut pentru discursurile sale inspiraționale și leadership-ul ferm împotriva Germaniei naziste.</p>
                <p>Churchill a avut un rol esențial în menținerea moralului britanic și în formarea alianțelor cu alte națiuni, contribuind semnificativ la eforturile Aliaților.Pentru mai multe <a href="lideri/churchill.html">detalii</a>.</p>
            </div>
            <div class="leader">
                <img src="img/roosevelt.jpg" alt="Franklin D. Roosevelt">
                <h3>Franklin D. Roosevelt</h3>
                <div class="rank">Președinte al Statelor Unite</div>
                <p>Roosevelt a condus țara prin Marea Depresiune și al Doilea Război Mondial, punând bazele pentru victoria aliaților.</p>
                <p>Roosevelt a fost un strateg abil și a jucat un rol crucial în planificarea operațiunilor militare, precum și în formarea și susținerea Aliaților prin programe precum Lend-Lease.Pentru mai multe <a href="lideri/roosevelt.html">detalii</a>.</p>
            </div>
            <div class="leader">
                <img src="img/hitler.jpg" alt="Adolf Hitler">
                <h3>Hitler</h3>
                <div class="rank">Dictatorul Germaniei și liderul Partidului Nazist</div>
                <p>Hitler a inițiat și condus eforturile războinice ale Axei, ducând la devastarea Europei și Holocaustul.</p>
                <p>Hitler a fost responsabil pentru politica agresivă de expansiune și pentru atrocitățile comise în timpul războiului, având un impact profund și devastator asupra istoriei mondiale.Pentru mai multe <a href="lideri/hitler.html">detalii</a>.</p>
            </div>
            <div class="leader">
                <img src="img/stalin.jpg" alt="Joseph Stalin">
                <h3>Joseph Stalin</h3>
                <div class="rank">Liderul Uniunii Sovietice</div>
                <p>Stalin a jucat un rol crucial în înfrângerea Germaniei naziste, conducând Armata Roșie la victorie în bătălia de la Stalingrad și ulterior în cucerirea Berlinului.</p>
                <p>Stalin a implementat strategii militare decisive și a fost implicat în negocierile care au dus la împărțirea Europei de Est în sfere de influență post-război. Pentru mai multe <a href="lideri/stalin.html">detalii</a>.</p>
            </div>
            <div class="leader">
                <img src="img/degaulle.jpg" alt="Charles de Gaulle">
                <h3>Charles de Gaulle</h3>
                <div class="rank">Liderul Forțelor Franceze Libere</div>
                <p>de Gaulle a condus rezistența împotriva ocupației germane și a jucat un rol esențial în eliberarea Franței.</p>
                <p>de Gaulle a fost o figură simbolică a rezistenței franceze și a avut o influență majoră în formarea guvernului francez post-război.</p>
            </div>
            <div class="leader">
                <img src="img/mussolini.jpg" alt="Benito Mussolini">
                <h3>Benito Mussolini</h3>
                <div class="rank">Dictatorul Italiei</div>
                <p>Dictatorul Italiei și aliat al Germaniei naziste, Mussolini a condus campaniile militare ale Italiei în Africa și Europa, deși cu succes limitat.</p>
                <p>Mussolini a fost capturat și executat în 1945, iar regimul său a căzut, Italia alăturându-se ulterior Aliaților.</p>
            </div>
            <div class="leader">
                <img src="img/tojo.jpg" alt="Hideki Tojo">
                <h3>Hideki Tojo</h3>
                <div class="rank">Prim-ministru al Japoniei și general în Armata Imperială Japoneză,</div>
                <p>Hideki Tojo a fost un militar și politician japonez care a jucat un rol central în politica Japoniei în timpul celui de-al Doilea Război Mondial. Născut pe 30 decembrie 1884, Tojo a crescut într-o familie militară și a urmat o carieră în armată. A urcat rapid în ierarhie, devenind general și, în cele din urmă, prim-ministru al Japoniei din 1941 până în 1944.</p>
                <p>După război, Tojo a fost capturat, judecat și executat pentru crime de război.</p>
            </div>
            <div class="leader">
                <img src="img/eisenhower.jpg" alt="Dwight D. Eisenhower">
                <h3>Dwight D. Eisenhower</h3>
                <div class="rank">General și Comandant Suprem al Forțelor Expediționare Aliate</div>
                <p>Dwight D. Eisenhower a fost un lider militar american care a jucat un rol esențial în planificarea și execuția invaziei Normandiei (D-Day) pe 6 iunie 1944, care a marcat începutul sfârșitului pentru Germania nazistă. Eisenhower a coordonat forțele Aliaților în Europa, contribuind semnificativ la victoriile în teatrul european de război. După război, a devenit al 34-lea președinte al Statelor Unite.</p>
            </div>
            <div class="leader">
                <img src="img/rommel.jpg" alt="Erwin Rommel">
                <h3>Erwin Rommel</h3>
                <div class="rank">Generalfeldmarschall în Wehrmacht (Armata Germană)</div>
                <p>Erwin Rommel, cunoscut și sub numele de "Vulpea Deșertului", a fost unul dintre cei mai respectați comandanți ai Germaniei naziste. A comandat Afrika Korps în campaniile din Africa de Nord și a fost recunoscut pentru abilitățile sale tactice și strategice. Rommel a fost implicat în conspirația de asasinare a lui Hitler, pentru care a fost forțat să se sinucidă în 1944.</p>
            </div>
            <div class="leader">
                <img src="img/montgomery.jpg" alt="Bernard Montgomery">
                <h3>Bernard Montgomery</h3>
                <div class="rank">Feldmareșal în Armata Britanică</div>
                <p>Bernard Montgomery, cunoscut sub numele de "Monty", a fost un comandant britanic renumit pentru victoria sa în bătălia de la El Alamein, care a inversat cursul războiului în Africa de Nord în favoarea Aliaților. De asemenea, a jucat un rol crucial în planificarea și execuția invaziei din Normandia și în eliberarea Europei de Vest.</p>
            </div>
            <div class="leader">
                <img src="img/zhukov.jpg" alt="Georgy Zhukov">
                <h3>Georgy Zhukov</h3>
                <div class="rank">Mareșal al Uniunii Sovietice</div>
                <p>Zhukov a coordonat apărarea Moscovei și Stalingradului și a condus ofensiva finală care a culminat cu cucerirea Berlinului în 1945, contribuind decisiv la înfrângerea Germaniei naziste.</p>
            </div>
            <div class="leader">
                <img src="img/yamamoto.jpg" alt="Isoroku Yamamoto">
                <h3>Isoroku Yamamoto</h3>
                <div class="rank">Amiral în Marina Imperială Japoneză</div>
                <p>Amiralul Isoroku Yamamoto a fost strategul principal al atacului de la Pearl Harbor, care a atras Statele Unite în război. Deși a obținut inițial succese semnificative, Yamamoto a recunoscut limitele resurselor Japoniei și a fost ucis în 1943 când avionul său a fost doborât de forțele americane.</p>
            </div>
            <div class="leader">
                <img src="img/chester.jpg" alt="Isoroku Yamamoto">
                <h3>Chester W. Nimitz</h3>
                <div class="rank">Amiral în Marina Statelor Unite</div>
                <p>Chester W. Nimitz a fost Comandantul Flotei Pacificului în timpul celui de-al Doilea Război Mondial. El a condus forțele navale americane la victorie în bătăliile cruciale de la Midway și Leyte Gulf, contribuind decisiv la înfrângerea Japoniei. Strategiile sale inovatoare au fost esențiale pentru succesul campaniilor din Pacific.</p>
            </div>
            <div class="leader">
                <img src="img/douglas.jpg" alt="Isoroku Yamamoto">
                <h3>Douglas MacArthur</h3>
                <div class="rank">General și Comandant Suprem al Forțelor Aliaților în Pacific</div>
                <p>Generalul Douglas MacArthur a fost una dintre cele mai proeminente figuri militare americane din teatrul de război din Pacific. El a condus forțele aliate în campania de recucerire a Filipinelor și a acceptat capitularea Japoniei la bordul USS Missouri în 1945. După război, a supravegheat ocuparea și reconstruirea Japoniei.</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024. Toate drepturile rezervate.</p>
    </footer>
    <script src="script/burger.js"></script>
</body>
</html>

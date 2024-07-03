<?php 
try {
    require_once('./assets/conn.php');
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
$stmt = $pdo->query("SELECT image, titre, description FROM actus ORDER BY id DESC");
$actus = $stmt->fetchAll(PDO::FETCH_ASSOC);


$stmt = $pdo->query("SELECT date, platform, description FROM updates WHERE date >= CURDATE() ORDER BY date ASC");
$updates = $stmt->fetchAll(PDO::FETCH_ASSOC);


$elements = [
    'actus' => $actus,
    'update' => $updates
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>GEST CORP</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./assets/images/logo.png" type="image/png">
</head>
<body>
    <div class="body">

    <header id="home">
        <div class="left-float">
            <a style="text-decoration: none;" href="#home">
                <div class="logo-container"> <!--logo-->
                    <img class="logo" src="./assets/images/logo.png" alt="Logo">
                    <span class="important-2 text-logo"> GEST <span class="important-1 text-logo">CORP</span></span>
                </div>
            </a>
        </div>
    
    
        <div class="right-float">   <!--nav-->
            <ul>
                <li><a href="#a propos">À propos</a></li>
                <li><a href="#app">Nos apps</a></li>
                <li><a href="#actus">Actualités</a></li>
                <li><a href="#Maj">Les mises à jour en cours</a></li>
            </ul>
        </div>

    </header>




    <main>
        <div class="title">Découvrez <span class="important-1 bold">GEST CORP</span>,<br> spécialiste <span class="important-2 bold">français</span> en gestion de JSP et sapeurs-pompiers</div>
        <div class="mid-30 info">
            <span class="info-text">Spécialisés dans les sites web pour la gestion des <span class="important-3 bold">jeunes sapeurs-pompiers</span>, <span class="important-3 bold">sapeurs-pompiers</span>, 
                <span class="important-3 bold">cadets</span>,  <span class="important-3 bold">amicales</span>,  <span class="important-3 bold">CIS/CS</span>, nous offrons des solutions sur <span class="important-4 bold">mesure pour optimiser les opérations</span>. <br>
                <span class="important-4 bold">Contactez-nous</span> pour découvrir comment nous pouvons soutenir votre service avec <span class="important-4 bold">nos technologies</span>.
            </span>
        </div>
        <div class="more"><a class="btn-more" href="#a propos">En savoir plus</a></div>
        <!--<div class="fade-out-image">
            <img src="assets/images/landing-page.png" alt="gest jsp">
        </div>-->

        <section> <!--section-->
            <section class="apropos" id="a propos"> <!--À propos-->
                <div class="aproposdiv">
                    <h2>À propos</h2>
                    <span class="span">
                        <span class="important-3 bold">Gest Corp</span> est une suite intégrée d'<span class="important-4 bold">applications web conçue pour optimiser</span> la gestion des différentes branches et activités liées aux <span class="important-3 bold">services de secours et d'associations</span>. Cette suite comprend :
                        <ul>
                            <li><span class="important-4 bold">Gest Amicale</span> : Une application dédiée à la <span class="important-3 bold">gestion des amicales de sapeurs-pompiers</span>.</li>
                            <li><span class="important-4 bold">Gest Association</span> : Un outil pour la <span class="important-3 bold">gestion administrative et opérationnelle des associations</span>.</li>
                            <li><span class="important-4 bold">Gest Cadet</span> : Une plateforme destinée à la <span class="important-3 bold">gestion des jeunes sapeurs-pompiers cadets</span>.</li>
                            <li><span class="important-4 bold">Gest Car</span> : Une application pour la <span class="important-3 bold">gestion des véhicules et du matériel roulant</span>.</li>
                            <li><span class="important-4 bold">Gest CIS</span> : Un outil de <span class="important-3 bold">gestion des centres d'incendie et de secours</span>.</li>
                            <li><span class="important-4 bold">Gest JSP</span> : Une application pour la <span class="important-3 bold">gestion des jeunes sapeurs-pompiers</span>.</li>
                            <li><span class="important-4 bold">Gest SPV</span> : Un outil pour la <span class="important-3 bold">gestion des sapeurs-pompiers volontaires</span>.</li>
                        </ul>
                        Chaque application "<span class="important-4 bold">Gest</span>" répond aux besoins spécifiques de son domaine, <span class="important-3 bold">offrant une solution complète</span> et <span class="important-4 bold">centralisée pour faciliter la gestion quotidienne</span> et <span class="important-3 bold">améliorer l'efficacité des opérations</span>.

                    </span>

                    <h2>Gest Corp et Terroirs Engagés</h2>
                    <span class="span">Gest Corp est membre du dispositif "<span class="important-3 bold">Terroirs Engagés</span>" par le biais de son fondateur <span class="important-4 bold">Quentin Baudis</span> qui est SPV dans la commune de Suippes (51 - Marne), qui valorise les citoyens engagés dans leur territoire. 
                    Ce programme, initié par la <span class="important-4 bold">Fédération Nationale des Sapeurs-Pompiers de France</span>, met en avant les artisans, producteurs et entrepreneurs SPV. </span>
                    <br><img src="./assets/images/terroirs_engages.png" alt="Terroirs Engagés">
                    <h2>Notre équipe</h2>
                    <span class="span"><span class="important-3 bold">L'équipe de Gest Corp</span> s'est agrandie pour répondre à la demande, comprenant désormais <span class="important-4 bold">deux personnes à temps plein</span> et une <span class="important-3 bold">dédiée à la formation et à l'administration</span>, assurant ainsi la croissance continue et le succès du projet.</span>
                </div>

            </section>
            <section class="Apps" id="app"> <!--les apps-->
                <span class="titlespan">Nos apps</span>
                <div class="carousel-container">
                    <button class="prev">&#10094;</button>
                    <div class="carousel">
                        <div class="carousel-track">
                            <div class="carousel-item">
                                <img src="./assets/images/img1.jpg" alt="Image 1">
                                <span>Gest JSP</span>
                            </div>
                            <div class="carousel-item">
                                <img src="./assets/images/img2.jpg" alt="Image 2">
                                <span>Gest AMICALE</span>
                            </div>
                            <div class="carousel-item">
                                <img src="./assets/images/img3.jpg" alt="Image 3">
                                <span>Gest CIS</span>
                            </div>
                            <div class="carousel-item">
                                <img src="./assets/images/img4.jpg" alt="Image 4">
                                <span>Gest SPV</span>
                            </div>
                            <div class="carousel-item">
                                <img src="./assets/images/img5.jpg" alt="Image 5">
                                <span>Gest Cadet</span>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-indicators"></div>

                    <button class="next">&#10095;</button>
                </div>
            </section>
            <div>
                <section class="actus" id="actus"><!--actus-->
                    <span class="titlespan">Actualités</span>
                    <div class="container">
                    <?php foreach ($elements['actus'] as $element) { ?>
                            <div class="actus-card">
                                <img src="./assets/actus/<?php echo $element['image'];?>" alt="Image de l'actualité">
                                <div class="actus-details">
                                    <h2><?php echo $element['titre'];?></h2>
                                    <p><?php echo $element['description'];?>.</p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </section>
            </div>


            <div> <!--Màj en cours-->
                <section class="Maj" id="Maj">
                    <span class="titlespan">Les mises à jour en cours</span>
                    <div class="container">
                        <div class="updates">
                            <?php
                            if (count($elements['update']) == 0) {
                                ?>
                                <div class="update">
                                <div class="update-date">Aucune mise à jour programmée.</div>
                                </div>
                                <?php
                            } else {
                                foreach ($elements['update'] as $element) { ?>
                                <div class="update">
                                    <div class="update-date"><?php echo $element['date'];?></div><div class="plateform"><?php echo $element['platform'];?></div>
                                    <div class="update-description"><?php echo $element['description'];?></div>
                                </div>
                            <?php } }?>
                        </div>
                    </div>
                </section>
            </div>
            <div></div> <!--autre ???-->
        </section>
    </main>




    <footer class="footer"> <!--footer ???-->
        <div class="footer__addr">
        <div class="logo-container"> <!--logo-->
            <img class="logo" src="./assets/images/logo.png" alt="Logo">
            <span class="important-2 text-logo"> GEST <span class="important-1 text-logo">CORP</span></span>
        </div>

            
        <h2>Contact</h2>
        
        <address>
            19 Lotissement Nantivet 51600 Suippes
            <br><br>

            
            <a class="footer__btn" href="mailto:example@gmail.com">Envoyez-nous un email</a>
        </address>
        </div>
        
        <ul class="footer__nav">
        <li class="nav__item">
            <h2 class="nav__title">Pages</h2>
    
            <ul class="nav__ul">
                <li>
                    <a href="#home">Home</a>
                </li>
                <li>
                    <a href="#a propos">À propos</a>
                </li>
                <li>
                    <a href="#app">Nos apps</a>
                </li>
                
                <li>
                    <a href="#actus">Actualités</a>
                </li>
                <li>
                    <a href="#Maj">Les mises à jour en cours</a>
                </li>
            </ul>
        </li>
        
        <li class="nav__item nav__item--extra">
            <h2 class="nav__title">Les Apps</h2>
            
            <ul class="nav__ul nav__ul--extra">
                <li>
                    <a href="#">Gest JSP</a>
                </li>
                
                <li>
                    <a href="#">Gest SPV</a>
                </li>
                
                <li>
                    <a href="#">Gest AMICALE</a>
                </li>
                
                <li>
                    <a href="#">Gest CIS</a>
                </li>
                
                <li>
                    <a href="#">Gest CADET</a>
                </li>
                
                <li>
                    <a href="#">Gest ASSOCIATION</a>
                </li>
            </ul>
        </li>
        
        <li class="nav__item">
            <h2 class="nav__title">Légal</h2>
            
            <ul class="nav__ul">
                <li>
                    <a href="./mentions.html">Mentions légales</a>
                </li>
                
                <li>
                    <a href="./cvg.html">CGV / CGU</a>
                </li>
            </ul>
        </li>
        </ul>
        
        <div class="legal">
        <p>&copy; 2024 GEST CORP. Tous droits réservés.</p>
        
        </div>
    </footer>
    <div class="blur-shape2"></div>
    <div class="blur-shape1"></div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./assets/js/script.js"></script>

</body>
</html>
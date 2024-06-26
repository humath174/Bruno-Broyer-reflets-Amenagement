<?php
// Connexion à la base de données
include('back/database.php');

$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

$site_id = 1;

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupère les données des réalisations depuis la base de données
$selectQuery = "SELECT * FROM realisation WHERE site_id = $site_id";
$result = $connexion->query($selectQuery);

// Ferme la connexion à la base de données
$connexion->close();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bruno Broyer Reflets Amenagements</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bruno Broyer Reflets Amenagements" />
    <meta name="keywords" content="pisciniste, bruno broyer reflets amenagements, bruno broyer, amenagements, piscine chatillon sur chalaronne, chatillon sur chalaronne, ain, rhone, auvergne rhone-alpes" />
    <meta name="author" content="DigitalGroup" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5TXPSHGCFL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-5TXPSHGCFL');
    </script>


    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,600,400italic,700' rel='stylesheet' type='text/css'>

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Flexslider -->
    <link rel="stylesheet" href="css/flexslider.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!--
    Default Theme Style
    You can change the style.css (default color purple) to one of these styles
    -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Styleswitcher ( This style is for demo purposes only, you may delete this anytime. ) -->
    <link rel="stylesheet" id="theme-switch" href="css/style.css">
    <!-- End demo purposes only -->


    <style>
        /* For demo purpose only */

        /*
        GREEN
        8dc63f
        RED
        FA5555
        TURQUOISE
        27E1CE
        BLUE
        2772DB
        ORANGE
        FF7844
        YELLOW
        FCDA05
        PINK
        F64662
        PURPLE
        7045FF

        */

        /* For Demo Purposes Only ( You can delete this anytime :-) */
        #colour-variations {
            padding: 10px;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
            width: 140px;
            position: fixed;
            left: 0;
            top: 100px;
            z-index: 999999;
            background: #fff;
            /*border-radius: 4px;*/
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            -webkit-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
            -moz-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
            -ms-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
            box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
        }
        #colour-variations.sleep {
            margin-left: -140px;
        }
        #colour-variations h3 {
            text-align: center;;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #777;
            margin: 0 0 10px 0;
            padding: 0;;
        }

        #colour-variations ul,
        #colour-variations ul li {
            padding: 0;
            margin: 0;
        }
        #colour-variations ul {
            margin-bottom: 20px;
            float: left;
        }
        #colour-variations li {
            list-style: none;
            display: inline;
        }
        #colour-variations li a {
            width: 20px;
            height: 20px;
            position: relative;
            float: left;
            margin: 5px;
        }



        #colour-variations li a[data-theme="style"] {
            background: #8dc63f;
        }
        #colour-variations li a[data-theme="red"] {
            background: #FA5555;
        }
        #colour-variations li a[data-theme="turquoise"] {
            background: #27E1CE;
        }
        #colour-variations li a[data-theme="blue"] {
            background: #2772DB;
        }
        #colour-variations li a[data-theme="orange"] {
            background: #FF7844;
        }
        #colour-variations li a[data-theme="yellow"] {
            background: #FCDA05;
        }
        #colour-variations li a[data-theme="pink"] {
            background: #F64662;
        }
        #colour-variations li a[data-theme="purple"] {
            background: #7045FF;
        }

        #colour-variations a[data-layout="boxed"],
        #colour-variations a[data-layout="wide"] {
            padding: 2px 0;
            width: 48%;
            border: 1px solid #ededed;
            text-align: center;
            color: #777;
            display: block;
        }
        #colour-variations a[data-layout="boxed"]:hover,
        #colour-variations a[data-layout="wide"]:hover {
            border: 1px solid #777;
        }
        #colour-variations a[data-layout="boxed"] {
            float: left;
        }
        #colour-variations a[data-layout="wide"] {
            float: right;
        }

        .option-toggle {
            position: absolute;
            right: 0;
            top: 0;
            margin-top: 5px;
            margin-right: -30px;
            width: 30px;
            height: 30px;
            background: #8dc63f;
            text-align: center;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            color: #fff;
            cursor: pointer;
            -webkit-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
            -moz-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
            -ms-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
            box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
        }
        .option-toggle i {
            top: 2px;
            position: relative;
        }
        .option-toggle:hover, .option-toggle:focus, .option-toggle:active {
            color:  #fff;
            text-decoration: none;
            outline: none;
        }
    </style>
    <!-- End demo purposes only -->

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>


<!--
    INFO:
    Add 'boxed' class to body element to make the layout as boxed style.
    Example:
    <body class="boxed">
-->
<body>

<!-- Loader -->
<div class="fh5co-loader"></div>

<div id="fh5co-page">
<section id="fh5co-header">
			<div class="container">
				<nav role="navigation">
					<ul class="pull-left left-menu">
						<li><a href="about.php">Réalisation</a></li>
						
						<li><a href="devis.php">Devis</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
					<h1 id="fh5co-logo"><a href="index.html">Acceuil<span>.</span></a></h1>
					
				</nav>
			</div>
		</section>
    <!-- #fh5co-header -->

    <section id="fh5co-hero" class="no-js-fullheight" style="background-image: url(images/full_image_1.jpg);" data-next="yes">
        <div class="fh5co-overlay"></div>
        <div class="container">
            <div class="fh5co-intro no-js-fullheight">
                <div class="fh5co-intro-text">
                    <!--
                        INFO:
                        Change the class to 'fh5co-right-position' or 'fh5co-center-position' to change the layout position
                        Example:
                        <div class="fh5co-right-position">
                    -->
                    <div class="fh5co-center-position">
                        <h2 class="animate-box">Mes réalisation</h2>
                        <h3 class="animate-box">Voici les differents photos de mes rélisation</h3>

                    </div>
                </div>
            </div>
        </div>
        <div class="fh5co-learn-more animate-box">
            <a href="#" class="scroll-btn">
                <span class="text">Descender pour en voir plus</span>
                <span class="arrow"><i class="icon-chevron-down"></i></span>
            </a>
        </div>
    </section>
    <!-- END #fh5co-hero -->

<section class="fh5co-projects">
    <table>
        <tr>
            <th>Titre</th>
            <th>Description</th>
        </tr>
        <?php
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            // Affiche le titre dans une cellule du tableau
            echo "<td>" . $row['titre'] . "</td>";
            // Affiche la description dans une cellule du tableau
            echo "<td>" . $row['description'] . "</td>";

            // Incrémente le compteur
            $count++;

            // Commence une nouvelle ligne après chaque troisième réalisation
            if ($count % 3 == 0) {
                echo "</tr><tr>";
            }
        }
        ?>
    </table>
    </section>
    



    <footer id="fh5co-footer">
        <div class="container">
            <div class="row row-bottom-padded-md">
                <div class="col-md-3 col-sm-6 col-xs-12 animate-box">
                    <div class="fh5co-footer-widget">
                        <h3>Entreprise</h3>
                        <ul class="fh5co-links">
                            <li><a href="#">A propos De</a></li>
                            <li><a href="#">Carriere</a></li>
                            <li><a href="#">Réalisation</a></li>
                            <li><a href="#">Devis</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="back/welcome.php">Connexion</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 animate-box">
                    <div class="fh5co-footer-widget">
                        <h3>Horraire</h3>
                        <ul class="fh5co-links">
                            <li><a href="#">Lundi : 8:00 - 19:00 </a></li>
                            <li><a href="#">Mardi : 8:00 - 19:00</a></li>
                            <li><a href="#">Mercredi : 8:00 - 19:00</a></li>
                            <li><a href="#">Jeudi : 8:00 - 19:00</a></li>
                            <li><a href="#">Vendredi : 8:00 - 19:00</a></li>
                            <li><a href="#">Samedi : Fermée</a></li>
                            <li><a href="#">Dimanche : Fermée</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 animate-box">
                    <div class="fh5co-footer-widget">
                        <h3>Contact Us</h3>
                        <p>
                            <a href="mailto:info@freehtml5.co">bruno-broyer@orange.fr</a> <br>
                            3 Lotissement le Clos des Narcisses, <br>
                            01400 Chatillon sur Chalaronne <br>
                            <a href="tel:+123456789">+33 6 84 66 26 58</a>
                        </p>
                    </div>
                </div>


            </div>

        </div>
        <div class="fh5co-copyright animate-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="fh5co-left"><small>&copy; 2023 <a href="index.html">Par </a>Bruno Broyer</small></p>
                        <p class="fh5co-right"><small class="fh5co-right">Designed by <a href="https://digitalgroup.matheo.site" target="_blank">DigitalGroup</a> Logo: <a href="http://unsplash.com" target="_blank">Lien</a></small></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END #fh5co-footer -->
</div>
<!-- END #fh5co-page -->

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>

<!-- For demo purposes only styleswitcher ( You may delete this anytime ) -->
<script src="js/jquery.style.switcher.js"></script>
<script>
    $(function(){
        $('#colour-variations ul').styleSwitcher({
            defaultThemeId: 'theme-switch',
            hasPreview: false,
            cookie: {
                expires: 30,
                isManagingLoad: true
            }
        });
        $('.option-toggle').click(function() {
            $('#colour-variations').toggleClass('sleep');
        });
    });
</script>
<!-- End demo purposes only -->

<!-- Main JS (Do not remove) -->
<script src="js/main.js"></script>

<!--
INFO:
jQuery Cookie for Demo Purposes Only.
The code below is to toggle the layout to boxed or wide
-->
<script src="js/jquery.cookie.js"></script>
<script>
    $(function(){

        if ( $.cookie('layoutCookie') != '' ) {
            $('body').addClass($.cookie('layoutCookie'));
        }

        $('a[data-layout="boxed"]').click(function(event){
            event.preventDefault();
            $.cookie('layoutCookie', 'boxed', { expires: 7, path: '/'});
            $('body').addClass($.cookie('layoutCookie')); // the value is boxed.
        });

        $('a[data-layout="wide"]').click(function(event){
            event.preventDefault();
            $('body').removeClass($.cookie('layoutCookie')); // the value is boxed.
            $.removeCookie('layoutCookie', { path: '/' }); // remove the value of our cookie 'layoutCookie'
        });
    });
</script>

</body>
</html>

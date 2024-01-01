<?php
// Démarrez la session
session_start();

// Vérifiez si la variable de session 'username' existe
if (isset($_SESSION['username'])) {
    // L'utilisateur a une session ouverte
    echo "Bienvenue, " . $_SESSION['username'] . "!";
} else {
    // Redirigez l'utilisateur vers la page de connexion
    header("Location: connexion.php");
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="msvalidate.01" content="97522F7AC2412B9FEB60193A02ED6806" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bruno Broyer Reflets Amenagements</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bruno Broyer Reflets Amenagements" />
    <meta name="keywords" content="pisciniste, bruno broyer reflets amenagements, bruno broyer, amenagements, piscine chatillon sur chalaronne, chatillon sur chalaronne, ain, rhone, auvergne rhone-alpes" />
    <meta name="author" content="DigitalGroup" />
    <link rel="stylesheet" href="style.css"> <!-- Lien vers le fichier CSS externe -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5TXPSHGCFL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-5TXPSHGCFL');
    </script>
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5TXPSHGCFL"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-5TXPSHGCFL');
</script>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Administration</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-dark" aria-current="page" href="welcome.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="devis-rec.php">Devis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark"  href="contact-rec.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark"  href="dashboard-img.php">Dashboard Image</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark"  href="dashboard-réal.php">Dashboard Réalisation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark"  href="logout.php">Déconnexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/site/index.html">Retourner sur le site</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h4 class="mt-4">Bienvenue sur l'Administration du site Bruno Broyer Reflets Amenagements</h4>

    <?php
    // Paramètres de connexion à la base de données
    include('database.php');

    // Créer une connexion à la base de données
    $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("La connexion à la base de données a échoué : " . $connexion->connect_error);
    }

    // Récupérer les informations des trois dernières demandes de devis
    $requeteDevis = "SELECT * FROM devis ORDER BY date DESC LIMIT 3";
    $resultatDevis = $connexion->query($requeteDevis);

    if ($resultatDevis->num_rows > 0) {
        echo "<h2 class='mt-4'>Informations des Trois Dernières Demandes de Devis</h2>";
        echo "<table class='table'>";
        echo "<thead><tr><th>ID</th><th>Nom</th><th>Prenom</th><th>Mail</th><th>Telephone</th><th>Description</th></tr></thead><tbody>";

        // Afficher les informations des trois dernières demandes de devis dans le tableau
        while ($rowDevis = $resultatDevis->fetch_assoc()) {
            echo "<tr><td>" . $rowDevis["id"] . "</td><td>" . $rowDevis["nom"] . "</td><td>" . $rowDevis["prenom"] . "</td><td>" . $rowDevis["mail"] . "</td><td>" . $rowDevis["tel"] . "</td><td>" . $rowDevis["description"] . "</td></tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p>Aucune demande de devis à afficher.</p>";
    }

    // Récupérer les informations des trois dernières demandes de contact
    $requeteContact = "SELECT * FROM contact ORDER BY date DESC LIMIT 3";
    $resultatContact = $connexion->query($requeteContact);

    if ($resultatContact->num_rows > 0) {
        echo "<h2 class='mt-4'>Informations des Trois Dernières Demandes de Contact</h2>";
        echo "<table class='table'>";
        echo "<thead><tr><th>ID</th><th>Nom</th><th>Prenom</th><th>Mail</th><th>Telephone</th><th>Description</th></tr></thead><tbody>";

        // Afficher les informations des trois dernières demandes de contact dans le tableau
        while ($rowContact = $resultatContact->fetch_assoc()) {
            echo "<tr><td>" . $rowContact["id"] . "</td><td>" . $rowContact["nom"] . "</td><td>" . $rowContact["prenom"] . "</td><td>" . $rowContact["mail"] . "</td><td>" . $rowContact["tel"] . "</td><td>" . $rowContact["description"] . "</td></tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p>Aucune demande de contact à afficher.</p>";
    }

    // Fermer la connexion à la base de données
    $connexion->close();
    ?>
</div>

</body>

</html>


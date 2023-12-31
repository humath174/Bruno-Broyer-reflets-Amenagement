<?php
// Démarrez la session
session_start();

// Vérifiez si la variable de session 'username' existe
if (isset($_SESSION['username'])) {
    // L'utilisateur a une session ouverte
    echo "Bienvenue, " . $_SESSION['username'] . "!";
} else {
    // Redirigez l'utilisateur vers la page de connexion
    header("Location: login.php");
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations des Utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
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
                    <a class="nav-link active" aria-current="page" href="welcome.php">Acceuil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="devis-rec.php">Devis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact-rec.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/site/index.html">Retourner sur le site</a>
                </li>

        </div>
    </div>
</nav>
<

<?php
// Paramètres de connexion à la base de données
include('database.php');


// Créer une connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupérer les informations des utilisateurs depuis la base de données
$requete = "SELECT * FROM contact";
$resultat = $connexion->query($requete);

if ($resultat->num_rows > 0) {
    echo "<h2>Informations des Utilisateurs</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nom</th><th>Prenom</th><th>Mail</th><th>Telephone</th><th>Description</th></tr>";

    // Afficher les informations des utilisateurs dans le tableau
    while ($row = $resultat->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nom"] . "</td><td>" . $row["prenom"] . "</td><td>" . $row["mail"] . "</td><td>" . $row["tel"] . "</td><td>" . $row["description"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "Aucune donnée à afficher.";
}

// Fermer la connexion à la base de données
$connexion->close();
?>

</body>
</html>

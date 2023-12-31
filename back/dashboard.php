<?php
// Démarrer la session
session_start();

// Vérifier si la variable de session 'username' existe
if (!isset($_SESSION['username'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connexion.php");
    exit();
}

// Paramètres de connexion à la base de données
include('database.php');
// Créer une connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupérer les 3 dernières lignes des devis
$requeteDevis = "SELECT * FROM devis ORDER BY date DESC LIMIT 3";
$resultatDevis = $connexion->query($requeteDevis);
$devis = $resultatDevis->fetch_all(MYSQLI_ASSOC);

// Récupérer les 3 dernières lignes des contacts
$requeteContacts = "SELECT * FROM contact ORDER BY date DESC LIMIT 3";
$resultatContacts = $connexion->query($requeteContacts);
$contacts = $resultatContacts->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        nav {
            background-color: #555;
            color: white;
            padding: 10px;
            text-align: center;
        }
        section {
            padding: 20px;
        }
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
        .logout-btn {
            background-color: #d9534f;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <h1>Tableau de Bord</h1>
</header>

<nav>
    <p>Bienvenue, <?php echo $_SESSION['username']; ?> | <button class="logout-btn" onclick="location.href='logout.php'">Déconnexion</button></p>
</nav>

<section>
    <h2>Devis</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Date</th>
        </tr>
        <?php foreach ($devis as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>

<section>
    <h2>Contacts</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Date</th>
        </tr>
        <?php foreach ($contacts as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>

</body>
</html>

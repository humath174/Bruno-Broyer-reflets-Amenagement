<?php
// Paramètres de connexion à la base de données
include('back/database.php');


// Créer une connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $description = $_POST['description'];

    // Échapper les caractères spéciaux pour éviter les injections SQL
    $nom = $connexion->real_escape_string($nom);
    $prenom = $connexion->real_escape_string($prenom);
    $email = $connexion->real_escape_string($email);
    $telephone = $connexion->real_escape_string($telephone);
    $description = $connexion->real_escape_string($description);

    // Insérer les données dans la table 'messages'
    $requete = "INSERT INTO contact (nom, prenom, mail, tel, description, date) VALUES ('$nom', '$prenom', '$email', '$telephone', '$description', current_date)";

    if ($connexion->query($requete) === TRUE) {
        echo "<p>Merci pour votre message ! Nous vous contacterons bientôt.</p>
<a href='index.html'>Retournez a l'acceuil</a>";
    } else {
        echo "Erreur : " . $requete . "<br>" . $connexion->error;
    }
}

// Fermer la connexion à la base de données
$connexion->close();
?>

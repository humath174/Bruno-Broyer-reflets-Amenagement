<?php

// Paramètres de connexion à la base de données
$serveur = "localhost";
$utilisateur = "nouveau_utilisateur";
$motDePasse = "mot_de_passe";
$baseDeDonnees = "dashboard";

// Connexion à la base de données
$conn = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$description = $_POST['description'];


// Préparer la requête SQL d'insertion
$sql = "INSERT INTO Contacts (nom, prenom, mail, tel, description) VALUES (?, ?, ?, ?, ?)";

// Préparer la requête pour éviter les injections SQL
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nom, $prenom, $email, $telephone, $description);

// Exécuter la requête
if ($stmt->execute()) {
    echo "Données enregistrées avec succès.";
} else {
    echo "Erreur lors de l'enregistrement des données : " . $stmt->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();
?>


<?php


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
$site_id = $_POST['description'];

// Préparer la requête SQL d'insertion
$sql = "INSERT INTO Contacts (nom, prenom, mail, tel, description, site_id) VALUES (?, ?, ?, ?, ?, ?)";

// Préparer la requête pour éviter les injections SQL
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nom, $prenom, $email, $telephone, $description, $site_id);

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


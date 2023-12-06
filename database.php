<?php
// Informations de connexion à la base de données
$serveur = "86.202.255.13:3306"; // Remplace par le nom de ton serveur MySQL
$utilisateur = "pma2022"; // Remplace par ton nom d'utilisateur MySQL
$motDePasse = "MotdePasseComplexe"; // Remplace par ton mot de passe MySQL
$baseDeDonnees = "bbra"; // Remplace par le nom de ta base de données

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

echo "Connexion réussie à la base de données";

// N'oublie pas de fermer la connexion à la fin de ton script si tu n'en as plus besoin
$connexion->close();
?>

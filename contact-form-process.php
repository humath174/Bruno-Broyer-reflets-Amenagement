<?php
if (isset($_POST['Email'])) {

    // Adresse de l'API Strapi (à adapter selon ta configuration Strapi)
    $strapi_url = "http://82.65.9.69/bbracontact"; 

    // Données du formulaire
    $name = $_POST['Name']; // requis
    $email = $_POST['Email']; // requis
    $message = $_POST['Message']; // requis

    // Créer les données à envoyer à Strapi
    $data = [
        'data' => [
            'nom' => $name,
            'email' => $email,
            'description' => $message
        ]
    ];

    // Convertir les données en JSON
    $json_data = json_encode($data);

    // Initialiser cURL
    $ch = curl_init($strapi_url);

    // Configuration de cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    // Exécuter la requête
    $response = curl_exec($ch);

    // Fermer cURL
    curl_close($ch);

    // Afficher un message de succès
    echo "Merci de nous avoir contactés. Nous vous répondrons bientôt.";
}
?>

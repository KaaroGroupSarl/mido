<?php
// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$objet = $_POST['objet'];
$message = $_POST['message'];

// Construction du message à envoyer
$to = "steveasterafovo@gmail.com, marciasmars@gmail.com";
$subject = "Nouveau message de contact sur la plateforme";
$body = "Nom : $nom\nPrénom(s) : $prenom\nAdresse e-mail : $email\nObjet : $objet\n\nMessage :\n$message";

// Envoi du message
$headers = "From: $email";
mail($to, $subject, $body, $headers);
?>

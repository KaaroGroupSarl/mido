<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "nom_utilisateur";
$mdp = "mot_de_passe";
$nom_bd = "nom_base_de_donnees";
$connexion = mysqli_connect($serveur, $utilisateur, $mdp, $nom_bd);

// Vérification de la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Récupération des données du formulaire de bénévolat
$benevole = $_POST['benevole'];
$nom = $_POST['nom'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insertion des données dans la base de données
$insertion = "INSERT INTO benevoles (benevole, nom, telephone, email, message) VALUES ('$benevole', '$nom', '$telephone', '$email', '$message')";

if (mysqli_query($connexion, $insertion)) {
    echo "Merci pour votre proposition de bénévolat !";
} else {
    echo "Une erreur est survenue : " . mysqli_error($connexion);
}

// Fermeture de la connexion à la base de données
mysqli_close($connexion);
?>

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

// Récupération des données du formulaire de don
$montant = $_POST['montant'];
$nom = $_POST['prenom-nom'];
$email = $_POST['email'];
$carte = $_POST['carte'];
$exp = $_POST['exp'];

// Insertion des données dans la base de données
$insertion = "INSERT INTO dons (montant, nom, email, carte, exp) VALUES ('$montant', '$nom', '$email', '$carte', '$exp')";

if (mysqli_query($connexion, $insertion)) {
    echo "Merci pour votre don !";
} else {
    echo "Une erreur est survenue : " . mysqli_error($connexion);
}

// Fermeture de la connexion à la base de données
mysqli_close($connexion);
?>

<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "nom_utilisateur";
$mdp = "mot_de_passe";
$bdd = "nom_base_de_donnees";
$connexion = mysqli_connect($serveur, $utilisateur, $mdp, $bdd);

// Vérification de la connexion
if (!$connexion) {
  die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Traitement du formulaire de contact
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $prenom = htmlspecialchars($_POST["prenom"]);
  $nom = htmlspecialchars($_POST["nom"]);
  $email = htmlspecialchars($_POST["email"]);
  $objet = htmlspecialchars($_POST["objet"]);
  $message = htmlspecialchars($_POST["message"]);
  
  // Insertion des données dans la table "messages"
  $sql = "INSERT INTO messages (prenom, nom, email, objet, message) VALUES ('$prenom', '$nom', '$email', '$objet', '$message')";
  if (mysqli_query($connexion, $sql)) {
    echo "Votre message a été enregistré avec succès.";
  } else {
    echo "Erreur : " . $sql . "<br>" . mysqli_error($connexion);
  }
  
  // Fermeture de la connexion à la base de données
  mysqli_close($connexion);
}
?>

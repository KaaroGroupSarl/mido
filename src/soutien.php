<?php
// Récupération des données du formulaire
$type = $_POST['type'];
$date = $_POST['date_harcelement'];
$lieu = $_POST['lieu'];
$motifs = implode(",", $_POST['motifs']);
$motif_autre = $_POST['motif_autre'];
$temoin = $_POST['signaler'] == 'temoin';
$prenom_temoins = $temoin ? $_POST['prenom'] : '';
$nom_temoins = $temoin ? $_POST['nom'] : '';
$telephone_temoins = $temoin ? $_POST['telephone'] : '';
$mail_temoins = $temoin ? $_POST['mail'] : '';
// Connexion à la base de données
$conn = mysqli_connect("localhost", "username", "password", "nom_base_de_donnees");
// Vérification de la connexion
if (!$conn) {
  die("Connexion échouée : " . mysqli_connect_error());
}
// Requête d'insertion dans la base de données
$sql = "INSERT INTO signalements (type, date, lieu, motifs, motif_autre, temoin, prenom_temoins, nom_temoins, telephone_temoins, mail_temoins)
VALUES ('$type', '$date', '$lieu', '$motifs', '$motif_autre', $temoin, '$prenom_temoins', '$nom_temoins', '$telephone_temoins', '$mail_temoins')";
if (mysqli_query($conn, $sql)) {
  echo "Le signalement a été enregistré avec succès.";
} else {
  echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
}
// Fermeture de la connexion
mysqli_close($conn);
?>

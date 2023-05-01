<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $prenom = $_POST["prenom"];
  $nom = $_POST["nom"];
  $telephone = $_POST["telephone"];
  $mail = $_POST["mail"];
  $type = $_POST["type"];
  $date_harcelement = $_POST["date_harcelement"];
  $lieu = $_POST["lieu"];
  $motifs = implode(", ", $_POST["motifs"]);
  $motif_autre = $_POST["motif_autre"];
  $gravite = $_POST["range"];
  
  // Envoi d'un mail à l'administrateur
  $to = "marciasmars@gmail.com";
  $subject = "Signalement d'un harcèlement";
  $message = "Nom et prénom du témoin : " . $prenom . " " . $nom . "\n" .
             "Téléphone du témoin : " . $telephone . "\n" .
             "Adresse email du témoin : " . $mail . "\n" .
             "Type de l'harcèlement : " . $type . "\n" .
             "Date de l'harcèlement : " . $date_harcelement . "\n" .
             "Lieu de l'harcèlement : " . $lieu . "\n" .
             "Motifs de l'harcèlement : " . $motifs . "\n" .
             "Autre motif : " . $motif_autre . "\n" .
             "Gravité de l'harcèlement : " . $gravite . "/5";
  $headers = "From: marciasmars@gmail.com";

  mail($to, $subject, $message, $headers);
  
  // Redirection vers la page de confirmation
  header("Location: confirmation.php");
  exit;
}
?>
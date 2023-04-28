<?php
$sql = "SELECT * FROM utilisateurs";
$resultat = $conn->query($sql);

if ($resultat->num_rows > 0) {
    // Affichage des données de chaque utilisateur
    while($row = $resultat->fetch_assoc()) {
        echo "Nom: " . $row["nom"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 résultats";
}

// Fermeture de la connexion
$conn->close();
?>

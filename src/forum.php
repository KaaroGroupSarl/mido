<?php
  // Connexion à la base de données
  $servername = "localhost";
  $username = "nom_utilisateur";
  $password = "mot_de_passe";
  $dbname = "nom_base_de_donnees";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Récupération des publications depuis la base de données
  $sql = "SELECT * FROM publications";
  $result = $conn->query($sql);

  // Affichage des publications
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<li>";
      echo "<h3>" . $row["titre"] . "</h3>";
      echo "<p>" . $row["contenu"] . "</p>";
      echo "<div class='actions'>";
      echo "<button class='btn-aime'>J'aime</button>";
      echo "<button class='btn-commente'>Commenter</button>";
      echo "<button class='btn-partage'>Partager</button>";
      echo "</div>";
      echo "<div class='commentaires'>";
      echo "<h4>Commentaires</h4>";
      // Récupération des commentaires pour cette publication depuis la base de données
      $sql2 = "SELECT * FROM commentaires WHERE publication_id=" . $row["id"];
      $result2 = $conn->query($sql2);
      if ($result2->num_rows > 0) {
        echo "<ul class='liste-commentaires'>";
        while($row2 = $result2->fetch_assoc()) {
          echo "<li>";
          echo "<p>" . $row2["nom_utilisateur"] . ":</p>";
          echo "<p>" . $row2["contenu"] . "</p>";
          echo "<div class='actions'>";
          echo "<button class='btn-aime'>J'aime</button>";
          echo "</div>";
          echo "</li>";
        }
        echo "</ul>";
      }
      // Formulaire pour ajouter un commentaire
      echo "<form>";
      echo "<label for='commentaire'>Ajouter un commentaire :</label>";
      echo "<textarea id='commentaire' name='commentaire' rows='3' required></textarea>";
      echo "<button type='submit'>Commenter</button>";
      echo "</form>";
      echo "</div>";
      echo "</li>";
    }
  }
  $conn->close();
?>

// NAVIGATION
// Ajouter une classe active au lien actuellement sélectionné dans la navigation
const navLinks = document.querySelectorAll('nav a');

navLinks.forEach(link => {
  link.addEventListener('click', function() {
    navLinks.forEach(link => link.classList.remove('active'));
    this.classList.add('active');
  });
});

 // SIGNALER
 //Sélection de date antérieure
 const dateInput = document.getElementById("date_harcelement");
const now = new Date();
const today = now.toISOString().slice(0, 10);
dateInput.min = today;


 // Fonction pour afficher ou masquer les champs des témoins en fonction du choix de l'utilisateur
function afficherTemoins() {
  var radios = document.getElementsByName('signaler');
  var infosTemoins = document.getElementById('infosTemoins');
  if (radios[0].checked) {
    infosTemoins.style.display = 'block';
  } else {
    infosTemoins.style.display = 'none';
  }
}

// Fonction pour afficher ou masquer le champ "autre motif" en fonction du choix de l'utilisateur
function afficherMotifAutre() {
  var checkbox = document.getElementsByName('motifs[]')[14];
  var motifAutre = document.getElementById('motifAutre');
  if (checkbox.checked) {
    motifAutre.style.display = 'block';
  } else {
    motifAutre.style.display = 'none';
  }
}

// Fonction pour afficher ou masquer les champs de coordonnées en fonction du choix de l'utilisateur
function afficherCoordonnees() {
  var radios = document.getElementsByName('coordonnees');
  var coordonnees = document.getElementById('coordonnees');
  if (radios[0].checked) {
    coordonnees.style.display = 'block';
  } else {
    coordonnees.style.display = 'none';
  }
}

// Subrillance du range sélectionné
const range = document.getElementById('range');
const details = document.querySelectorAll('.slider-details .detail');

range.addEventListener('input', function() {
  let value = parseInt(range.value);
  
  // Mettre en surbrillance la détail correspondant à la valeur sélectionnée
  details.forEach((detail, index) => {
    if (index === value - 1) {
      detail.style.fontWeight = 'bold';
      detail.style.color = '#ef4135'
    } else {
      detail.style.fontWeight = 'normal';
    }
  });
});

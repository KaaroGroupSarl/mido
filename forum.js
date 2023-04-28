// Récupération des éléments du DOM
const formPublication = document.querySelector('.publication form');
const listePublications = document.querySelector('#liste-publications');

// Fonction pour afficher une publication
function afficherPublication(titre, contenu) {
  // Création des éléments
  const li = document.createElement('li');
  const h3 = document.createElement('h3');
  const pContenu = document.createElement('p');
  const divActions = document.createElement('div');
  const btnAime = document.createElement('button');
  const btnCommente = document.createElement('button');
  const btnPartage = document.createElement('button');
  const divCommentaires = document.createElement('div');
  const h4 = document.createElement('h4');
  const ulCommentaires = document.createElement('ul');

  // Ajout des classes CSS
  li.classList.add('publication');
  divActions.classList.add('actions');
  btnAime.classList.add('btn-aime');
  btnCommente.classList.add('btn-commente');
  btnPartage.classList.add('btn-partage');
  divCommentaires.classList.add('commentaires');
  ulCommentaires.classList.add('liste-commentaires');

  // Ajout des contenus
  h3.textContent = titre;
  pContenu.textContent = contenu;
  btnAime.textContent = 'J\'aime';
  btnCommente.textContent = 'Commenter';
  btnPartage.textContent = 'Partager';
  h4.textContent = 'Commentaires';

  // Ajout des éléments dans le DOM
  divActions.appendChild(btnAime);
  divActions.appendChild(btnCommente);
  divActions.appendChild(btnPartage);

  divCommentaires.appendChild(h4);
  divCommentaires.appendChild(ulCommentaires);

  li.appendChild(h3);
  li.appendChild(pContenu);
  li.appendChild(divActions);
  li.appendChild(divCommentaires);

  listePublications.insertBefore(li, listePublications.firstChild);
}

// Événement de soumission du formulaire de publication
formPublication.addEventListener('submit', function(e) {
  e.preventDefault();
  const titre = e.target.titre.value;
  const contenu = e.target.contenu.value;
  afficherPublication(titre, contenu);
  e.target.reset();
});

// Événement de clic sur le bouton "J'aime"
listePublications.addEventListener('click', function(e) {
  if (e.target.classList.contains('btn-aime')) {
    const parent = e.target.closest('.publication');
    const btnAime = parent.querySelector('.btn-aime');
    const nbAime = parent.querySelector('.nb-aime');
    const nbAimeActuel = parseInt(nbAime.textContent);
    btnAime.classList.toggle('aime');
    if (btnAime.classList.contains('aime')) {
      nbAime.textContent = nbAimeActuel + 1;
    } else {
      nbAime.textContent = nbAimeActuel - 1;
    }
  }
});

// Événement de clic sur le bouton "Commenter"
listePublications.addEventListener('click', function(e) {
  if (e.target.classList.contains('btn-commente')) {
    const parent = e.target.closest('.publication');
    const divCommentaires = parent.querySelector('.commentaires');
    divCommentaires.classList.toggle('affiche-commentaires');
  }
});

// Événement de soumission du formulaire de commentaire
listePublications.addEventListener('submit', function(e) {
  e.preventDefault();
  const parent = e.target.closest('.publication');
  const ulCommentaires = parent.querySelector('.liste-commentaires');
  const nom = 'Utilisateur anonyme';
  const commentaire = e
// Fonction pour ajouter un commentaire
function ajouterCommentaire(e) {
  e.preventDefault();

  // Récupération des éléments du formulaire
  const publication = e.target.parentNode.parentNode;
  const listeCommentaires = publication.querySelector('.liste-commentaires');
  const champCommentaire = publication.querySelector('#commentaire');
  const contenuCommentaire = champCommentaire.value.trim();

  // Vérification que le champ commentaire n'est pas vide
  if (contenuCommentaire === '') {
    alert('Le champ commentaire est vide.');
    return;
  }

  // Création du nouvel élément commentaire
  const nouvelElementCommentaire = document.createElement('li');
  const nomUtilisateurCommentaire = 'John Doe'; // À remplacer par le nom de l'utilisateur connecté
  nouvelElementCommentaire.innerHTML = `<p><strong>${nomUtilisateurCommentaire} :</strong></p><p>${contenuCommentaire}</p><div class="actions"><button class="btn-aime">J'aime</button></div>`;
  
  // Ajout du nouvel élément commentaire à la liste des commentaires
  listeCommentaires.appendChild(nouvelElementCommentaire);

  // Effacement du contenu du champ commentaire
  champCommentaire.value = '';
}

// Écouteur d'événement pour le formulaire de commentaire
const formCommentaire = document.querySelectorAll('form')[1];
formCommentaire.addEventListener('submit', ajouterCommentaire);
}
)
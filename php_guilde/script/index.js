// Création variable 'myUser' qui va tenter de récupérer un item 'myUser' dans le localStorage
// Si elle ne récupère pas = utilisateur pas connecté. 
let myUser = JSON.parse(localStorage.getItem('myUser'));

// Récupérer des éléments HTML utile
let formIndex = document.getElementById('formIndex');
let helloMSG = document.getElementById('helloMSG');
let pseudoSlot = document.getElementById('pseudoSlot');

if (myUser == null){ // pas connecté
    // je cache le message pour dire bonjour
    helloMSG.style.display = "none";
    // j'affiche plutôt le formulaire
    formIndex.style.display = "block";
} else {
    // je cache le message pour dire bonjour
    helloMSG.style.display = "block";
    // j'affiche plutôt le formulaire
    formIndex.style.display = "none";
    // je rajoute nom pseudo dans le texte helloMSG
    pseudoSlot.textContent = myUser.pseudo;
}
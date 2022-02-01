// Récupération du formulaire tout en lui ajoutant une écoute. 
// Submit = envoyer lors qu click bouton
document.getElementById('registerForm').addEventListener("submit", function(event){
    event.preventDefault(); // prevenir des erreur de navigateur
    
    // Récupération des données du formulaire dans une variable (le forumaulaire est ici représenté avec this)
    let data = new FormData(this); // classe native à js pour gérer les formulaires et créer nouvel objet avec input formulaire écouté.

    // Je crée une variable qui sera une instance de XMLHTTPREQUEST = interaction with server
    let xhr = new XMLHttpRequest();

    // je vais faire appel à la fonction onreadystatechange qui retourne les changements d'états du client (navigateur)
    // selon les résultats de la requête XML
    xhr.onreadystatechange=function(){
        // si le serveur me répond avec un code http 200 et readystate est égal à 4
        // 4 = requête envoyé, serveur traité requête, réponse du serveur et client (nav) à fini de télécharger le contenu de la réponse
        if(this.readyState == 4 && this.status == 200){
            console.log(this.response);
            // je parse(décoder) le json reçu pour pouvoir l'exploiter
            let res = JSON.parse(this.response);
            // si dans la réponse je trouve success égale à 1 (cf registerForm.php)
            if(res.success ==1){
                // je créée un objet my User avec une clé pseudo dont la valeur est vide (pour le moment)
                let myUser = {"pseudo" : ""}; // --> Création objet accolade, avec la clé {"pseudo" : à vide}
                // j'attribue la valeur reçue dans le résultat de la requête à cette clé
                myUser.pseudo = res.data.pseudo; // mettre à jour objet. 
                // Je crée une nouvelle variable pour stocker le rendu du stringify sur l'objet myUser
                let toJson = JSON.stringify(myUser); // localstorage
                // je crée l'item myUser dans le localStorage  = setItem (céer ou modifier si existe déjà)
                localStorage.setItem('myUser',toJson); // je nomme l'item + ce que je veux mettre dedans. 
                // Afficher alterne utilisateur pour confirmer enregistrement. 
                alert(res.msg);
            } else {
                alert(res.msg);
            }
        // Toutes les 4 réponses ok mais code de statut différents (exemple 400 = erreur)
        } else if (this.readySate == 4){
            alert("Une erreur est survenu");
        }
    }
    // je demande à ma variable xhr d'établir une connection en POST (vers le lien que je lui donne)
    // le true signalera que notre reuqête est en asynchrone
    xhr.open("POST", "http://localhost/exo_php/php_guilde/controllers/registerUser.php", true);
    // Demander à la variable xhr d'envoyer le tout au controlleur en lui passant data en paramètre
    // data = toutes les données du formulaire
    xhr.send(data);

    // par défaut je retourne un false pour ne pas bloquer le script
    return false;
})
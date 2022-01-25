<?php
    //Ajout de la vue 
    include('vue_article.php');
    //Connexion bdd
    include('connect.php');

    //test existance des champs du formulaire 
    if (isset($_POST['nom_article'])&& isset($_POST['contenu_article'])) {
        //création des deux variables pour récupérer les contenu des super globale POST
        $name = $_POST['nom_article'];
        $content = $_POST['contenu_article'];

        // ajout du modèle article 
        include('model_article.php');
    } else {
        echo "<p>Veuillez remplir tous les champs du formulaire</p>";
    }
?>
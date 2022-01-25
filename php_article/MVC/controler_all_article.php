<?php
    //Ajout de la vue 
    include('vue_all_article.php');
    //Connexion bdd
    include('connect.php');

    // test si appel bouton
    if (isset($_GET)) {
        include('model_all_article.php');
    }
?>
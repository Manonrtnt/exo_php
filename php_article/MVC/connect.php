<?php
    // Connexion bdd
    $bdd=new PDO('mysql:host=localhost;dbname=article', 'root','', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
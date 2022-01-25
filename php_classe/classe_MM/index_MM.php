<?php
    // importer le fichier class.php
    include 'class.php';
    // require 'class.php'; même fonction 
    echo 'chargement du fichier class.php';

    // instancier / créer un objet : 
    $voiture1 = new Vehicule('Voiture 1', 4, 150);

    // Afficher le détail d'un objet : prendre objet et regarder dedans
    var_dump($voiture1);

    //$voiture1->demarrage();

    $maison1 = new Maison ('Maison1',30,15,2);
    //$maison1->surface();
    echo "La surface de la $maison1->nomMaison est égale à : ".$maison1->surface()." m²";
?>


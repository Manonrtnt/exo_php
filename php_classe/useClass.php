<?php
    // Importer le fichier cotnenant la class Vehicule
    //include('vehicule.php');
    require 'vehicule.php';

    // Instancier un objet vehicule à partir de la classe Vehicule
    $voiture = new Vehicule();

    // Ajout de valeur aux attributs
    $voiture->nomVehicule ="Fiat 500";
    $voiture->nbrRoue =4;
    $voiture->vitesse =180;

    $moto = new Vehicule();
    $moto->nomVehicule ="AJS 18S";
    $moto->nbrRoue =2;
    $moto->vitesse =180;

    // Utilisation de la méthde démarer sur instance $voiture et $moto
    $voiture->demarrer();
    $moto->demarrer();

    // Méthode detect()
    $voiture->detect();
    $moto->detect();

    // Methode boost
    $voiture->boost();
    var_dump($voiture);
    echo "<p>La vitesse max de la voiture ".$voiture->nomVehicule." est maintenant de ".$voiture->vitesse." km/h";

    // Methode rapido
    rapido($voiture, $moto);
?>
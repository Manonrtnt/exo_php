<?php
    class Vehicule{
        //Attributs / propriétés de la classe :
        public $nomVehicule;
        public $nbrRoue = 4;
        public $vitesse;
        // Créer contructeur / passer des variable pour récupérer valeurs 
        public function __construct($nom, $roue, $vitesse){
            // Attribu classe = variable
            $this ->nomVehicule = $nom;
            $this ->nbrRoue = $roue;
            $this ->vitesse = $vitesse;
        }
        // Méthode pour afficher nom de l'objet + 'qui a demarré' 
        public function demarrage(){
            //echo '.$this->nomVehicule.'' a démarré';
            echo "$this->nomVehicule a demarré";
        }
    }

    class Maison{
            public $nomMaison;
            public $longueur;
            public $largeur;
            public $nbEtage;

        public function __construct($nom, $longueur, $largeur, $etage){
            // Attribu classe = variable
            $this ->nomMaison = $nom;
            $this ->longueur = $longueur;
            $this ->largeur = $largeur;
            $this ->nbEtage = $etage;
        }
        public function surface(){
            //echo "La surface de $this->nomMaison est égale à ($this->longueur * $this->largeur)*$this->nbEtage m²";
            //return ($this->longueur * $this->largeur)*$this->nbEtage;
            return ($this->longueur*$this->largeur)*$this->nbEtage;
        }
    }

    class Test{
        private $nomTest;
        private $numeroTest;

        public function __construct($nom,$numero){
            $this ->nomTest = $nom;
            $this ->numeroTest = $numero;
        }
        //getter = récupérer valeur (quand private)
        public function getNom(){
            return $this->nomTest;
        }
        // setter = remplacer une valeur 
        public function setNom($new_nom){
            $this->nom = $new_nom;
        }
    }

    class User{
        private $id;
        private $nom_user;
        private $prenom_user;

        public function getId(){
            return $this->id;
        }
        public function setid($newId){
            $this->id=$newId;
        }
    }

    class Tp{
        private $id;
        private $nom_tp;
        private $date_tp;
        private $sujet_tp;
    }
?>
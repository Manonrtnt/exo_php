<?php
    class Vehicule{
        // attributs
        public $nomVehicule;
        public $nbrRoue;
        public $vitesse;

        // Methode
        public function demarrer(){
            // Désigner l'instance sur lequel on est (exemple $vehicule1)
            echo "<p>Démarrage de la $this->nomVehicule vroum vroum</p>";
        }

        public function detect(){
            if ($this->nbrRoue ==2){
                echo "<p>Le véhicule ".$this->nomVehicule." est une moto</p>";
            } else {
                echo "<p>Le véhicule ".$this->nomVehicule." est une voiture</p>";
            }
        }
        public function boost(){
            return $this->vitesse +=50;
        }
        public function rapido(){
            if ($vehicule1->vitesse >$vehicule2->vitesse){
                return $vehicule1->nomVehicule;
            } else {
                return $vehicule2->nomVehicule;
            }
        }
    }
?>
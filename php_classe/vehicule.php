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
                return "<p>Le véhicule ".$this->nomVehicule." est une moto</p>";
            } else {
                return "<p>Le véhicule ".$this->nomVehicule." est une voiture</p>";
            }
        }
        public function boost(){
            return $this->vitesse +=50;
        }
        public function faster($toCompare){
        if ($this->vitesse > $toCompare->vitesse){
            return "<p>Le véhicule le plus rapide est : ".$this->nomVehicule;
        } else if ($toCompare->vitesse > $this->vitesse){
            return "<p>Le véhicule le plus rapide est : ".$toCompare->nomVehicule;
        } else {
            return "Les véhicules".$this->nomVehicule." et ".$toCompare->nomVehicule." ont la même vitesse max";
        }
    }
    }

?>
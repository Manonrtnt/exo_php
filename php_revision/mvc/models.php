<?php
    class Archer {
        public $name;
        public $vie = 5;
        public $sexe;

        public function __construct($name,$sexe){
            $this->name=$name;
            $this->sexe=$sexe;
        }

        public function attack($nameAttack, $target){
            echo("<p>$nameAttack attaque $target</p>");
        }
        public function protection(){
            $this->vie -= rand(0,1);
        }
    }

    class Mage extends Archer{
        public function __construct($name,$sexe){
            parent::__construct($name,$sexe);
        }
    }
?>
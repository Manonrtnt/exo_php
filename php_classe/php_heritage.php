<?php
    class Mere
    {
        public $nom;
        public function __construct($nom)
        {
            $this->nom = $nom;
        }
        public function parler()
        {
            print_r("Bonjour !");
        }
    }
    class Enfant extends Mere
    {               // extends lie l'enfant au parent
        public function __construct($nom)
        {
            parent::__construct($nom);          // Appelle le constructeur du parent
        }
    }

    $enfant = new Enfant("Manon");
    $enfant->parler();
    var_dump($enfant);
?>
<?php
    class DbConfig {
        // je créée les attributs de ma bdd config
        private $host = "127.0.0.1";
        private $database_name = "guildsite";
        private $username = "root";
        private $password = "root";

        // l'attribut suivant est en public
        // pour permettre aux autres classes d'accéder à la connection à bdd
        public $connect;

        // Je créée la fonction pour appeler le système de connexion à la bdd
        //celle-ci va permettre d'injecter les attributs en private dans l'attribut qui est dans public.
        public function getConnection() {
            // vérifier attribut connect est bien null
            $this->connect = null;
            try {
                $this->connect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->connect->exec("set names utf8");
            } catch(PDOException $exception) {
                echo "Database could not be connected:".$exception->getMessage();
            }
            return $this->connect;
        }
    }
?>
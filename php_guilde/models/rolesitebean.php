<?php
    class RoleSiteBean{
        // deux attribut pour se connecter à bdd
        public $connect; // établir sa connection à lui (cf fonction getConnection)
        // et en private le nom de sa table.
        private $table ="rolesitebean";

        // attributs de la classe (besoin de l'utilsiateur dans bdd)
        private $idRoleSite;
        private $roleSiteName;

        // constructor qui va établir la connection à la bdd
        public function __construct(){
            // injecter nouvelle instance de db config
            $this->connect = new DbConfig();
            // donne le retour connect de la fonction
            $this->connect = $this->connect->getConnection();
        }

        // Générer getters setters 
        public function getTable(){
            return $this->table;
        }

        public function getIdRoleSite(){
            return $this->idRoleSite;
        }

        public function getRoleSiteName(){
            return $this->roleSiteName;
        }
        public function setRoleSiteName($roleSiteName){
            $this->roleSiteName = $roleSiteName;
        }

        // Création des méthodes de bases CRUD
        // READ : récupérer la liste de tous les utilisateurs
        public function getRolesSite(){
            // stockage de la requête dans une varaible
            $myQuery = 'SELECT * FROM' .$this->table.'';
            // stockage dans variable de la préparation de la requête (requête préparé) = éviter injection stmt:état
            $stmt = $this->connect->prepare($myQuery);
            // exécution de la requête après sa préparation
            $stmt->execute();
            // je retourne le résultat
            return $stmt;
        }

        // READ : récupérer 1 utilisateur selon son pseudo
        //(peut-être modifié avec recherche par id ou mail, etc)
        public function getSingleRoleSite(){
            // stockage de la requête dans une varaible
            $myQuery = 'SELECT * FROM' .$this->table.'WHERE roleSiteName='.$this->roleSiteName.'';
            // stockage dans variable de la préparation de la requête (requête préparé) = éviter injection stmt:état
            $stmt = $this->connect->prepare($myQuery);
            // exécution de la requête après sa préparation
            $stmt->execute();
            // je retourne le résultat
            return $stmt;
        }

        // CREATE : créer un utilisateur dans la table userBean /  insertion (pas d'idRole pour le moment)
        public function createRoleSite(){
            // dans cette requête j'ai crée les paramètres :pseudo, :password et :mail 
            //auxquels j'attribuerais des valeurs lors du bind des paramètres
            $myQuery = 'INSERT INTO'.$this->table.
                        'SET 
                            roleSiteName = :roleSiteName';
            $stmt = $this->connect->prepare($myQuery);
            
            // bind/lier les paramètres
            $stmt->bindParam(':roleSiteName', $this->roleSiteName); 

            // retourne true ou false si exécuté
            return $stmt->execute();
        }

        // UPDATE : mettre à jour un utilisateur (pseudo, mail ou password) // après le setAttribut.  
        public function updateRoleSite(){
            $myQuery = 'UPDATE'.$this->table.
            'SET 
                roleSiteName = :roleSiteName, 
                WHERE
                    roleSiteName = :roleSiteName2';
            
            $stmt = $this->connect->prepare($myQuery);
    
            // bind/lier les paramètres
            $stmt->bindParam(':roleSiteName', $this->roleSiteName); 
            $stmt->bindParam(':roleSiteName2', $this->roleSiteName); 

            // if ($stmt->execute()){
            // je retourne true si mise à jour ok
            //     return true;
            // } else {
            //     return false;
            // }
            
            // = à ci-dessous
            return $stmt->execute();
        }

        //DELETE : suppresion utilisateur (selon pseudo, id ou mail). 
        public function deleteUser(){
            $myQuery = 'DELETE FROM' .$this->table.'WHERE roleSiteName='.$this->roleSiteName.'';
            // stockage dans variable de la préparation de la requête (requête préparé) = éviter injection stmt:état
            $stmt = $this->connect->prepare($myQuery);
            //bind
            $stmt->bindParam(':roleSiteName',$this->roleSiteName);
            // je retourne le résultat executé
            return $stmt->execute();
        }
    }
?>
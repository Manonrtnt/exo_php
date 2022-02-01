<?php
    class UserBean{
        // deux attribut pour se connecter à bdd
        public $connect; // (cf fonction getConnection)
        // et en private le nom de sa table.
        private $table ="userbean";

        // attributs de la classe (besoin de l'utilsiateur dans bdd)
        private $idUser;
        private $pseudo;
        private $password;
        private $mail;
        // Ajouter lien id de plus bas niveau // Admin gèrera l'upgrade plus tard
        private $idRoleGame=4;
        private $idRoleSite=4;

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
    
        public function getIdUser(){
            return $this->idUser;
        }
    
        public function getPseudo(){
            return $this->pseudo;
        }
        public function setPseudo($pseudo){
            $this->pseudo = $pseudo;
        }
    
        public function getPassword(){
            return $this->password;
        }
        public function setPassword($password){
            $this->password = $password;
        }
    
        public function getMail(){
            return $this->mail;
        }
        public function setMail($mail){
            $this->mail = $mail;
        }
    
        public function getIdRoleGame(){
            return $this->idRoleGame;
        }
        public function setIdRoleGame($idRoleGame){
            $this->idRoleGame = $idRoleGame;
        }
    
        public function getIdRoleSite(){
            return $this->idRoleSite;
        }
        public function setIdRoleSite($idRoleSite){
            $this->idRoleSite = $idRoleSite;
        }

        // Création des méthodes de bases CRUD
        // READ : récupérer la liste de tous les utilisateurs
        public function getUsers(){
            // stockage de la requête dans une varaible + jointure autre table pour récupérer id_role
            $myQuery = 'SELECT 
                            * 
                        FROM 
                            ' .$this->table.' as u
                        JOIN
                            rolesitebean as rs
                        JOIN
                            rolegamebean as rg
                        WHERE
                            u.idRoleSite= rs.idRoleSite
                        AND
                            u.idRoleGame=rg.idRoleGame';
            // stockage dans variable de la préparation de la requête (requête préparé) = éviter injection stmt:état
            $stmt = $this->connect->prepare($myQuery);
            // exécution de la requête après sa préparation
            $stmt->execute();
            // je retourne le résultat
            return $stmt;
        }

        // READ : récupérer 1 utilisateur selon son pseudo
        //(peut-être modifié avec recherche par id ou mail, etc)
        public function getSingleUser(){
            // stockage de la requête dans une varaible
            $myQuery = 'SELECT 
                            * 
                        FROM 
                            ' .$this->table.' as u
                        JOIN
                            rolesitebean as rs
                        JOIN
                            rolegamebean as rg
                        WHERE
                            u.idRoleSite= rs.idRoleSite
                        AND
                            u.idRoleGame=rg.idRoleGame
                        AND 
                            pseudo= '.$this->pseudo.'';
            // stockage dans variable de la préparation de la requête (requête préparé) = éviter injection stmt:état
            $stmt = $this->connect->prepare($myQuery);
            // exécution de la requête après sa préparation
            $stmt->execute();
            // je retourne le résultat
            return $stmt;
        }

        // CREATE : créer un utilisateur dans la table userBean /  insertion (pas d'idRole pour le moment)
        public function createUser(){
            // dans cette requête j'ai crée les paramètres :pseudo, :password et :mail 
            //auxquels j'attribuerais des valeurs lors du bind des paramètres
            $myQuery = 'INSERT INTO '.$this->table.
                        ' SET 
                            pseudo = :pseudo, 
                            password = :password,
                            mail = :mail,
                            idRoleSite = :idRoleSite, 
                            idRoleGame = :idRoleGame';
            $stmt = $this->connect->prepare($myQuery);
            //var_dump($stmt);
            // bind/lier les paramètres
            $stmt->bindParam(':pseudo', $this->pseudo); 
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':mail', $this->mail);
            $stmt->bindParam(':idRoleSite', $this->idRoleSite);
            $stmt->bindParam(':idRoleGame', $this->idRoleGame);

            // retourne true ou false si exécuté
            //var_dump($stmt);
            return $stmt->execute();
        }

        // UPDATE : mettre à jour un utilisateur (pseudo, mail ou password) // après le setAttribut.  
        public function updateUser(){
            $myQuery = 'UPDATE '.$this->table.
            ' SET 
                pseudo = :pseudo, 
                password = :password,
                mail = :mail,
                idRoleSite = :idRoleSite,
                idRoleGame = :idRoleGame 
                WHERE 
                    pseudo = :pseudo2';
            
            $stmt = $this->connect->prepare($myQuery);
    
            // bind/lier les paramètres
            $stmt->bindParam(':pseudo', $this->pseudo); 
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':mail', $this->mail);
            $stmt->bindParam(':pseudo2', $this->pseudo); 
            $stmt->bindParam(':idRoleSite', $this->idRoleSite);
            $stmt->bindParam(':idRoleGame', $this->idRoleGame);

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
            $myQuery = 'DELETE FROM ' .$this->table.' WHERE pseudo= '.$this->pseudo.'';
            // stockage dans variable de la préparation de la requête (requête préparé) = éviter injection stmt:état
            $stmt = $this->connect->prepare($myQuery);
            //bind
            $stmt->bindParam(':pseudo',$this->pseudo);
            // je retourne le résultat executé
            return $stmt->execute();
        }

        // Vérification pseudo ou email unique
        public function verifPseudo(){
            $myQuery = 'SELECT
                            *
                        FROM 
                            '.$this->table.'
                        WHERE
                            pseudo = :pseudo';

            $stmt = $this->connect->prepare($myQuery);
            //bind
            $stmt->bindParam(':pseudo',$this->pseudo);
            // je retourne le résultat executé
            $stmt->execute();
            return $stmt;
        }

        // Vérification pseudo ou email unique
        public function verifMail(){
            $myQuery = 'SELECT
                            *
                        FROM 
                            '.$this->table.'
                        WHERE
                            mail = :mail';
            $stmt = $this->connect->prepare($myQuery);
            //bind
            $stmt->bindParam(':mail',$this->mail);
            // je retourne le résultat executé
            $stmt->execute();
            return $stmt;
        }
    }
?>
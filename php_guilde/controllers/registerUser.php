<?php
    // ajout des headers dont celui qui autorise les méthodes en POST et celui qui autorise les connexion de toute origine (différente adresse ip).
    header("Access-Control-Allow-Origin:*");
    header("Access-Control-Allow-Methods: POST");

    // appel des fichiers dont j'aurais besoin. 
    // include_once pour ne l'appeler d'une fois. 
    include_once ("../models/userbean.php");
    include ("../utils/db_config.php");
    include ("../views/register.php");

    // Création de variables qui me serviront à retourner du JSON -> Traiter dans JS
    $success = 0;
    $msg = "";
    $data = [];


    // Control de l'existence des champs fournis
    if(isset($_POST['pseudo'])
    && ($_POST['password'])
    && ($_POST['confPassword'])
    && ($_POST['mail'])
    && ($_POST['confMail'])){
        // je commence par créer des variables qui vont stocker les données envoyées par l'utilisateur 
        // en enlevant les blancs devant et derrière chaque données function TRIM()
        $pseudo = trim($_POST['pseudo']);
        $password = trim($_POST['password']);
        $confPassword = trim($_POST['confPassword']);
        $mail = trim($_POST['mail']);
        $confMail = trim($_POST['confMail']);

        // ensuite je vérifie que password et confPassword sont identique
        if ($password !== $confPassword){
            $msg = "Vos mot de passe ne sont pas identiques";
        } else {
             // je vérifie si la valeur de $mail est bien un mail grâce à la fonction filter_var
            // qui prend la donnée en paramètre ainsi que FILTER_VALIDATE_EMAIL pour demander la vérification
            if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                $msg = "Cette adresse email n'est pas valide";
            } else if ($mail !== $confMail){
                $msg = "Vos adresse mail ne sont pas identiques";
            } else {
                // check commentaire 
                // supprimer les balies html strip_tags et htmlspecialchars
                $verifPseudo = htmlspecialchars(strip_tags($pseudo));
                $verifPassword = htmlspecialchars(strip_tags($password));
                $verifMail = htmlspecialchars(strip_tags($mail));

                // Créer une nouvelle instance d'utilisateur 
                $newUser = new UserBean();

                // j'utilise les setters de la classe pour affecter des valeurs aux attributs
                $newUser->setPseudo($verifPseudo);
                //Pour l'affectation du mot de passe je vais également utiliser la fonction de hash de BCRYPT
                $newUser->setPassword(password_hash($verifPassword, PASSWORD_BCRYPT));
                $newUser->setMail($verifMail);

                // Il ne reste plus qu'à appeler la fonction createUser incluse dans la classe UserBean
                //var_dump($newUser);
                if ($newUser->createUser()){
                    // Ma variale $success passe à 1    
                    $success = 1;
                    // Je passe un message de réussite
                    $msg = "Utilisateur créé avec succès";
                    // retourne (pour le moment) seulement son pseudo en donnée
                    $data['pseudo']=$verifPseudo;
                    //var_dump($data);            
                } else {
                    $msg = "Erreur lors de l'enregistrement";
                }
            }
        }
    } else {
        $msg = 'Veuillez renseigner tous les champs';
    }

    if ($success == 1){
        // Je créée un tableau qui contiendra success(clé) + sa valeur $success, msg et data
        $result = ["success" => $success, "msg" => $msg, "data"=>$data];
        echo json_encode($result);
    } else  {
        // retourne tableau avec success et msg
        $result = ["success" => $success, "msg" => $msg];
        echo json_encode($result);
    }
?>
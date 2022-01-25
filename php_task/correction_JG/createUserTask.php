<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <p>Créer un utilisateur</p>
        <p>Nom </p>
        <input type="text" name="name_user">
        <br>
        <p>Prénom</p>
        <input type="text" name="first_name_user">
        <br>
        <p>Login</p>
        <input type="text" name="login_user">
        <br>
        <p>Mot de passe</p>
        <input type="text" name="mdp_user">
        <br>
        <input type="submit" value="Créer">
    </form>
    <?php

        if (isset($_POST['name_user'])&& 
        isset($_POST['first_name_user'])&&
        isset($_POST['login_user'])&&
        isset($_POST['mdp_user'])) {
            $name_user = $_POST['name_user'];
            $first_name_user = $_POST['first_name_user'];
            $login_user = $_POST['login_user'];
            $mdp_user = $_POST['mdp_user'];

            $bdd=new PDO('mysql:host=localhost;dbname=task', 'root','', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $bdd->exec("set names utf8");
            try {
                $req = $bdd->prepare(
                    "INSERT INTO 
                        user 
                    SET 
                        name_user = :name_user,
                        first_name_user = :first_name_user,
                        login_user = :login_user,
                        mdp_user = :mdp_user"
                );
                $resultat = $req->execute(
                    array(
                        ':name_user' => $name_user,
                        ':first_name_user' => $first_name_user,
                        ':login_user' => $login_user,
                        ':mdp_user' => $mdp_user
                    )
                );
                if ($resultat){
                    $req2 = $bdd->prepare(
                        'SELECT
                            *
                        FROM 
                            user 
                        WHERE 
                            name_user = :name_user'
                    );
                    $req2->execute(
                        array(
                            'name_user' => $name_user
                        )
                    );
                    while($donnees = $req2->fetch()){
                        //affichage des donnes
                        echo '<p>Vous venez de créer : 
                        '.$donnees['name_user'].'
                        '.$donnees['first_name_user'].'
                        '.$donnees['login_user'].'
                        '.$donnees['mdp_user'].'
                        </p>';
                    }
                } else {
                    echo "<p>Erreur lors de l'enregistrement</p>";
                }
                //je vais aller récupérer l'id du nouvel enregistrement
                $getUserId = $bdd->prepare('SELECT * FROM user WHERE name_user = :name_user');
                $getUserId->execute(array(':name_user' => $name_user));
                //je crée une variable
                $userId;
                while($oneUser = $getUserId->fetch()){
                    // je passe l'id à ma variable
                    $userId = $oneUser['id_user'];
                }
                $reqAll = $bdd->prepare('SELECT * FROM user');
                $reqAll->execute();
                while($allUsers = $reqAll->fetch()){
                    // j'affiche seulement si l'id qui vient d'être créer ne correspond pas aux données reçues
                    if($allUsers['id_user'] != $userId) {
                        echo '<p>
                        '.$allUsers['name_user'].'
                        '.$allUsers['first_name_user'].'
                        '.$allUsers['login_user'].'
                        '.$allUsers['mdp_user'].'
                        </p>';
                    }
                }
            } catch(Exception $e) {
                die('Erreur : ' .$e->getMessage());
            }
        }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Articles</title>
    </head>

    <body>
        <form action="#" method="post">
            <input type="" name="name_user" placeholder="Nom"></input>
            <input type="" name="first_name_user" placeholder="Prénom"></input>
            <input type="" name="login_user" placeholder="login"></input>
            <input type="" name="mdp_user" placeholder="Mot de passe"></input>
            <input type="submit" value="Ajouter">
        </form>
        <?php
        if (isset($_POST['name_user']) && isset($_POST['first_name_user']) && isset($_POST['login_user']) && isset($_POST['mdp_user'])){
            $name_user = $_POST['name_user'];
            $first_name_user = $_POST['first_name_user'];
            $login_user = $_POST['login_user'];
            $mdp_user = $_POST['mdp_user'];
            //var_dump($name_user,$first_name_user,$login_user,$mdp_user);

            // connexion
            $bdd=new PDO('mysql:host=localhost;dbname=task', 'root','', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $bdd->exec("set names utf8");

            try{
                $req = $bdd->prepare("INSERT INTO users SET name_user = :name_user, first_name_user = :first_name_user, login_user = :login_user, mdp_user=:mdp_user");
                $resultat = $req->execute(array('name_user' => $name_user, 'first_name_user' => $first_name_user, 'login_user' => $login_user, 'mdp_user'=> $mdp_user));
                if ($resultat){
                    $reponse = $bdd->prepare('SELECT * FROM users ORDER BY id_user DESC LIMIT 0,1');
                    $reponse->execute();
                    while($donnees = $reponse->fetch()){
                        //affichage des donnes
                        echo '<h3>Le compte  ci-dessous a bien été créé : </h3>'.'<p>'.$donnees['name_user'].' '.$donnees['first_name_user'].' '.$donnees['login_user'].' '.$donnees['mdp_user'].'</p>';
                    }
                } else {
                    echo "<p>Erreur lors de l'enregistrement</p>";
                }
                echo '<h3>Liste des utilisateurs : </h3>';
                if ($resultat){
                    $reponse = $bdd->prepare('SELECT * FROM users');
                    $reponse->execute();
                    while($donnees = $reponse->fetch()){
                        //affichage des donnes
                        echo '<p>'.$donnees['name_user'].' '.$donnees['first_name_user'].' '.$donnees['login_user'].' '.$donnees['mdp_user'].'</p>';
                    }
                } else {
                    echo "<p>Erreur lors de l'enregistrement</p>";
                }
            }catch(Exception $e){
                die('Erreur : ' .$e->getMessage());
            }
        }
        ?>
    </body>
</html>
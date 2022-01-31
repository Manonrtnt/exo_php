<?php   
    //Connexion à la base de données
    // $bdd = new PDO('mysql:host=localhost;dbname=php', 'root','', 
    // array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // $bdd->exec("set names utf8");

    // if (isset($_POST['name'])&& isset($_POST['firstName']) && isset($_POST['age'])){
    //     // récupérer une valeur depuis les champs input. 
    //     $add = $bdd->query('INSERT INTO users 
    //     SET 
    //     nom = "'.$_POST['name'].'",
    //     prenom = "'.$_POST['firstName'].'",
    //     age = "'.$_POST['age'].'"
    //     ');

    //     // Si on a bien les data
    //     if ($add){
    //         // alors créer une requête pour afficher / vérifier si enregistrement est ok
    //         try {
    //             // Requête pour stocker le contenu de la table users dans un tableau
    //             $reponse = $bdd->query('SELECT * FROM users');
    //             // boucle parcourir tableau et afficher ligne table
    //             while($donnees=$reponse->fetch()){
    //                 // affichage des données 
    //                 echo '<P>'.$donnees['nom'].' '.$donnees['prenom'].' '.$donnees['age'].'</p>';
    //             }
    //         } catch (Exception $e){
    //             die('Erreur : '.$e->getMessage());
    //         }
    //     } else {
    //         echo "<p> Erreur lors de l'enregistrement</p>";
    //     }
    // }

    // CORRECTION JONATHAN 
    // if (isset($_POST['nom'])&& isset($_POST['prenom'])) {
    //         $nom = $_POST['nom'];
    //         $prenom = $_POST['prenom'];

    //         $bdd=new PDO('mysql:host=localhost;dbname=bddtest', 'root','', 
    //         array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    //         $bdd->exec("set names utf8");
    //         try {
    //             if ($bdd->query("INSERT INTO users SET nom ='".$nom."', prenom = '".$prenom."'")){
    //                 $reponse = $bdd->query('SELECT * FROM users');
    //                 while($donnees = $reponse->fetch()){
    //                     //affichage des donnes
    //                     echo '<p><h2>'.$donnees['nom'].' '.$donnees['prenom'].' '.$donnees['age'].'</h2></p>';
    //                 }
    //             } else {
    //                 echo "<p>Erreur lors de l'enregistrement</p>";
    //             }
    //         } catch(Exception $e) {
    //             die('Erreur : ' .$e->getMessage());
    //         }
    //     }

    if (isset($_POST['nom'])&& isset($_POST['prenom'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        $bdd=new PDO('mysql:host=localhost;dbname=php', 'root','root', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $bdd->exec("set names utf8");
        try {
            // préparation de requête avec paramètre
            $req = $bdd->prepare("INSERT INTO users SET nom = :nom, prenom = :prenom");
            // préparation stocké qui est exécuté ci-dessous en donnant les valeurs dans array
            $resultat = $req->execute(array('nom' => $nom, 'prenom' => $prenom));
            if ($resultat){
                $reponse = $bdd->prepare('SELECT * FROM users');
                $reponse->execute();
                while($donnees = $reponse->fetch()){
                    //affichage des donnes
                    echo '<p><h2>'.$donnees['nom'].' '.$donnees['prenom'].' '.$donnees['age'].'</h2></p>';
                }
            } else {
                echo "<p>Erreur lors de l'enregistrement</p>";
            }
        } catch(Exception $e) {
            die('Erreur : ' .$e->getMessage());
        }
    }

?>
<?php
    if (isset($_POST['nom_article'])&& isset($_POST['contenu_article'])) {
    $name = $_POST['nom_article'];
    $content = $_POST['contenu_article'];
    var_dump($name, $content);
    // connexion
    $bdd=new PDO('mysql:host=localhost;dbname=article', 'root','', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->exec("set names utf8");
    
    try {
        // préparation de requête avec paramètre
        $req = $bdd->prepare("INSERT INTO article SET nom_article = :nom_article, contenu_article = :contenu_article");
        // préparation stocké qui est exécuté ci-dessous en donnant les valeurs dans array
        $resultat = $req->execute(array('nom_article' => $name, 'contenu_article' => $content));
        if ($resultat){
            $reponse = $bdd->prepare('SELECT * FROM article');
            $reponse->execute();
            while($donnees = $reponse->fetch()){
                //affichage des donnes
                echo '<p><h2>'.$donnees['nom_article'].' '.$donnees['contenu_article'].'</h2></p>';
            }
        } else {
            echo "<p>Erreur lors de l'enregistrement</p>";
        }
    } catch(Exception $e) {
        die('Erreur : ' .$e->getMessage());
    }
    }
?>
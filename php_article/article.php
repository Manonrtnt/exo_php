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
        <p>Nom article</p>
        <input type="" name="nom_article"></input>
        <p>Contenu</p>
        <input type="" name="contenu_article"></input>
        <br>
        <input type="submit" value="Ajouter">
    </form>
</br>
    <form action="index.php" method="get">
        <input type="button" value="Voir tous les articles">
    </form>
    <?php
    if (isset($_POST['nom_article']) && isset($_POST['contenu_article'])) {
        $name = $_POST['nom_article'];
        $content = $_POST['contenu_article'];
        // verification : var_dump($name, $content);
        // connexion
        $bdd = new PDO('mysql:host=localhost;dbname=article','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $bdd->exec("set names utf8");

        try {
            // préparation de requête avec paramètre
            $req = $bdd->prepare("INSERT INTO article SET nom_article = :nom_article, contenu_article = :contenu_article");
            // préparation stocké qui est exécuté ci-dessous en donnant les valeurs dans array
            $resultat = $req->execute(array('nom_article' => $name, 'contenu_article' => $content));
            if ($resultat) {
                // les : sont des paramètres. 
                $reponse = $bdd->prepare('SELECT * FROM article ORDER BY id DESC LIMIT 0,1');
                $reponse->execute();
                while ($donnee = $reponse->fetch()) {
                    //affichage des donnes
                    echo 
                        '<p>Numéro de l\'article : '.$donnee['id'].'</p>'
                        .'<p>Nom de l\'article : '.$donnee['nom_article'].'</p>'
                        .'<p>Contenu de l\'article : '.$donnee['contenu_article'].'</p>';
                }
            } else {
                echo "<p>Erreur lors de l'enregistrement</p>";
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    ?>
</body>

</html>
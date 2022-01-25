<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    <h1>Liste des articles :</h1>
</body>
</html>
<?php
    if (isset($_GET)) {

        $bdd=new PDO('mysql:host=localhost;dbname=article', 'root','', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $bdd->exec("set names utf8");
        try {
        
            $req = $bdd->prepare(
                'SELECT
                    *
                FROM 
                    article'
            );
            $req->execute();
            while($donnees = $req->fetch()){
                echo '<section>
                        <h5>'.$donnees['id_article'].'</h5>
                        <h4>'.$donnees['nom_article'].'</h4>
                        <p>'.$donnees['contenu_article'].'</p>
                    </section>
                    <br>';
            } 
        } catch(Exception $e) {
            die('Erreur : ' .$e->getMessage());
        }
    }
?>
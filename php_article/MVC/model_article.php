<?php
    // Modele = la partie de la requête du try au catch 
    try {
        $req = $bdd->prepare(
            "INSERT INTO 
                article 
            SET 
                nom_article = :name,
                contenu_article = :content"
        );
        $resultat = $req->execute(
            array(
                ':name' => $name,
                ':content' => $content
            )
        );
        if ($resultat){
            $req2 = $bdd->prepare(
                'SELECT
                    *
                FROM 
                    article 
                WHERE 
                    nom_article = :name'
            );
            $req2->execute(
                array(
                    'name' => $name
                )
            );
            while($donnees = $req2->fetch()){
                //affichage des donnes
                echo '<p>Vous venez de créer : 
                <h4>'.$donnees['nom_article'].'</h4>'
                .$donnees['contenu_article'].'</p>';
            }
        } else {
            echo "<p>Erreur lors de l'enregistrement</p>";
        }
    } catch(Exception $e) {
        die('Erreur : ' .$e->getMessage());
    }
?>
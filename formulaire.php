<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire exercice</title>
</head>
<body>
    <!-- Exercice 1 -->
    <!-- <form action="#" method="post">
        <p>Premier nombre</p>
        <input id="number" type="number" name="number1">
        <p>Deuxième nombre</p>
        <input id="number" type="number" name="number2">
        </br>
        </br>
        <input type="submit" value="Envoyer">
    </form> -->
    <?php
    // Exercice 1
    // if (isset($_POST['number1'])&& isset($_POST['number2'])){
    //     $number1= $_POST['number1'];
    //     $number2= $_POST['number2'];
    //     echo "La somme est égale à : ".($number1+$number2);
    // };
    ?>

    <!-- Exercice 2 -->
    <form action="#" method="post">
        <p>Prix HT : </p>
        <input id="number" type="number" name="prixHT">
        <p>Nombre d'article : </p>
        <input id="number" type="number" name="nbArticle">
        <p>Taux TVA : </p>
        <input id="number" type="number" name="tauxTVA">
        </br>
        </br>
        <input type="submit" value="Envoyer">
    </form>
    <!-- <?php
    // Exercice 2
    if (isset($_POST['prixHT'])&& isset($_POST['nbArticle'])&& isset($_POST['tauxTVA'])){
        $prixHT= $_POST['prixHT'];
        $nbArticle= $_POST['nbArticle'];
        $tauxTVA= $_POST['tauxTVA'];
        echo "<h3>Prix TTC : ".(($prixHT*$tauxTVA)*$nbArticle)."€</h3>";
    };
    ?> -->
</body>
</html>
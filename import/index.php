<?php
    /*-----------------------------------------------------
    Test (import du fichier) :
    -----------------------------------------------------*/
    //test si le fichier importé existe
    if(isset($_FILES['file'])){
        //stocke le chemin et le nom temporaire du fichier importé (ex /tmp/125423.pdf)
        $tmpName = $_FILES['file']['tmp_name'];
        //stocke le nom du fichier (nom du fichier et son extension importé ex : test.jpg)
        $name = $_FILES['file']['name'];
        //stocke la taille du fichier en octets
        $size = $_FILES['file']['size'];
        //stocke les erreurs (pb d'import, pb de droits etc...)
        $error = $_FILES['file']['error'];
        //déplacer le fichier importé dans le dossier image à la racine du projet
        $fichier = move_uploaded_file($tmpName, "./image/$name");
        var_dump($fichier);
    }

    /*-----------------------------------------------------
    Formulaire HTML :
    -----------------------------------------------------*/
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importer fichier</title>
</head>
<body>
    <!-- METHODE FILES -->
    <form action="#" method="post" enctype="multipart/form-data">
        <p>Importer une image</p>
        <input type="file" name="file" accept=".jpeg">
        </br>
        </br>
        <input type="submit" value="Importer">
    </form>
</body>
</html>
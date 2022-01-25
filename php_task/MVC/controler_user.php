<?php
    include('vue_user.php');
    include('connect.php');

    if (isset($_POST['name_user'])&& 
    isset($_POST['first_name_user'])&&
    isset($_POST['login_user'])&&
    isset($_POST['mdp_user'])) {
        $name_user = $_POST['name_user'];
        $first_name_user = $_POST['first_name_user'];
        $login_user = $_POST['login_user'];
        $mdp_user = $_POST['mdp_user'];

        if($name_user !=""){
            include('model_user.php'); 
        } else {
            echo "<p>Veuillez renseigner tous les champs</p>";
        }
    }
?>
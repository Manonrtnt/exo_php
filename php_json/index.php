<?php
// récupérer json dans variable input = lien. 
    $data = json_decode(file_get_contents("php://input"));
    $name = $data->name_user;
    $first_name_user = $data->first_name_user;

?>
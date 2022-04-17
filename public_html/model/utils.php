<?php

function dbConnect(){
    $db = new PDO('mysql:host=mysql;dbname=team_requete;charset=utf8', 'root', 'placeholder');
    return $db;
}

?>

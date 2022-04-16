<?php

function requireToVar($file_name){
  ob_start();
  require($file_name);
  return ob_get_clean();
}




function deconnexion(){
  session_destroy();
  header("Location: /index.php");
  die();
}

function dbConnect(){
    $db = new PDO('mysql:host=mysql;dbname=team_requete;charset=utf8', 'root', 'placeholder');
    return $db;
}

?>

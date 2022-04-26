<?php

function buildTemplate($content){
  $header_bar = requireToVar("view/select_bar.php");
  require("view/template.php");
}

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

function needSession(){ //TODO ca va pas ca a retravailler
  if(isset($_SESSION['id']) === false || checkUserId($_SESSION['id']) === false){
    deconnexion();
  }
}

function notNeedSession(){
  if (isset($_SESSION['id'])) {
    header("Location: /index.php");
    die();
  }
}

function buildMarkdown($content){
  require_once("libs/Parsedown.php");
  $Parsedown = new Parsedown();
  $Parsedown->setSafeMode(true); // miam miam
  return $Parsedown->text($content);
}

function buildQcm($xml){
  
}

?>

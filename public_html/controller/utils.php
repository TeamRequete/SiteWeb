<?php

function buildTemplate($content){
  $header_bar = requireToVar("view/select_bar.php");
  require("../view/template.php");
}

function requireToVar($file_name){
  ob_start();
  require("../".$file_name);
  return ob_get_clean();
}

function deconnexion(){
  session_destroy();
  header("Location: /index.php");
  die();
}

function needSession(){
  if(isset($_SESSION['id']) === false || checkUserId($_SESSION['id']) === false){
    deconnexion();
  }
}

function checkSession(){
  if (isset($_SESSION['id'])&&checkUserId($_SESSION['id']) === false) {
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
  require_once("../libs/Parsedown.php");
  $Parsedown = new Parsedown();
  $Parsedown->setSafeMode(true); // miam miam
  return $Parsedown->text($content);
}

function xmlFlush($xml){
  $stack=array();
  for($i=0;$i<count($xml->proposes->propose);$i++){
    array_push($stack, $xml->proposes->propose[$i]);
  }
  for($i=0;$i<count($xml->proposes->proposetrue);$i++){
    array_push($stack, $xml->proposes->proposetrue[$i]);
  }
  shuffle($stack);
  return $stack;
}

?>

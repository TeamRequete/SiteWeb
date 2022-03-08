<?php
require_once("model/model.php");

function unauthentified_index(){
  $content = requireToVar("view/formation_lst.php");
  buildTemplate($content);
}

function register() {
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      // check si tout les champ sont set
      if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['pass'])){
        //check de la taille
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && strlen($_POST['email']) < 255 && strlen($_POST['username']) < 255) {
          // check si le compte existe deja
          if (checkUserExist($_POST['email']) === 0) {
            insertUser($_POST['username'], $_POST['pass'], $_POST['email']);
            header("Location: /index.php");
            die();
          }
          $error = "Votre email est deja utilisé";
        }else{
          $error  = "la taille des champs ne doit pas dépasser 255 caractere.";
        }
      }else{
        $error = "WTF";
      }
    }

    $content = requireToVar("view/signin.php");
    if(isset($error)){
      $content  = $content."<br/>\n";
      $content  = $content."<span>".$error."</span>";
    }
    buildTemplate($content);
}

function login() {
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // check si tout les champ sont set
    if(isset($_POST['email']) && isset($_POST['pass'])){
        if (checkUserLogin($_POST['email'], $_POST['pass']) === true) {
          // code...
        }else{
          $error = "Auth failed";
        }
    }else{
      $error = "WTF";
    }
  }

  $content = requireToVar("view/login.php");
  if(isset($error)){
    $content  = $content."<br/>\n";
    $content  = $content."<span>".$error."</span>";
  }
  buildTemplate($content);
}

function buildTemplate($content){
  $header_bar = requireToVar("view/select_bar.php");
  require("view/template.php");
}

?>
